<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality\Concerns;

use Illuminate\Support\Facades\Facade;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\NullsafeMethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ExtendedMethodReflection;
use PHPStan\TrinaryLogic;
use PHPStan\Type\Type;
use PHPStan\Type\TypeCombinator;

/**
 * Callee resolution shared by the rules that name arguments of first-party calls.
 *
 * Naming an argument binds the call to the parameter name of the method that
 * actually runs. That is only safe when the call reaches a *native* method: a
 * `@method` / `@mixin` docblock method, a macro, or anything forwarded through
 * `__call` / `__callStatic` receives its arguments as a positional array, so a
 * named argument either throws or silently lands on the wrong index. PHPStan's
 * `hasMethod()` / `getMethod()` resolve those magic methods as if they were real,
 * so every lookup here goes through the native method instead.
 *
 * The using class provides a `ReflectionProvider $reflectionProvider` property.
 */
trait ResolvesNativeFirstPartyCallee
{
    /**
     * Static calls on a facade are forwarded through `__callStatic`.
     */
    private const string FACADE_CLASS = Facade::class;

    abstract protected function getType(Expr $expr): Type;

    /**
     * Resolve the native method a call reaches, or null when the callee cannot be
     * pinned to exactly one native, accessible, named-argument-accepting method.
     */
    private function resolveNativeCallee(MethodCall|NullsafeMethodCall|StaticCall|New_ $node, Scope $scope): ?ExtendedMethodReflection
    {
        if ($node instanceof New_) {
            $classReflection = $this->resolveNamedClass($node->class, $scope);

            return $classReflection instanceof ClassReflection
                ? $this->resolveNativeMethod($classReflection, '__construct', $scope)
                : null;
        }

        if (! $node->name instanceof Identifier) {
            return null;
        }

        $methodName = $node->name->toString();

        if ($node instanceof StaticCall) {
            return $this->resolveNativeStaticCallee($node, $methodName, $scope);
        }

        // Rector analyses a trait without the class that uses it, so `$this` has no
        // type there. The trait's own method is the one that runs, unless the class
        // declares one with the same name: see resolveTraitMethod().
        $classReflection = $scope->getClassReflection();
        if ($classReflection instanceof ClassReflection && $classReflection->isTrait()
            && $node->var instanceof Variable && $node->var->name === 'this') {
            return $this->resolveTraitMethod($classReflection, $methodName, $scope);
        }

        // Strip null first: a nullable receiver (`Foo|null`) is still one class.
        // Any other union or intersection is rejected, so the call is never named
        // against one member while another member's signature differs.
        $classReflections = TypeCombinator::removeNull($this->getType($node->var))->getObjectClassReflections();
        if (count($classReflections) !== 1) {
            return null;
        }

        return $this->resolveNativeMethod($classReflections[0], $methodName, $scope);
    }

    private function resolveNativeStaticCallee(StaticCall $node, string $methodName, Scope $scope): ?ExtendedMethodReflection
    {
        $classReflection = $this->resolveNamedClass($node->class, $scope);
        if (! $classReflection instanceof ClassReflection) {
            return null;
        }

        $methodReflection = $classReflection->isTrait()
            ? $this->resolveTraitMethod($classReflection, $methodName, $scope)
            : $this->resolveNativeMethod($classReflection, $methodName, $scope);
        if (! $methodReflection instanceof ExtendedMethodReflection) {
            return null;
        }

        // `self::` / `parent::` may forward to an instance method. Any other class
        // name reaching a non-static method is not a plain static call.
        $isScopeForward = in_array($node->class instanceof Name ? $node->class->toLowerString() : '', ['self', 'parent'], strict: true);
        if (! $methodReflection->isStatic() && ! $isScopeForward) {
            return null;
        }

        // An abstract method cannot run from a static call, and its parameter
        // names are whatever the eventual override chooses.
        $isAbstract = $methodReflection->isAbstract();
        if ($isAbstract === true || ($isAbstract instanceof TrinaryLogic && ! $isAbstract->no())) {
            return null;
        }

        return $methodReflection;
    }

    /**
     * Resolve a literal class name (`Foo`, `self`, `parent`). `static` is late
     * bound — the runtime class may be a subclass that renamed the parameters,
     * which PHPStan's rename check does not cover for static calls — so it is
     * rejected along with dynamic `$class` / `new class` expressions.
     */
    private function resolveNamedClass(Name|Expr|Class_ $class, Scope $scope): ?ClassReflection
    {
        if (! $class instanceof Name || $class->toLowerString() === 'static') {
            return null;
        }

        // Read `self` / `parent` off the scope: the enclosing class may live in the
        // file being processed and not be autoloadable by name.
        $lowerName = $class->toLowerString();
        if ($lowerName === 'self') {
            return $scope->getClassReflection();
        }

        if ($lowerName === 'parent') {
            return $scope->getClassReflection()?->getParentClass();
        }

        $className = $class->toString();

        return $this->reflectionProvider->hasClass($className)
            ? $this->reflectionProvider->getClass($className)
            : null;
    }

    /**
     * A class that uses the trait can declare a method with the same name, which
     * then replaces the trait's, possibly with other parameter names. That class is
     * out of sight here, so only a private, non-abstract trait method is trusted: it
     * is an internal helper, not a hook meant to be overridden.
     */
    private function resolveTraitMethod(ClassReflection $traitReflection, string $methodName, Scope $scope): ?ExtendedMethodReflection
    {
        $methodReflection = $this->resolveNativeMethod($traitReflection, $methodName, $scope);
        if (! $methodReflection instanceof ExtendedMethodReflection || ! $methodReflection->isPrivate()) {
            return null;
        }

        $isAbstract = $methodReflection->isAbstract();

        return $isAbstract === false || ($isAbstract instanceof TrinaryLogic && $isAbstract->no()) ? $methodReflection : null;
    }

    private function resolveNativeMethod(ClassReflection $classReflection, string $methodName, Scope $scope): ?ExtendedMethodReflection
    {
        if (in_array(self::FACADE_CLASS, $classReflection->getParentClassesNames(), strict: true)) {
            return null;
        }

        // No native method means a `@method` / `@mixin` / macro resolution through
        // `__call` / `__callStatic` — never name those.
        if (! $classReflection->hasNativeMethod($methodName)) {
            return null;
        }

        $nativeMethod = $classReflection->getNativeMethod($methodName);

        // An inaccessible native method (protected/private from outside) is
        // reached through `__call` / `__callStatic` too, or not at all.
        if (! $scope->canCallMethod($nativeMethod)) {
            return null;
        }

        // The method PHPStan resolves for the call must be that same native one,
        // not an annotation that shadows it.
        $resolvedMethod = $classReflection->getMethod($methodName, $scope);
        if ($resolvedMethod->getDeclaringClass()->getName() !== $nativeMethod->getDeclaringClass()->getName()) {
            return null;
        }

        // Covers `@no-named-arguments`.
        if (! $nativeMethod->acceptsNamedArguments()->yes()) {
            return null;
        }

        return $nativeMethod;
    }

    /**
     * @param list<string> $namespaces
     */
    private function isDeclaredInNamespaces(ExtendedMethodReflection $methodReflection, array $namespaces): bool
    {
        $declaringClass = $methodReflection->getDeclaringClass()->getName();

        foreach ($namespaces as $namespace) {
            if (str_starts_with($declaringClass, $namespace)) {
                return true;
            }
        }

        return false;
    }
}
