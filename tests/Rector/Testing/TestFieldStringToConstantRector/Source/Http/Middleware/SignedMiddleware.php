<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Middleware;

use Closure;

/**
 * A non-auth middleware double, used to prove that a `::class` token which is NOT the
 * configured internal middleware (and a `::using(...)` static call) leave a route public.
 */
class SignedMiddleware
{
    /**
     * A non-`::class` middleware constant. A route referencing `SignedMiddleware::ALIAS` as
     * middleware has a value the resolver cannot read statically, so the route is skipped.
     */
    public const string ALIAS = 'signed';

    public static function using(string $argument): string
    {
        return static::class . ':' . $argument;
    }

    public function handle(object $request, Closure $next): mixed
    {
        return $next($request);
    }
}
