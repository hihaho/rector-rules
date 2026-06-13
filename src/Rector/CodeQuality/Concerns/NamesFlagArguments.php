<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality\Concerns;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Identifier;
use PHPStan\Reflection\ParameterReflection;

/**
 * Shared mechanics for the flag-argument rules: detecting a bare bool/null
 * literal argument and naming it in place, with the last-argument safety guard.
 */
trait NamesFlagArguments
{
    /**
     * True when $arg is a positional, non-unpacked bare `true`/`false`/`null`
     * literal. An already-named arg, an unpacked arg (`...$args`), or any
     * non-literal (variable, const, enum case) is not an opaque flag.
     */
    private function isBareBoolOrNullFlag(Arg $arg): bool
    {
        if ($arg->name instanceof Identifier || $arg->unpack) {
            return false;
        }

        if (! $arg->value instanceof ConstFetch) {
            return false;
        }

        return in_array($arg->value->name->toLowerString(), ['true', 'false', 'null'], strict: true);
    }

    /**
     * Name the argument at $index iff it is the *last* argument of the call and
     * is a bare flag literal. Mutates the Arg in place and returns true; a no-op
     * returning false otherwise.
     *
     * The last-argument guard is load-bearing: naming a non-final positional
     * argument would leave a positional argument after a named one, which is a
     * PHP fatal error.
     *
     * @param array<Arg> $args
     */
    private function nameTrailingFlagArgument(array $args, int $index, string $paramName): bool
    {
        if ($index !== count($args) - 1) {
            return false;
        }

        $arg = $args[$index] ?? null;
        if (! $arg instanceof Arg || ! $this->isBareBoolOrNullFlag($arg)) {
            return false;
        }

        $arg->name = new Identifier($paramName);

        return true;
    }

    /**
     * Cheap, reflection-free pre-gate mirroring {@see nameFlagArgumentsInTrailingRun()}:
     * true only when the trailing namable run holds at least one bare flag worth
     * renaming. Scanning from the right, already-named arguments keep the run open;
     * the first positional argument decides it — a bare flag means there is work to
     * do, anything else means there is not. This lets the expensive callee
     * resolution be skipped for the common shapes (a call ending in an already-named
     * argument, or one with no flag at all).
     *
     * @param array<Arg> $args
     */
    private function hasFlagInTrailingRun(array $args): bool
    {
        for ($index = count($args) - 1; $index >= 0; --$index) {
            $arg = $args[$index];

            if ($arg->name instanceof Identifier) {
                continue;
            }

            return $this->isBareBoolOrNullFlag($arg);
        }

        return false;
    }

    /**
     * Name every bare bool/null flag literal in the call's trailing "namable run":
     * the contiguous suffix of arguments, counted from the right, that are each
     * either already named or a bare flag literal. The first positional
     * non-literal argument (scanning right to left) ends the run — naming anything
     * to its left would leave a positional argument after a named one, which is a
     * PHP fatal error. Already-named arguments inside the run are left untouched;
     * a flag whose parameter cannot be resolved (variadic tail, unknown position)
     * also ends the run, since it must stay positional.
     *
     * @param array<Arg> $args
     * @param array<int, ParameterReflection> $parameters parameters indexed by position
     */
    private function nameFlagArgumentsInTrailingRun(array $args, array $parameters): bool
    {
        $namesByIndex = [];

        for ($index = count($args) - 1; $index >= 0; --$index) {
            $arg = $args[$index];

            // Already named: stays as-is but keeps the run open to its left.
            if ($arg->name instanceof Identifier) {
                continue;
            }

            // Positional non-flag: the run stops here; nothing further left is safe.
            if (! $this->isBareBoolOrNullFlag($arg)) {
                break;
            }

            // A flag whose parameter resolves to a variadic tail (or no declared
            // parameter at all) cannot be named, so it must remain positional —
            // ending the run just like any other positional argument.
            $parameter = $parameters[$index] ?? null;
            if ($parameter === null || $parameter->isVariadic()) {
                break;
            }

            $namesByIndex[$index] = $parameter->getName();
        }

        foreach ($namesByIndex as $index => $paramName) {
            $args[$index]->name = new Identifier($paramName);
        }

        return $namesByIndex !== [];
    }
}
