<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses;

use Hihaho\RectorRules\Rector\NamingClasses\Support\DocBlockSeeTagRenamer;
use PhpParser\Comment\Doc;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Enum_;
use PhpParser\Node\Stmt\EnumCase;
use PhpParser\Node\Stmt\Function_;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\Trait_;
use PhpParser\Node\Stmt\Use_;
use Rector\Configuration\RenamedClassesDataCollector;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * Rewrites `@see`, `@link` and `@uses` references to a class that a rename has moved.
 *
 * Rector's docblock renamer only covers type positions (`@param`, `@return`, `@var`), so
 * these tags survive a rename pointing at a class that no longer exists — and when a
 * class is referenced *only* from such a tag, its `use` import is left dangling too.
 * Nothing in a normal quality gate reports either.
 *
 * Registered automatically alongside the suffix rules; it reads whatever renames they put
 * in Rector's rename collector, so it needs no configuration.
 *
 * @internal not part of this package's public API; activated via config/related/rename-propagation.php
 *
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\Support\DocBlockSeeTagRenamerTest
 */
final class RenameDocBlockSeeTagRector extends AbstractRector
{
    /**
     * Resolved `namespace` + `use` aliases per file, so the file's statements are walked
     * once rather than for every docblock in it.
     *
     * @var array<string, array{namespace: string|null, aliases: array<string, string>}>
     */
    private array $fileContextCache = [];

    public function __construct(
        private readonly RenamedClassesDataCollector $renamedClassesDataCollector,
        private readonly DocBlockSeeTagRenamer $docBlockSeeTagRenamer,
    ) {}

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Update "@see", "@link" and "@uses" docblock references when a class is renamed',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
/**
 * Delivered the same way {@see OrderShipped} is.
 *
 * @see OrderShipped
 */
class InvoicePaid extends Notification
{
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
/**
 * Delivered the same way {@see OrderShippedNotification} is.
 *
 * @see OrderShippedNotification
 */
class InvoicePaid extends Notification
{
}
CODE_SAMPLE,
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [
            Class_::class,
            Interface_::class,
            Trait_::class,
            Enum_::class,
            ClassMethod::class,
            Property::class,
            ClassConst::class,
            EnumCase::class,
            Function_::class,
            Use_::class,
        ];
    }

    public function refactor(Node $node): ?Node
    {
        $oldToNewClasses = $this->renamedClassesDataCollector->getOldToNewClasses();

        if ($oldToNewClasses === []) {
            return null;
        }

        if ($node instanceof Use_) {
            return $this->refactorImport($node, $oldToNewClasses);
        }

        $docComment = $node->getDocComment();

        if (! $docComment instanceof Doc) {
            return null;
        }

        $fileContext = $this->fileContext();

        $rewritten = $this->docBlockSeeTagRenamer->rename(
            $docComment->getText(),
            $oldToNewClasses,
            $fileContext['namespace'],
            $fileContext['aliases'],
        );

        if ($rewritten === null) {
            return null;
        }

        $node->setDocComment(new Doc($rewritten, $docComment->getStartLine(), $docComment->getStartFilePos()));

        return $node;
    }

    /**
     * `RenameClassRector` only rewrites an import it also sees used somewhere in the AST.
     * A class referenced purely from a docblock tag has no such usage, so its import is
     * left naming a class that no longer exists — valid PHP, since imports resolve
     * lazily, but broken and invisible to every quality gate.
     *
     * @param  array<string, string>  $oldToNewClasses
     */
    private function refactorImport(Use_ $use, array $oldToNewClasses): ?Use_
    {
        $hasChanged = false;

        foreach ($use->uses as $useUse) {
            $importedFqcn = $useUse->name->toString();

            foreach ($oldToNewClasses as $oldFqcn => $newFqcn) {
                if (strcasecmp($importedFqcn, $oldFqcn) !== 0) {
                    continue;
                }

                // Only once the short name has gone from the rest of the file. Rewriting
                // it while a type tag or a code reference still uses it would pull the
                // import out from under them mid-run, and Rector's own docblock renamer
                // would then no longer be able to resolve them.
                if ($this->shortNameIsStillUsed($this->shortNameOf($oldFqcn))) {
                    continue;
                }

                $useUse->name = new Name($newFqcn);
                $hasChanged = true;

                break;
            }
        }

        return $hasChanged ? $use : null;
    }

    /**
     * Whether the old short name still appears anywhere in the file outside its `use`
     * line. Deliberately crude and conservative: a false positive only defers the import
     * rewrite to a later pass, while a false negative would break a live reference.
     */
    private function shortNameIsStillUsed(string $shortName): bool
    {
        $withoutImports = preg_replace('/^\s*use\s+[^;]+;\s*$/m', '', $this->getFile()->getFileContent());

        if (! is_string($withoutImports)) {
            return true;
        }

        return preg_match('/\b' . preg_quote($shortName, '/') . '\b/', $withoutImports) === 1;
    }

    private function shortNameOf(string $fqcn): string
    {
        $position = strrpos($fqcn, '\\');

        return $position === false ? $fqcn : substr($fqcn, $position + 1);
    }

    /**
     * @return array{namespace: string|null, aliases: array<string, string>}
     */
    private function fileContext(): array
    {
        $filePath = $this->getFile()->getFilePath();

        if (isset($this->fileContextCache[$filePath])) {
            return $this->fileContextCache[$filePath];
        }

        $namespace = null;
        $aliases = [];

        $this->traverseNodesWithCallable($this->getFile()->getNewStmts(), static function (Node $node) use (&$namespace, &$aliases): null {
            if ($node instanceof Namespace_ && $node->name instanceof Name) {
                $namespace = $node->name->toString();

                return null;
            }

            if (! $node instanceof Use_) {
                return null;
            }

            foreach ($node->uses as $useUse) {
                $alias = $useUse->alias instanceof Identifier
                    ? $useUse->alias->toString()
                    : $useUse->name->getLast();

                $aliases[strtolower($alias)] = $useUse->name->toString();
            }

            return null;
        });

        return $this->fileContextCache[$filePath] = ['namespace' => $namespace, 'aliases' => $aliases];
    }
}
