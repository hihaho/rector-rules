<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Import;

use Illuminate\Database\Eloquent\Builder;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Do_;
use PhpParser\Node\Stmt\Echo_;
use PhpParser\Node\Stmt\Enum_;
use PhpParser\Node\Stmt\Expression;
use PhpParser\Node\Stmt\For_;
use PhpParser\Node\Stmt\Foreach_;
use PhpParser\Node\Stmt\Function_;
use PhpParser\Node\Stmt\GroupUse;
use PhpParser\Node\Stmt\If_;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\Switch_;
use PhpParser\Node\Stmt\Trait_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Node\Stmt\While_;
use PhpParser\Node\UseItem;
use PHPStan\PhpDocParser\Ast\Node as PhpDocAstNode;
use PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfo;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\Comments\NodeDocBlock\DocBlockUpdater;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\PhpDocParser\PhpDocParser\PhpDocNodeTraverser;
use Rector\PhpParser\Node\FileNode;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Import\AliasImportRector\AliasImportRectorTest
 */
final class AliasImportRector extends AbstractRector implements ConfigurableRectorInterface
{
    /**
     * Attribute flag set on Name nodes that appear inside a use declaration,
     * so refactorName() won't mistake them for usages in code.
     */
    private const string IMPORT_PATH_ATTR = 'hihaho_alias_import_path';

    /** @var array<string, string> FQCN → desired alias */
    private array $aliasMap = [];

    /**
     * Per-file: FQCNs that have been aliased in this file.
     *
     * @var array<string, array{oldShortName: string, newAlias: string}>
     */
    private array $activeAliases = [];

    /**
     * Per-file: short-name renames for Name and PHPDoc IdentifierTypeNode rewriting.
     * Only includes entries where the old name differs from the new alias.
     *
     * @var array<string, string>
     */
    private array $shortNameRenames = [];

    /**
     * Per-file: every import's effective short name → FQCN. Used to detect
     * collisions before applying an alias that would cause a PHP fatal.
     *
     * @var array<string, string>
     */
    private array $importedShortNames = [];

    private string $currentFile = '';

