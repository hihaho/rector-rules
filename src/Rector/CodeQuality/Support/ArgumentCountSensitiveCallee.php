<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality\Support;

use PHPStan\Reflection\FunctionReflection;
use PHPStan\Reflection\MethodReflection;
use ReflectionFunction;
use Throwable;

/**
 * Finds a callee whose behaviour depends on how many arguments it gets, so
 * {@see \Hihaho\RectorRules\Rector\CodeQuality\RemoveDefaultValuedArgumentRector}
 * must not drop one even when it equals the default: Laravel's `str(null)` returns a
 * Stringable while `str()` returns a proxy, and `->where('a', null)` filters on null
 * while `->where('a')` filters on truthy.
 *
 * A userland callee counts when its body calls `func_num_args()`, `func_get_args()`
 * or `func_get_arg()`. A built-in counts when PHPStan knows more than one signature
 * for it.
 *
 * @internal
 */
final class ArgumentCountSensitiveCallee
{
    private const string ARGUMENT_COUNT_CALL = '/\bfunc_(?:num_args|get_args?)\s*\(/i';

    /** @var array<string, bool> */
    private array $sensitive = [];

    public function isSensitive(MethodReflection|FunctionReflection $calleeReflection): bool
    {
        $key = $calleeReflection instanceof MethodReflection
            ? $calleeReflection->getDeclaringClass()->getName() . '::' . $calleeReflection->getName()
            : $calleeReflection->getName();

        return $this->sensitive[strtolower($key)] ??= $this->resolve($calleeReflection);
    }

    private function resolve(MethodReflection|FunctionReflection $calleeReflection): bool
    {
        $owner = $calleeReflection instanceof MethodReflection ? $calleeReflection->getDeclaringClass() : $calleeReflection;
        if ($owner->isBuiltin()) {
            return count($calleeReflection->getVariants()) > 1;
        }

        $source = $this->readBody($calleeReflection);

        return $source === null || preg_match(self::ARGUMENT_COUNT_CALL, $source) === 1;
    }

    /**
     * The callee's source lines, or null when they cannot be read.
     */
    private function readBody(MethodReflection|FunctionReflection $calleeReflection): ?string
    {
        try {
            $native = $calleeReflection instanceof MethodReflection
                ? $calleeReflection->getDeclaringClass()->getNativeReflection()->getMethod($calleeReflection->getName())
                : new ReflectionFunction($calleeReflection->getName());
        } catch (Throwable) {
            return null;
        }

        $fileName = $native->getFileName();
        $lines = is_string($fileName) ? @file($fileName) : false;
        if ($lines === false) {
            return null;
        }

        $startLine = (int) $native->getStartLine();

        return implode('', array_slice($lines, $startLine - 1, (int) $native->getEndLine() - $startLine + 1));
    }
}
