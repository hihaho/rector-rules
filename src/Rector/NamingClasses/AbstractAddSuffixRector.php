<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses;

use Hihaho\RectorRules\Rector\NamingClasses\Concerns\ChecksClassHierarchy;
use Hihaho\RectorRules\Rector\NamingClasses\Support\SuffixRenameMap;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
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
        // Runs while the container is built — before Rector traverses its first file —
        // so the rename map is complete for every file in the run, whatever the order.
        $this->suffixRenameMap->register(
            static::class,
            fn (Class_ $class): ?string => $this->newShortNameFor($class),
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

        $newShortName = $this->newShortNameFor($node);

        if ($newShortName === null) {
            return null;
        }

        $oldFqcn = $node->namespacedName?->toString();

        // Anonymous class; a named class in the global namespace still has one.
        if ($oldFqcn === null) {
            return null;
        }

        if (! $this->suffixRenameMap->claim($oldFqcn, $newShortName, $this->getFile()->getFilePath())) {
            return null;
        }

        $node->name = new Identifier($newShortName);

        return $node;
    }

    /**
     * The new short name for a class this rule claims, or null if it does not claim it.
     */
    protected function newShortNameFor(Class_ $class): ?string
    {
        if ($class->isAbstract()) {
            return null;
        }

        if (! $class->name instanceof Identifier) {
            return null;
        }

        $className = $class->name->toString();

        if (str_ends_with($className, $this->suffix())) {
            return null;
        }

        if (! $class->extends instanceof Name) {
            return null;
        }

        if (! $this->isSubclassOf($class->extends->toString(), $this->baseClass())) {
            return null;
        }

        return $this->buildNewName($className);
    }

    protected function buildNewName(string $currentName): string
    {
        return $currentName . $this->suffix();
    }
}