    public function __construct(
        private readonly PhpDocInfoFactory $phpDocInfoFactory,
        private readonly DocBlockUpdater $docBlockUpdater,
    ) {}

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Add import aliases and rename all usages in the file',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
use Illuminate\Database\Eloquent\Builder;

function query(Builder $query): Builder
{
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;

function query(EloquentQueryBuilder $query): EloquentQueryBuilder
{
}
CODE_SAMPLE,
                    [
                        Builder::class => 'EloquentQueryBuilder',
                    ],
                ),
            ],
        );
    }

    public function configure(array $configuration): void
    {
        Assert::allString($configuration);
        Assert::isMap($configuration);

        $this->aliasMap = $configuration;
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [
            Use_::class,
            GroupUse::class,
            Name::class,
            // Class-like and callable-like declarations (host @method /
            // @property / @mixin and @param / @return docblocks).
            ClassMethod::class,
            Property::class,
            Class_::class,
            Interface_::class,
            Trait_::class,
            Enum_::class,
            Function_::class,
            // Statement nodes that carry inline docblocks such as
            // `/** @var Foo $bar */` attached to the next expression.
            Expression::class,
            Foreach_::class,
            If_::class,
            While_::class,
            For_::class,
            Do_::class,
            Switch_::class,
            Return_::class,
            Echo_::class,
        ];
    }

    public function refactor(Node $node): ?Node
    {
        $this->ensureFileState();

        if ($node instanceof Use_) {
            return $this->refactorUse($node);
        }

        if ($node instanceof GroupUse) {
            return $this->refactorGroupUse($node);
        }

        if ($node instanceof Name) {
            return $this->refactorName($node);
        }

        return $this->refactorDocBlock($node);
    }

    private function refactorUse(Use_ $node): ?Use_
    {
        foreach ($node->uses as $useItem) {
            $useItem->name->setAttribute(self::IMPORT_PATH_ATTR, true);
        }

        if ($node->type !== Use_::TYPE_NORMAL) {
            return null;
        }

        $changed = false;

        foreach ($node->uses as $useItem) {
            if ($this->applyAliasToUseItem($useItem, $useItem->name->toString())) {
                $changed = true;
            }
        }

        return $changed ? $node : null;
    }

    private function refactorGroupUse(GroupUse $node): ?GroupUse
    {
        $node->prefix->setAttribute(self::IMPORT_PATH_ATTR, true);

        foreach ($node->uses as $useItem) {
            $useItem->name->setAttribute(self::IMPORT_PATH_ATTR, true);
        }

        if ($node->type !== Use_::TYPE_UNKNOWN && $node->type !== Use_::TYPE_NORMAL) {
            return null;
        }

        $prefix = $node->prefix->toString();
        $changed = false;

        foreach ($node->uses as $useItem) {
            // Per-item type is only meaningful when the group's type is unknown.
            $itemType = $node->type === Use_::TYPE_UNKNOWN ? $useItem->type : $node->type;

            if ($itemType !== Use_::TYPE_NORMAL) {
                continue;
            }

            $fqcn = $prefix . '\\' . $useItem->name->toString();

            if ($this->applyAliasToUseItem($useItem, $fqcn)) {
                $changed = true;
            }
        }

        return $changed ? $node : null;
    }

    private function applyAliasToUseItem(UseItem $useItem, string $fqcn): bool
    {
        $desiredAlias = $this->aliasMap[$fqcn] ?? null;

        if ($desiredAlias === null) {
            return false;
        }

        $currentAlias = $useItem->alias?->toString();

        if ($currentAlias === $desiredAlias) {
            // Already aliased correctly — still register for Name resolution,
            // but don't clobber a "needs rename" entry that another use
            // item of the same FQCN already recorded (happens when a file
            // has both un-aliased and aliased imports of the same class).
            $existing = $this->activeAliases[$fqcn] ?? null;
            $existingNeedsRename = $existing !== null
                && $existing['oldShortName'] !== $existing['newAlias'];

            if (! $existingNeedsRename) {
                $this->activeAliases[$fqcn] = [
                    'oldShortName' => $desiredAlias,
                    'newAlias' => $desiredAlias,
                ];
            }

            return false;
        }

        // Collision guard: the desired alias is already in use by another
        // import in this file.
        $collidingFqcn = $this->importedShortNames[$desiredAlias] ?? null;

        if ($collidingFqcn !== null) {
            if ($collidingFqcn !== $fqcn) {
                // Different FQCN — rewriting produces "Cannot use X as Y
                // because the name is already in use" fatal. Leave alone.
                return false;
            }

            // Same FQCN — the file has both the un-aliased and aliased
            // form of this class. Rewriting would create a duplicate
            // `use X as Alias;` line (fatal). Leave the use item alone,
            // but still rename body references of the un-aliased short
            // name to the alias — the aliased import already covers them.
            $oldShortName = $currentAlias ?? $useItem->name->getLast();

            if ($oldShortName !== $desiredAlias) {
                $this->shortNameRenames[$oldShortName] = $desiredAlias;
            }

            return false;
        }

        $oldShortName = $currentAlias ?? $useItem->name->getLast();
        $useItem->alias = new Identifier($desiredAlias);

        $this->activeAliases[$fqcn] = [
            'oldShortName' => $oldShortName,
            'newAlias' => $desiredAlias,
        ];
        $this->shortNameRenames[$oldShortName] = $desiredAlias;

        return true;
    }

    private function refactorName(Name $node): ?Name
    {
        if ($this->shortNameRenames === []) {
            return null;
        }

        // Skip Name nodes that are part of a use declaration — those are
        // handled in refactorUse/refactorGroupUse.
        if ($node->getAttribute(self::IMPORT_PATH_ATTR) === true) {
            return null;
        }

        // FullyQualified: Rector resolves most type references to FQN internally
        if ($node instanceof FullyQualified) {
            $fqcn = $node->toString();
            $alias = $this->activeAliases[$fqcn] ?? null;

            if ($alias === null || $alias['oldShortName'] === $alias['newAlias']) {
                return null;
            }

            return new Name($alias['newAlias']);
        }

        // Short name: check if it matches any old import short name
        $newAlias = $this->shortNameRenames[$node->toString()] ?? null;

        if ($newAlias === null) {
            return null;
        }

        return new Name($newAlias);
    }

    private function refactorDocBlock(Node $node): ?Node
    {
        if ($this->shortNameRenames === []) {
            return null;
        }

        $phpDocInfo = $this->phpDocInfoFactory->createFromNode($node);

        if (! $phpDocInfo instanceof PhpDocInfo) {
            return null;
        }

        $renames = $this->shortNameRenames;
        $hasChanged = false;

        $traverser = new PhpDocNodeTraverser();
        $traverser->traverseWithCallable(
            $phpDocInfo->getPhpDocNode(),
            '',
            static function (PhpDocAstNode $docNode) use ($renames, &$hasChanged): ?IdentifierTypeNode {
                if (! $docNode instanceof IdentifierTypeNode) {
                    return null;
                }

                if (! isset($renames[$docNode->name])) {
                    return null;
                }

                $hasChanged = true;

                return new IdentifierTypeNode($renames[$docNode->name]);
            },
        );

        if (! $hasChanged) {
            return null;
        }

        $this->docBlockUpdater->updateRefactoredNodeWithPhpDocInfo($node);

        return $node;
    }

    private function ensureFileState(): void
    {
        $filePath = $this->getFile()->getFilePath();

        if ($this->currentFile !== $filePath) {
            $this->currentFile = $filePath;
            $this->activeAliases = [];
            $this->shortNameRenames = [];
            $this->importedShortNames = [];

            // Pre-scan: detect existing imports for our target FQCNs
            $this->scanExistingImports();
        }
    }

    private function scanExistingImports(): void
    {
        $stmts = $this->getFile()->getNewStmts();

        // Rector wraps the real AST in a FileNode; unwrap before scanning.
        if (count($stmts) === 1 && $stmts[0] instanceof FileNode) {
            $stmts = $stmts[0]->stmts;
        }

        foreach ($stmts as $stmt) {
            if ($stmt instanceof Namespace_) {
                $this->scanStmtsForImports($stmt->stmts);

                return;
            }
        }

        // No namespace — scan top-level statements.
        $this->scanStmtsForImports($stmts);
    }

    /** @param Node\Stmt[] $stmts */
    private function scanStmtsForImports(array $stmts): void
    {
        /** @var list<array{UseItem, string}> $targetImports */
        $targetImports = [];

        // Pass 1: mark Name nodes inside use declarations and collect every
        // import's effective short name. We need the full picture before we
        // can answer "does this alias collide with an existing import?".
        foreach ($stmts as $stmt) {
            if ($stmt instanceof Use_) {
                $this->collectFlatUse($stmt, $targetImports);

                continue;
            }

            if ($stmt instanceof GroupUse) {
                $this->collectGroupUse($stmt, $targetImports);
            }
        }

        // Pass 2: register only imports in our alias map that won't collide.
        foreach ($targetImports as [$useItem, $fqcn]) {
            $this->registerExistingImport($useItem, $fqcn);
        }
    }

    /** @param list<array{UseItem, string}> $targetImports */
    private function collectFlatUse(Use_ $stmt, array &$targetImports): void
    {
        foreach ($stmt->uses as $useItem) {
            $useItem->name->setAttribute(self::IMPORT_PATH_ATTR, true);
        }

        if ($stmt->type !== Use_::TYPE_NORMAL) {
            return;
        }

        foreach ($stmt->uses as $useItem) {
            $fqcn = $useItem->name->toString();
            $shortName = $useItem->alias?->toString() ?? $useItem->name->getLast();
            $this->importedShortNames[$shortName] = $fqcn;
            $targetImports[] = [$useItem, $fqcn];
        }
    }

    /** @param list<array{UseItem, string}> $targetImports */
    private function collectGroupUse(GroupUse $stmt, array &$targetImports): void
    {
        $stmt->prefix->setAttribute(self::IMPORT_PATH_ATTR, true);

        foreach ($stmt->uses as $useItem) {
            $useItem->name->setAttribute(self::IMPORT_PATH_ATTR, true);
        }

        if ($stmt->type !== Use_::TYPE_UNKNOWN && $stmt->type !== Use_::TYPE_NORMAL) {
            return;
        }

        $prefix = $stmt->prefix->toString();

        foreach ($stmt->uses as $useItem) {
            $itemType = $stmt->type === Use_::TYPE_UNKNOWN ? $useItem->type : $stmt->type;

            if ($itemType !== Use_::TYPE_NORMAL) {
                continue;
            }

            $fqcn = $prefix . '\\' . $useItem->name->toString();
            $shortName = $useItem->alias?->toString() ?? $useItem->name->getLast();
            $this->importedShortNames[$shortName] = $fqcn;
            $targetImports[] = [$useItem, $fqcn];
        }
    }

    private function registerExistingImport(UseItem $useItem, string $fqcn): void
    {
        if (! isset($this->aliasMap[$fqcn])) {
            return;
        }

        $desiredAlias = $this->aliasMap[$fqcn];

        // Collision guard mirrors applyAliasToUseItem(): if another import
        // already uses the target short name, we won't rewrite this one, so
        // don't register any renames that refactorName/refactorDocBlock would
        // otherwise apply to usages in the file body.
        $collidingFqcn = $this->importedShortNames[$desiredAlias] ?? null;

        if ($collidingFqcn !== null && $collidingFqcn !== $fqcn) {
            return;
        }

        $currentAlias = $useItem->alias?->toString();
        $oldShortName = $currentAlias ?? $useItem->name->getLast();

        // Preserve any existing "needs rename" entry — the same FQCN might
        // be imported twice (unaliased + aliased) and the "needs rename"
        // entry from the unaliased import must win so body references of
        // the unaliased short name get rewritten.
        $existing = $this->activeAliases[$fqcn] ?? null;
        $existingNeedsRename = $existing !== null
            && $existing['oldShortName'] !== $existing['newAlias'];

        if (! $existingNeedsRename) {
            $this->activeAliases[$fqcn] = [
                'oldShortName' => $oldShortName,
                'newAlias' => $desiredAlias,
            ];
        }

        if ($oldShortName !== $desiredAlias) {
            $this->shortNameRenames[$oldShortName] = $desiredAlias;
        }
    }
}
