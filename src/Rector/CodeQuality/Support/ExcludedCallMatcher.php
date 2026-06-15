<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality\Support;

use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\ReflectionProvider;
use Rector\NodeNameResolver\NodeNameResolver;

/**
 * Decides whether a call is opted out of {@see \Hihaho\RectorRules\Rector\CodeQuality\RemoveDefaultValuedArgumentRector}
 * via its `exclude_calls` config. A call matches when its method name matches and the
 * configured class is-a the call's declaring class or its called class — so excluding a
 * base covers inherited calls on a subclass, and excluding the subclass covers calls
 * written on it directly.
 *
 * @internal
 */
final readonly class ExcludedCallMatcher
{
    public function __construct(
        private ReflectionProvider $reflectionProvider,
        private NodeNameResolver $nodeNameResolver,
    ) {}

    /**
     * @param  array<string, list<string>>  $excludedCalls  class FQN → lowercased method names
     */
    public function matches(MethodCall|StaticCall|New_ $node, MethodReflection $methodReflection, Scope $scope, array $excludedCalls): bool
    {
        $methodName = strtolower($methodReflection->getName());
        $classReflections = [$methodReflection->getDeclaringClass(), ...$this->calledClassReflections($node, $scope)];

        foreach ($excludedCalls as $class => $methods) {
            if (in_array($methodName, $methods, true) && $this->anyClassIsA($classReflections, $class)) {
                return true;
            }
        }

        return false;
    }

    /**
     * The class reflection(s) the call is made on: the receiver type for a method call,
     * the named class for a static call or `new`.
     *
     * @return list<ClassReflection>
     */
    private function calledClassReflections(MethodCall|StaticCall|New_ $node, Scope $scope): array
    {
        if ($node instanceof MethodCall) {
            return $scope->getType($node->var)->getObjectClassReflections();
        }

        if (! $node->class instanceof Name) {
            return [];
        }

        $classReflection = $this->resolveNamedClass($node->class, $scope);

        return $classReflection instanceof ClassReflection ? [$classReflection] : [];
    }

    /**
     * `self`/`static` resolve to the enclosing class and `parent` to its parent (these
     * never reach the ReflectionProvider as a class name, e.g. `self::make()`).
     */
    private function resolveNamedClass(Name $class, Scope $scope): ?ClassReflection
    {
        $lowerName = $class->toLowerString();
        if ($lowerName === 'self' || $lowerName === 'static') {
            return $scope->getClassReflection();
        }

        if ($lowerName === 'parent') {
            return $scope->getClassReflection()?->getParentClass();
        }

        $className = $this->nodeNameResolver->getName($class);
        if ($className === null || ! $this->reflectionProvider->hasClass($className)) {
            return null;
        }

        return $this->reflectionProvider->getClass($className);
    }

    /**
     * @param  list<ClassReflection>  $classReflections
     */
    private function anyClassIsA(array $classReflections, string $class): bool
    {
        foreach ($classReflections as $classReflection) {
            if ($classReflection->is($class)) {
                return true;
            }
        }

        return false;
    }
}
