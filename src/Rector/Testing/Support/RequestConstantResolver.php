<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Testing\Support;

use PHPStan\Reflection\ReflectionProvider;
use ReflectionClassConstant;

/**
 * Reflects a FormRequest's first-party public `string` constants — the field-name
 * constants the test-field rule rewrites against. Split from {@see RouteRequestResolver}
 * (which classifies routes) so each collaborator does one job.
 *
 * @internal
 */
final readonly class RequestConstantResolver
{
    public function __construct(
        private string $firstPartyPrefix,
        private ReflectionProvider $reflectionProvider,
    ) {}

    /**
     * Flat `string value => "FQCN::CONST"` map of a request's first-party public `string`
     * constants, first-wins on duplicate values. The shared contract: identical shape to
     * the sibling PHPStan extension's reader, so rule and extension agree.
     *
     * @param  class-string  $requestClass
     * @return array<string, string>
     */
    public function fieldConstants(string $requestClass): array
    {
        if (! $this->reflectionProvider->hasClass($requestClass)) {
            return [];
        }

        $native = $this->reflectionProvider->getClass($requestClass)->getNativeReflection();

        $constants = [];

        foreach ($native->getReflectionConstants() as $constant) {
            $value = $this->eligibleStringValue($constant);
            if ($value === null) {
                continue;
            }

            $constants[$value] ??= $constant->getDeclaringClass()->getName() . '::' . $constant->getName();
        }

        return $constants;
    }

    /**
     * The wire value of a class-constant key (`$writtenClass::$constName`) when it is a
     * first-party public `string` constant reachable on the route's `$requestClass` — else
     * null. Reads the constant's value **directly** by reflection rather than inverting
     * {@see fieldConstants()} (whose value=>FQCN map is first-wins, so the inverse loses
     * duplicate-valued constants): this resolves duplicate values correctly and stays
     * symmetric with the `to_const` direction's direct value=>FQCN lookup. Reflecting fresh
     * each run, and admitting only `string` constants, is the drift guard.
     *
     * `$writtenClass` (the class as the test spelled it) must be the request itself or an
     * ancestor it inherits the constant through — so a same-named constant on an unrelated
     * class is never inlined as if it were this request's field.
     *
     * @param  class-string  $requestClass
     */
    public function literalForConstant(string $requestClass, string $writtenClass, string $constName): ?string
    {
        if (! $this->reflectionProvider->hasClass($requestClass)) {
            return null;
        }

        $request = $this->reflectionProvider->getClass($requestClass)->getNativeReflection();
        if (! $request->hasConstant($constName)) {
            return null;
        }

        $constant = $request->getReflectionConstant($constName);
        if ($constant === false) {
            return null;
        }

        $value = $this->eligibleStringValue($constant);
        if ($value === null) {
            return null;
        }

        // The written class must reference this same constant: the request, or an ancestor
        // it inherits through. Class names are case-insensitive.
        $writtenClass = ltrim($writtenClass, '\\');
        if (strcasecmp($request->getName(), $writtenClass) !== 0 && ! $request->isSubclassOf($writtenClass)) {
            return null;
        }

        return $value;
    }

    /**
     * The string value of a constant when it is public, declared in a first-party class,
     * and holds a `string` — else null. The shared eligibility test for both readers.
     */
    private function eligibleStringValue(ReflectionClassConstant $constant): ?string
    {
        if (! $constant->isPublic()) {
            return null;
        }

        if (! str_starts_with($constant->getDeclaringClass()->getName(), ltrim($this->firstPartyPrefix, '\\'))) {
            return null;
        }

        $value = $constant->getValue();

        return is_string($value) ? $value : null;
    }
}
