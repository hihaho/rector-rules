<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Middleware;

use Closure;

/**
 * Test double for the auth middleware whose literal `::class` token in a route's
 * middleware stack marks the route internal. Referenced by `::class` in the Source
 * route file; never reflected, only name-matched. The body uses both parameters so
 * the auto-fix deadcode pass cannot strip it (see the package CLAUDE.md note).
 */
class Authenticate
{
    /**
     * Mirrors Laravel's middleware `using()` shape: yields the `'FQCN:args'` string, which
     * is a StaticCall (not a `::class` fetch) — the resolver treats it as opaque, so a route
     * guarded by `Authenticate::using('api')` classifies public, matching the booted stack.
     */
    public static function using(string $guard): string
    {
        return static::class . ':' . $guard;
    }

    public function handle(object $request, Closure $next): mixed
    {
        return $next($request);
    }
}
