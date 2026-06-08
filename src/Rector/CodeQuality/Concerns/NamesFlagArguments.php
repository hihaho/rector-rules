<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality\Concerns;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Identifier;

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
        if ($arg->name !== null || $arg->unpack) {
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
}
