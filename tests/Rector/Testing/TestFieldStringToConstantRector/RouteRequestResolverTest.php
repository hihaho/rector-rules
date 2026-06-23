<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector;

use Hihaho\RectorRules\Rector\Testing\Support\RouteRequestResolver;
use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Middleware\Authenticate;
use Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests\StoreOrderRequest;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

/**
 * Exercises route classification directly against real, autoloadable Source controllers and
 * requests, with synthetic route files standing in for a consumer's `routes/`. This is the
 * resolver-layer matrix: it pins the public/internal verdict (and the route→request mapping)
 * before the rule layer consumes it.
 *
 * The `Authenticate::using('api')` → public case is the load-bearing one: it is the
 * static==booted equivalence contract expressed as a test — only a bare `Authenticate::class`
 * token marks a route internal, so a parameterised `::using()` guard stays public exactly as
 * the booted middleware stack would.
 */
final class RouteRequestResolverTest extends AbstractRectorTestCase
{
    /** @var array<string, array{request: class-string, internal: bool}> */
    private array $routes;

    protected function setUp(): void
    {
        parent::setUp();

        $resolver = new RouteRequestResolver(
            [
                __DIR__ . '/Source/RouteFiles/classified.php',
                __DIR__ . '/Source/RouteFiles/skipped.php',
                __DIR__ . '/Source/RouteFiles/namespaced.php',
            ],
            [Authenticate::class],
            $this->make(ReflectionProvider::class),
        );

        $this->routes = $resolver->routes();
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/configured_rule.php';
    }

    public function test_bare_authenticate_class_group_is_internal(): void
    {
        $this->assertTrue($this->routes['orders.store']['internal'] ?? null);
        $this->assertSame(StoreOrderRequest::class, $this->routes['orders.store']['request'] ?? null);
    }

    public function test_authenticate_using_static_call_stays_public(): void
    {
        $this->assertArrayHasKey('api.store', $this->routes);
        $this->assertFalse($this->routes['api.store']['internal']);
    }

    public function test_web_string_alias_group_is_public(): void
    {
        $this->assertArrayHasKey('web.store', $this->routes);
        $this->assertFalse($this->routes['web.store']['internal']);
    }

    public function test_nested_group_inherits_internal(): void
    {
        $this->assertTrue($this->routes['nested.internal.store']['internal'] ?? null);
    }

    public function test_nested_route_under_web_only_is_public(): void
    {
        $this->assertArrayHasKey('nested.public.store', $this->routes);
        $this->assertFalse($this->routes['nested.public.store']['internal']);
    }

    public function test_mixed_array_without_authenticate_is_public(): void
    {
        $this->assertArrayHasKey('mixed.store', $this->routes);
        $this->assertFalse($this->routes['mixed.store']['internal']);
    }

    public function test_match_verb_resolves_the_shifted_action(): void
    {
        // Route::match([$methods], $uri, $action) shifts the action by one — the offset must
        // still land on the FormRequest action.
        $this->assertTrue($this->routes['match.store']['internal'] ?? null);
        $this->assertSame(StoreOrderRequest::class, $this->routes['match.store']['request'] ?? null);
    }

    public function test_invokable_controller_resolves_its_form_request(): void
    {
        $this->assertArrayHasKey('invoke.store', $this->routes);
        $this->assertSame(StoreOrderRequest::class, $this->routes['invoke.store']['request']);
    }

    public function test_array_config_group_middleware_is_internal(): void
    {
        // Route::group(['middleware' => [Authenticate::class]], fn) — the token comes from the
        // config array, not a fluent ->middleware() call.
        $this->assertTrue($this->routes['arrayconfig.store']['internal'] ?? null);
    }

    public function test_string_alias_is_public_when_not_in_internal_config(): void
    {
        // The main resolver's internal-middleware list is the Authenticate FQCN only, so the
        // 'auth' string token does not match — the route is public (the config contract:
        // unlisted tokens are public).
        $this->assertArrayHasKey('alias.store', $this->routes);
        $this->assertFalse($this->routes['alias.store']['internal']);
    }

    public function test_string_alias_is_internal_when_configured(): void
    {
        // An alias-based app lists 'auth' in internalMiddleware; the same route then
        // classifies internal — the string-alias boundary an adopter without ::class tokens needs.
        $resolver = new RouteRequestResolver(
            [__DIR__ . '/Source/RouteFiles/classified.php'],
            ['auth'],
            $this->make(ReflectionProvider::class),
        );

        $this->assertTrue($resolver->routes()['alias.store']['internal'] ?? null);
    }

    public function test_dynamic_middleware_route_is_skipped(): void
    {
        $this->assertArrayNotHasKey('skip.dynamic', $this->routes);
    }

    public function test_non_constant_route_name_is_skipped(): void
    {
        $this->assertArrayNotHasKey('skip.name', $this->routes);
    }

    public function test_action_without_form_request_is_skipped(): void
    {
        $this->assertArrayNotHasKey('skip.noform', $this->routes);
    }

    public function test_non_class_const_referenced_middleware_is_skipped(): void
    {
        // A non-::class const ref (SignedMiddleware::ALIAS) holds an unknown value — it could
        // be the internal middleware — so the route is omitted rather than guessed public.
        $this->assertArrayNotHasKey('skip.const.middleware', $this->routes);
    }

    public function test_namespaced_route_file_is_walked(): void
    {
        // A route file with a non-braced `namespace …;` wraps all statements in one
        // Stmt\Namespace_; the resolver must descend into it, or the whole file is skipped.
        $this->assertTrue($this->routes['namespaced.store']['internal'] ?? null);
        $this->assertSame(StoreOrderRequest::class, $this->routes['namespaced.store']['request'] ?? null);
    }

    public function test_control_route_proves_the_skip_file_parsed(): void
    {
        $this->assertTrue($this->routes['present.control']['internal'] ?? null);
    }
}
