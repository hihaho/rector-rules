<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Testing\Support;

use PhpParser\Node\Arg;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;

/**
 * Reads a route chain's middleware from its flattened segments: its statically-readable
 * tokens (`::class` FQCNs and string aliases), and whether any middleware argument is
 * dynamic (not statically readable). The token gate and the skip-on-dynamic safety rail
 * both live here, split from {@see RouteRequestResolver} (which walks the route tree) so
 * each does one job.
 *
 * **A token is a literal `Foo::class` fetch or a string alias — nothing else.** A
 * `Foo::using(...)` static call and a variable are NOT tokens. Laravel's
 * `Authenticate::using('api')` yields the string `'…\Authenticate:api'`, which never equals
 * the bare `Authenticate` FQCN, so the booted middleware stack does not contain the bare
 * class — and neither does this token set. Matching the `::using` call as if it were the
 * class would flip a public wire surface to internal; reading only the literal token
 * reproduces booted exactly. The caller decides which tokens mark a route internal, so a
 * string alias (`'auth'`) is a token too — an adopter whose auth boundary is an alias lists
 * that alias in its internal-middleware config; an unlisted token is just treated public.
 *
 * @internal
 *
 * @phpstan-type Segment array{name: string, args: list<Arg>}
 */
final class MiddlewareStackReader
{
    /**
     * The statically-readable tokens of the chain's middleware (`::class` FQCNs and string
     * aliases), and whether any middleware argument is dynamic (a variable, concatenation,
     * call, or array containing one) — in which case the runtime stack is unknown and the
     * caller must not classify the route.
     *
     * @param  list<Segment>  $segments
     * @return array{tokens: list<string>, ambiguous: bool}
     */
    public function analyze(array $segments): array
    {
        $tokens = [];
        $ambiguous = false;

        foreach ($this->middlewareValues($segments) as $value) {
            $tokens = [...$tokens, ...$this->tokens($value)];
            $ambiguous = $ambiguous || $this->isDynamic($value);
        }

        return ['tokens' => $tokens, 'ambiguous' => $ambiguous];
    }

    /**
     * Every middleware-argument expression in the chain: the args of each `middleware(...)`
     * segment, plus the `'middleware'` value of an array-config `group([...], fn)` segment
     * (supported for adopters; hihaho uses the fluent form).
     *
     * @param  list<Segment>  $segments
     * @return list<Expr>
     */
    private function middlewareValues(array $segments): array
    {
        $values = [];

        foreach ($segments as $segment) {
            if ($segment['name'] === 'middleware') {
                foreach ($segment['args'] as $arg) {
                    $values[] = $arg->value;
                }

                continue;
            }

            if ($segment['name'] === 'group') {
                $config = $segment['args'][0]->value ?? null;
                $middleware = $config instanceof Array_ ? $this->configMiddlewareValue($config) : null;
                if ($middleware instanceof Expr) {
                    $values[] = $middleware;
                }
            }
        }

        return $values;
    }

    /** The value of the `'middleware'` key in an array-config group argument, or null. */
    private function configMiddlewareValue(Array_ $config): ?Expr
    {
        foreach ($config->items as $item) {
            if ($item instanceof ArrayItem
                && $item->key instanceof String_
                && $item->key->value === 'middleware') {
                return $item->value;
            }
        }

        return null;
    }

    /**
     * The readable tokens of a middleware value — the FQCN of a `Foo::class` fetch, a string
     * alias's literal, or the union over an array's elements. A `::using(...)` static call
     * and any dynamic form yield nothing (opaque, never matched against the internal set).
     *
     * @return list<string>
     */
    private function tokens(Expr $value): array
    {
        if ($value instanceof Array_) {
            $tokens = [];
            foreach ($value->items as $item) {
                if ($item instanceof ArrayItem) {
                    $tokens = [...$tokens, ...$this->tokens($item->value)];
                }
            }

            return $tokens;
        }

        if ($value instanceof String_) {
            return [$value->value];
        }

        if ($value instanceof ClassConstFetch
            && $value->class instanceof Name
            && $value->name instanceof Identifier
            && $value->name->toLowerString() === 'class') {
            return [ltrim($value->class->toString(), '\\')];
        }

        return [];
    }

    /**
     * Whether a middleware value is dynamic (its runtime value cannot be read statically). A
     * string literal, a `Foo::class` fetch, or a static call is readable; an array is readable
     * iff every element is; anything else (variable, concat, call) is dynamic.
     *
     * A **non-`::class`** class-constant ref (`Foo::AUTH_MW`) is dynamic: its value is unknown
     * statically and could be the internal middleware, so a route guarded by one must be
     * skipped rather than guessed public (which would let `to_literal` strip a constant on an
     * actually-internal route).
     */
    private function isDynamic(Expr $value): bool
    {
        if ($value instanceof String_ || $value instanceof StaticCall) {
            return false;
        }

        if ($value instanceof ClassConstFetch) {
            return ! ($value->name instanceof Identifier && $value->name->toLowerString() === 'class');
        }

        if ($value instanceof Array_) {
            foreach ($value->items as $item) {
                if ($item instanceof ArrayItem && $this->isDynamic($item->value)) {
                    return true;
                }
            }

            return false;
        }

        return true;
    }
}
