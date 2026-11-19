<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality\Support;

use DateTimeInterface;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\FunctionReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\TypeCombinator;

/**
 * Decides whether a call to a built-in is sure to reach the built-in signature, so
 * {@see \Hihaho\RectorRules\Rector\CodeQuality\RemoveDefaultValuedArgumentRector}
 * may name its arguments. A `\DateTime`-typed value can be a subclass at runtime
 * (Carbon renames `setTime()`'s `$microsecond`), so a method call qualifies only on
 * a final receiver class. The `DateTimeInterface` family is skipped outright: Rector's
 * `DateTimeInstanceToCarbonRector` can turn `new \DateTime()` into Carbon in the same run.
 *
 * @internal
 */
final readonly class ExactBuiltInCallee
{
    public function isExact(
        MethodCall|StaticCall|New_|FuncCall $node,
        MethodReflection|FunctionReflection $calleeReflection,
        Scope $scope,
    ): bool {
        // Signature variants may name their parameters differently from the runtime.
        if (count($calleeReflection->getVariants()) !== 1) {
            return false;
        }

        if ($calleeReflection instanceof MethodReflection && $calleeReflection->getDeclaringClass()->implementsInterface(DateTimeInterface::class)) {
            return false;
        }

        if ($node instanceof FuncCall) {
            return true;
        }

        if (! $node instanceof MethodCall) {
            return $node->class instanceof Name && strtolower($node->class->toString()) !== 'static';
        }

        $classReflections = TypeCombinator::removeNull($scope->getType($node->var))->getObjectClassReflections();

        return count($classReflections) === 1 && $classReflections[0]->isFinal();
    }
}
