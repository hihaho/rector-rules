<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Eloquent\Support;

use Illuminate\Database\Eloquent\Model;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ReflectionProvider;

/**
 * Decides whether removing a model's explicit newCollection() override would hand
 * resolution to a *real* method (supplied by a trait or an ancestor) instead of
 * the #[CollectedBy] attribute, which is only consulted by the framework's base
 * Model::newCollection().
 *
 * @internal
 */
final readonly class NewCollectionShadowDetector
{
    private const string NEW_COLLECTION = 'newCollection';

    private const string ELOQUENT_MODEL = Model::class;

    public function __construct(
        private ReflectionProvider $reflectionProvider,
    ) {}

    public function isShadowed(string $className): bool
    {
        if (! $this->reflectionProvider->hasClass($className)) {
            return false;
        }

        $classReflection = $this->reflectionProvider->getClass($className);

        // A trait anywhere in the hierarchy that defines newCollection() flattens
        // into the class and beats the attribute. getTraits(true) walks nested
        // traits and parent traits too. The framework's own HasCollection trait
        // (which Model uses to implement the attribute-aware newCollection) is the
        // mechanism the attribute hooks into — not a shadow — so skip Illuminate's.
        foreach ($classReflection->getTraits(true) as $trait) {
            if (str_starts_with($trait->getName(), 'Illuminate\\')) {
                continue;
            }

            if ($trait->getNativeReflection()->hasMethod(self::NEW_COLLECTION)) {
                return true;
            }
        }

        // A trait method aliased to newCollection (`use T { build as newCollection; }`)
        // supplies the method too, without the trait literally declaring it. An
        // explicit override masks it from method reflection, so inspect the
        // trait-alias map directly. Alias keys preserve their written casing while
        // method names are case-insensitive, so compare case-insensitively.
        foreach (array_keys($classReflection->getNativeReflection()->getTraitAliases()) as $alias) {
            if (strcasecmp($alias, self::NEW_COLLECTION) === 0) {
                return true;
            }
        }

        // An ancestor model (other than the framework base) that declares its own
        // newCollection() is inherited as a real method and beats the attribute.
        $parent = $classReflection->getParentClass();
        while ($parent instanceof ClassReflection) {
            if ($parent->getName() === self::ELOQUENT_MODEL) {
                break;
            }

            if ($this->declaresOwnNewCollection($parent)) {
                return true;
            }

            $parent = $parent->getParentClass();
        }

        return false;
    }

    private function declaresOwnNewCollection(ClassReflection $class): bool
    {
        $native = $class->getNativeReflection();
        if (! $native->hasMethod(self::NEW_COLLECTION)) {
            return false;
        }

        return $native->getMethod(self::NEW_COLLECTION)->getDeclaringClass()->getName() === $class->getName();
    }
}
