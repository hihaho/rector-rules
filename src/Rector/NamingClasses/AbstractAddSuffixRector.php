<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses;

use Hihaho\RectorRules\Rector\NamingClasses\Concerns\ChecksClassHierarchy;
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
    ) {}

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

        if ($node->isAbstract()) {
            return null;
        }

        if (! $node->name instanceof Identifier) {
            return null;
        }

        $className = $node->name->toString();

        if (str_ends_with($className, $this->suffix())) {
            return null;
        }

        if (! $this->extendsBaseClass($node)) {
            return null;
        }

        $newName = $this->buildNewName($className);
        $node->name = new Identifier($newName);

        return $node;
    }

    private function extendsBaseClass(Class_ $node): bool
    {
        if (! $node->extends instanceof Name) {
            return false;
        }

        return $this->isSubclassOf($this->getName($node->extends), $this->baseClass());
    }

    protected function buildNewName(string $currentName): string
    {
        return $currentName . $this->suffix();
    }
}
