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
     * Cheap, reflection-free pre-gate mirroring {@see nameFlagArguments()}: true
     * only when the trailing namable run holds at least one bare flag worth
     * renaming. Scanning from the right, already-named arguments keep the run open
     * and a bare flag confirms there is work to do. In trailing-safe mode the first
     * positional non-flag ends the scan; in cascade mode it is skipped over (it is
     * itself namable), so the scan keeps looking left for a flag to anchor on. An
     * unpacked argument always ends the scan — the run cannot cross it. This lets
     * the expensive callee resolution be skipped for the common shapes (a call with
     * no flag, or one ending in an already-named argument with no flag before it).
     *
     * @param array<Arg> $args
     */
    private function hasFlagInTrailingRun(array $args, bool $cascade): bool
    {
        for ($index = count($args) - 1; $index >= 0; --$index) {
            $arg = $args[$index];

            if ($arg->name instanceof Identifier) {
                continue;
            }

            if ($arg->unpack) {
                return false;
            }

            if ($this->isBareBoolOrNullFlag($arg)) {
                return true;
            }

            if (! $cascade) {
                return false;
            }
        }

        return false;
    }

    /**
     * Name the bare flag literals the call should carry named, returning whether
     * anything changed. The arguments named are the trailing run anchored on a bare
     * flag:
     *
     * - **Trailing-safe (default)** — the run is the suffix of arguments that are
     *   each already named or a bare flag; the first positional non-flag ends it,
     *   and only flags are named.
     * - **Cascade** — the run may also cross positional non-flag arguments, which
     *   are then named too. This is what lets a flag that is *not* the last
     *   argument be named: PHP forbids a positional argument after a named one, so
     *   every argument to the right of the flag must be named as well.
     *
     * In both modes the run is anchored on a flag (a call with no flag is never
     * touched), cannot cross an unpacked argument or a variadic/unknown parameter,
     * and leaves already-named arguments inside it untouched.
     *
     * @param array<Arg> $args
     * @param array<int, ParameterReflection> $parameters parameters indexed by position
     */
    private function nameFlagArguments(array $args, array $parameters, bool $cascade): bool
    {
        $start = $this->resolveFlagRegionStart($args, $parameters, $cascade);
        if ($start === null) {
            return false;
        }

        // The region always begins on a bare flag (never an already-named
        // argument), so at least that argument is renamed — reaching here is a change.
        for ($index = $start, $count = count($args); $index < $count; ++$index) {
            $arg = $args[$index];
            if (! $arg->name instanceof Identifier) {
                $arg->name = new Identifier($parameters[$index]->getName());
            }
        }

        return true;
    }

    /**
     * Resolve the left-most index a flag-naming run may start at: the position of
     * the left-most bare flag for which every argument from it to the end can be
     * named (or already is). Returns null when no such flag exists. A positional
     * non-flag ends the run in trailing-safe mode and is absorbed into it in cascade
     * mode; an unpacked argument or a variadic/unknown parameter ends it in both.
     *
     * @param array<Arg> $args
     * @param array<int, ParameterReflection> $parameters
     */
    private function resolveFlagRegionStart(array $args, array $parameters, bool $cascade): ?int
    {
        $start = null;

        for ($index = count($args) - 1; $index >= 0; --$index) {
            $arg = $args[$index];

            if ($arg->name instanceof Identifier) {
                continue;
            }

            $parameter = $parameters[$index] ?? null;
            if ($arg->unpack || $parameter === null || $parameter->isVariadic()) {
                break;
            }

            if ($this->isBareBoolOrNullFlag($arg)) {
                $start = $index;

                continue;
            }

            if (! $cascade) {
                break;
            }
        }

        return $start;
    }
}
