<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Eloquent\Concerns;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Contract\Rector\RectorInterface;

/**
 * Shared model-inspection helpers for the attribute-conversion rules. The using
 * class must expose a `$reflectionProvider` property — the trait reads it directly.
 *
 * Implementation detail — not part of the package's public API.
 *
 * @phpstan-require-implements RectorInterface
 * @property-read ReflectionProvider $reflectionProvider
 */
trait InspectsEloquentModel
{
    abstract protected function getName(Node $node): ?string;

    private function isEloquentModel(Class_ $class): bool
    {
        $className = $this->getName($class);
        if ($className === null || ! $this->reflectionProvider->hasClass($className)) {
            return false;
        }

        if (! $this->reflectionProvider->hasClass(Model::class)) {
            return false;
        }

        return $this->reflectionProvider->getClass($className)->isSubclassOfClass(
            $this->reflectionProvider->getClass(Model::class)
        );
    }

    private function hasAttribute(Class_ $class, string $attributeFqcn): bool
    {
        foreach ($class->attrGroups as $attrGroup) {
            foreach ($attrGroup->attrs as $attr) {
                if ($this->getName($attr->name) === $attributeFqcn) {
                    return true;
                }
            }
        }

        return false;
    }
}
