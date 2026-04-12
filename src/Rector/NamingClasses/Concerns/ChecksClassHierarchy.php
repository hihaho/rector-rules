<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Concerns;

use PHPStan\Reflection\ReflectionProvider;
use Rector\Contract\Rector\RectorInterface;

/**
 * Consumers must expose a `$reflectionProvider` property (typically via
 * constructor promotion) — the trait reads from it directly.
 *
 * @phpstan-require-implements RectorInterface
 * @property-read ReflectionProvider $reflectionProvider
 */
trait ChecksClassHierarchy
{
    protected function isSubclassOf(string $className, string $baseClass): bool
    {
        if ($className === $baseClass) {
            return true;
        }

        if (! $this->reflectionProvider->hasClass($className)) {
            return false;
        }

        if (! $this->reflectionProvider->hasClass($baseClass)) {
            return false;
        }

        return $this->reflectionProvider->getClass($className)
            ->isSubclassOfClass($this->reflectionProvider->getClass($baseClass));
    }
}
