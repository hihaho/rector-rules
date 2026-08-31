<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses;

use Hihaho\RectorRules\Rector\NamingClasses\Concerns\ChecksClassHierarchy;
use Hihaho\RectorRules\Rector\NamingClasses\Support\ClassDeclaration;
use Hihaho\RectorRules\Rector\NamingClasses\Support\SuffixRenameMap;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Rector\AbstractRector;

abstract class AbstractAddSuffixRector extends AbstractRector
{
    use ChecksClassHierarchy;

    public function __construct(
        protected readonly ReflectionProvider $reflectionProvider,
        private readonly SuffixRenameMap $suffixRenameMap,
    ) {
        $this->suffixRenameMap->assertReferenceRewritingIsRegistered(static::class);

        // Runs while the container is built — before Rector traverses its first file —
        // so the rename map is complete for every file in the run, whatever the order.
        $this->suffixRenameMap->register(
            static::class,
            fn (ClassDeclaration $declaration): ?string => $this->newShortNameFor($declaration),
            [$this->suffix()],
        );
    }

    abstract protected function baseClass(): string;

    abstract protected function suffix(): string;

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [Class_::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof Class_) {
            return null;
        }

        // Anonymous class, or one whose name the parser could not resolve; a named class in
        // the global namespace still resolves.
        $declaration = ClassDeclaration::fromNode($node);

        if (! $declaration instanceof ClassDeclaration) {
            return null;
        }

        $newShortName = $this->newShortNameFor($declaration);

        if ($newShortName === null) {
            return null;
        }

        $oldFqcn = $declaration->fqcn;

        if (! $this->suffixRenameMap->claim($oldFqcn, $newShortName, $this->getFile()->getFilePath())) {
            return null;
        }

        $node->name = new Identifier($newShortName);

        return $node;
    }

    /**
     * The new short name for a class this rule claims, or null if it does not claim it.
     */
    protected function newShortNameFor(ClassDeclaration $declaration): ?string
    {
        if ($declaration->isAbstract) {
            return null;
        }

        if (str_ends_with($declaration->shortName, $this->suffix())) {
            return null;
        }

        if ($declaration->parentFqcn === null) {
            return null;
        }

        if (! $this->isSubclassOf($declaration->parentFqcn, $this->baseClass())) {
            return null;
        }

        return $this->buildNewName($declaration->shortName);
    }

    protected function buildNewName(string $currentName): string
    {
        return $currentName . $this->suffix();
    }
}
