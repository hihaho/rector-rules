<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\Magic;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\FirstParty\TokenStore;
use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\Vendor\ExternalClient;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\PropertiesClassReflectionExtension;
use PHPStan\Reflection\PropertyReflection;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;
use PHPStan\Type\TypeCombinator;
use PHPStan\Type\UnionType;

/**
 * Stand-in for a larastan-style {@see PropertiesClassReflectionExtension} that
 * synthesizes property types Rector's bare PHPStan cannot otherwise resolve. Each
 * host class maps a dynamic property name to the type the extension reports,
 * exercising the single-first-party, nullable, vendor, and union receiver paths.
 *
 * @internal test double
 */
final class MagicPropertyExtension implements PropertiesClassReflectionExtension
{
    public function hasProperty(ClassReflection $classReflection, string $propertyName): bool
    {
        return $this->resolveType($classReflection->getName(), $propertyName) instanceof Type;
    }

    public function getProperty(ClassReflection $classReflection, string $propertyName): PropertyReflection
    {
        // PHPStan only calls getProperty() after hasProperty() returned true,
        // so the type is always resolvable here.
        $type = $this->resolveType($classReflection->getName(), $propertyName);
        assert($type instanceof Type);

        return new MagicPropertyReflection($classReflection, $type);
    }

    private function resolveType(string $className, string $propertyName): ?Type
    {
        if ($className !== Registry::class) {
            return null;
        }

        return match ($propertyName) {
            // Single first-party class — the convert path.
            'tokens' => new ObjectType(TokenStore::class),
            // First-party class wrapped in null — `removeNull` strips it.
            'nullableTokens' => TypeCombinator::addNull(new ObjectType(TokenStore::class)),
            // Two concrete classes — `getObjectClassReflections()` returns 2 → skip.
            'ambiguous' => new UnionType([new ObjectType(TokenStore::class), new ObjectType(ExternalClient::class)]),
            // Vendor (non-first-party) class — declaring-class gate rejects it.
            'client' => new ObjectType(ExternalClient::class),
            default => null,
        };
    }
}
