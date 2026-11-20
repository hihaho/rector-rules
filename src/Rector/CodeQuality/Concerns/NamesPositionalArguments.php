<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality\Concerns;

use PhpParser\Node\Arg;
use PhpParser\Node\Identifier;
use PHPStan\Reflection\ParameterReflection;

/**
 * Maps a call's positional arguments to parameter names, shared by the rules that
 * name every argument of a long call.
 */
trait NamesPositionalArguments
{
    /**
     * True when no argument is unpacked and at least one is positional. A call
     * whose arguments are all named has nothing left to name, which is also what
     * makes a re-run on an already-converted call a no-op.
     *
     * @param array<Arg> $args
     */
    private function hasOnlyPlainArguments(array $args): bool
    {
        $hasPositional = false;
        foreach ($args as $arg) {
            if ($arg->unpack) {
                return false;
            }

            if (! $arg->name instanceof Identifier) {
                $hasPositional = true;
            }
        }

        return $hasPositional;
    }

    /**
     * Map each positional argument's index to its parameter name. Returns null —
     * skip the whole call — when any argument lands on a variadic parameter
     * (positionally, or as a named argument the variadic would collect) or
     * beyond the parameter list. Naming only part of such a call would leave a
     * positional argument after a named one.
     *
     * @param array<Arg> $args
     * @param array<int, ParameterReflection> $parameters
     * @return array<string>|null
     */
    private function resolveArgumentNames(array $args, array $parameters): ?array
    {
        $parameterNames = [];
        foreach ($parameters as $parameter) {
            if (! $parameter->isVariadic()) {
                $parameterNames[$parameter->getName()] = true;
            }
        }

        $names = [];
        foreach ($args as $index => $arg) {
            if ($arg->name instanceof Identifier) {
                if (! isset($parameterNames[$arg->name->toString()])) {
                    return null;
                }

                continue;
            }

            $parameter = $parameters[$index] ?? null;
            if (! $parameter instanceof ParameterReflection || $parameter->isVariadic()) {
                return null;
            }

            $names[$index] = $parameter->getName();
        }

        return $names;
    }
}
