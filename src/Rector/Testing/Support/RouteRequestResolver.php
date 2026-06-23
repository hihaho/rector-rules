<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Testing\Support;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\Closure;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Expression;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\ParserFactory;
use PHPStan\Reflection\ReflectionProvider;
use ReflectionNamedType;
use Throwable;

/**
 * Statically resolves, from a consumer's route files, the map
 * `route name => { FormRequest class, is-internal }` that the test-field rule needs —
 * with no `route:list`, no application boot, no generated manifest.
 *
 * This is the pure-static replacement for the per-project test-const generator + JSON
 * map: it derives the same three facts the booted producer did, by reading exactly what
 * the framework's `gatherMiddleware()` would see.
 *
 *  1. **route → FormRequest** — for each `Route::<verb>('uri', Action)->name('n')`, the
 *     action's controller method is reflected and its first {@see FormRequest} parameter
 *     is the request whose constants name the route's fields.
 *  2. **public vs internal** — a route is *internal* iff a configured internal-middleware
 *     FQCN (e.g. `Authenticate::class`) appears in its statically-accumulated middleware
 *     stack as a **`::class` token**. The auth boundary is always a literal `::class`
 *     reference in the route files, so the static stack equals the booted stack.
 *
 * **The `::class`-only gate is load-bearing.** A guard written `Authenticate::using('api')`
 * is a `StaticCall`, not a `::class` fetch; Laravel's `using()` yields the string
 * `'…\Authenticate:api'`, which never equals the bare FQCN, so the booted producer
 * classifies that route **public**. Matching only the `::class` token reproduces that
 * exactly — matching "any mention of Authenticate" would flip a public wire surface to
 * internal and rewrite its keys, a silent value-preserving direction error the drift
 * guard cannot catch. So `::using(...)` (and every other `::method()` form) is opaque.
 *
 * Fail-safe throughout: an unreadable route file, an unparseable middleware argument, a
 * non-static group nesting, or an action that does not resolve to a FormRequest leaves
 * the affected route out of the map. A route absent from the map is never rewritten.
 *
 * @internal
 *
 * @phpstan-type RouteInfo array{request: class-string, internal: bool}
 */
final class RouteRequestResolver
{
    private const array ROUTE_VERBS = ['get', 'post', 'put', 'patch', 'delete', 'options', 'any', 'match'];

    private const string ROUTE_FACADE = Route::class;

    private const string FORM_REQUEST = FormRequest::class;

    /**
     * Lazily-built, memoized `route name => RouteInfo`. Null until {@see routes()} builds it.
     *
     * @var array<string, RouteInfo>|null
     */
    private ?array $routes = null;

    /**
     * Normalised internal-middleware FQCNs (no leading `\`), used for the `::class`-token
     * intersection that classifies a route as internal.
     *
     * @var list<string>
     */
    private readonly array $internalMiddleware;

    private readonly MiddlewareStackReader $middleware;

    /**
     * @param  list<string>  $routeFiles  Absolute paths to the consumer's route files.
     * @param  list<string>  $internalMiddleware  FQCNs whose presence marks a route internal.
     */
    public function __construct(
        private readonly array $routeFiles,
        array $internalMiddleware,
        private readonly ReflectionProvider $reflectionProvider,
    ) {
        $this->internalMiddleware = array_values(array_map(
            static fn (string $fqcn): string => ltrim($fqcn, '\\'),
            $internalMiddleware,
        ));
        $this->middleware = new MiddlewareStackReader();
    }

    /**
     * @return array<string, RouteInfo>
     */
    public function routes(): array
    {
        if ($this->routes !== null) {
            return $this->routes;
        }

        $routes = [];

        foreach ($this->routeFiles as $routeFile) {
            $statements = $this->parseRouteFile($routeFile);

            $this->walk($statements, [], false, $routes);
        }

        return $this->routes = $routes;
    }

    /**
     * @return list<Node\Stmt>
     */
    private function parseRouteFile(string $routeFile): array
    {
        if (! is_file($routeFile) || ! is_readable($routeFile)) {
            return [];
        }

        try {
            $statements = (new ParserFactory())->createForNewestSupportedVersion()
                ->parse((string) file_get_contents($routeFile));
        } catch (Throwable) {
            return [];
        }

        if ($statements === null) {
            return [];
        }

        // Resolve `use Foo\Authenticate; Authenticate::class` to its FullyQualified name,
        // so the `::class`-token comparison is against the real FQCN.
        $traverser = new NodeTraverser(new NameResolver());

        /** @var list<Node\Stmt> $resolved */
        $resolved = $traverser->traverse($statements);

        return $resolved;
    }

    /**
     * Recursively walk statements, accumulating the inherited middleware stack and an
     * ambiguity flag. Each fluent chain either ends in `->group(Closure)` (recurse with own
     * ∪ inherited tokens and own ∨ inherited ambiguity) or defines a route.
     *
     * A route is recorded only when its whole middleware stack is statically readable. A
     * dynamic middleware argument anywhere up the group chain (`->middleware($var)`, a
     * concat, an unrecognised call) means the runtime stack is unknown — it could include
     * the internal middleware — so the route is **omitted** rather than guessed public. That
     * is the safe direction: misclassifying an internal route public would let `to_literal`
     * strip a constant and reintroduce the refactor hazard the rule exists to prevent.
     *
     * @param  array<Node>  $nodes
     * @param  list<string>  $inherited  Resolved `::class` middleware tokens of enclosing groups.
     * @param  bool  $inheritedAmbiguous  Whether an enclosing group had unreadable middleware.
     * @param  array<string, array{request: class-string, internal: bool}>  $routes
     */
    private function walk(array $nodes, array $inherited, bool $inheritedAmbiguous, array &$routes): void
    {
        foreach ($nodes as $node) {
            $expr = $node instanceof Expression ? $node->expr : $node;

            if (! $expr instanceof MethodCall && ! $expr instanceof StaticCall) {
                continue;
            }

            $segments = $this->chainSegments($expr);
            if ($segments === null) {
                continue;
            }

            $analysis = $this->middleware->analyze($segments);
            $stack = [...$inherited, ...$analysis['tokens']];
            $ambiguous = $inheritedAmbiguous || $analysis['ambiguous'];

            $groupClosure = $this->groupClosure($segments);
            if ($groupClosure instanceof Closure) {
                $this->walk($groupClosure->stmts, $stack, $ambiguous, $routes);

                continue;
            }

            if ($ambiguous) {
                continue;
            }

            $this->recordRoute($segments, $stack, $routes);
        }
    }

    /**
     * Flatten a fluent `Route::…->…->…` chain into ordered segments `{name, args}`, base
     * first. Reading middleware / group / verb / name uniformly across **all** segments —
     * the base StaticCall included — is what makes `Route::middleware([...])->group()`
     * (middleware on the base) and `Route::prefix(...)->get(...)` (verb on a chained call)
     * both resolve. Returns null when the chain root is not a `Route` facade call.
     *
     * @return list<array{name: string, args: list<Arg>}>|null
     */
    private function chainSegments(Expr $expr): ?array
    {
        $methodCalls = [];

        while ($expr instanceof MethodCall) {
            $methodCalls[] = $expr;
            $expr = $expr->var;
        }

        if (! $expr instanceof StaticCall
            || ! $expr->class instanceof Name
            || $expr->class->toString() !== self::ROUTE_FACADE
            || ! $expr->name instanceof Identifier) {
            return null;
        }

        $segments = [['name' => $expr->name->toLowerString(), 'args' => array_values($expr->getArgs())]];

        foreach (array_reverse($methodCalls) as $call) {
            // A dynamic method name (`->{$x}(...)`) makes the chain unreadable — we cannot tell
            // whether the call is middleware, group, or the route name. Dropping just that
            // segment could silently lose a middleware token and misclassify the route, so the
            // whole chain is skipped instead (the conservative direction).
            if (! $call->name instanceof Identifier) {
                return null;
            }

            $segments[] = ['name' => $call->name->toLowerString(), 'args' => array_values($call->getArgs())];
        }

        return $segments;
    }

    /**
     * The `Closure` body of a `group(...)` segment — the fluent `->group(fn)` or the
     * array-config `group([...], fn)` (the closure is the last arg in both). Null when no
     * group segment, or the group is over a non-closure (not statically walkable).
     *
     * @param  list<array{name: string, args: list<Arg>}>  $segments
     */
    private function groupClosure(array $segments): ?Closure
    {
        foreach ($segments as $segment) {
            if ($segment['name'] !== 'group') {
                continue;
            }

            $last = $segment['args'][count($segment['args']) - 1]->value ?? null;

            return $last instanceof Closure ? $last : null;
        }

        return null;
    }

    /**
     * Record one route: its name (`name('n')` segment), its FormRequest (the verb segment's
     * action), and its internal flag (stack ∩ configured internal middleware). Any
     * unresolved part drops the route — it stays out of the map and is never rewritten.
     *
     * @param  list<array{name: string, args: list<Arg>}>  $segments
     * @param  list<string>  $stack
     * @param  array<string, array{request: class-string, internal: bool}>  $routes
     */
    private function recordRoute(array $segments, array $stack, array &$routes): void
    {
        $name = $this->routeName($segments);
        if ($name === null) {
            return;
        }

        $request = $this->formRequestForRoute($segments);
        if ($request === null) {
            return;
        }

        $internal = array_intersect($stack, $this->internalMiddleware) !== [];

        $routes[$name] = ['request' => $request, 'internal' => $internal];
    }

    /**
     * The literal route name from a `name('n')` segment, or null when absent or non-literal.
     *
     * @param  list<array{name: string, args: list<Arg>}>  $segments
     */
    private function routeName(array $segments): ?string
    {
        foreach ($segments as $segment) {
            if ($segment['name'] !== 'name') {
                continue;
            }

            $arg = $segment['args'][0]->value ?? null;

            return $arg instanceof String_ ? $arg->value : null;
        }

        return null;
    }

    /**
     * The FormRequest class bound by the chain's verb segment (`get('uri', Action)` etc.),
     * whether the verb is the base `Route::get(...)` or chained on a builder
     * (`Route::prefix(...)->get(...)`): the action's controller method is reflected and its
     * first {@see FormRequest} parameter returned.
     *
     * @param  list<array{name: string, args: list<Arg>}>  $segments
     * @return class-string|null
     */
    private function formRequestForRoute(array $segments): ?string
    {
        foreach ($segments as $segment) {
            if (! in_array($segment['name'], self::ROUTE_VERBS, true)) {
                continue;
            }

            // `match($methods, $uri, $action)` shifts the action by one; every other verb is ($uri, $action).
            $offset = $segment['name'] === 'match' ? 1 : 0;
            $action = $segment['args'][$offset + 1]->value ?? null;
            if (! $action instanceof Expr) {
                return null;
            }

            $method = $this->resolveActionMethod($action);

            return $method === null ? null : $this->firstFormRequestParameter($method);
        }

        return null;
    }

    /**
     * The action's `[class, method]`: a `Controller::class` is invokable (`__invoke`); a
     * `[Controller::class, 'method']` names the method. Closures and string actions are skipped.
     *
     * @return array{string, string}|null
     */
    private function resolveActionMethod(Expr $action): ?array
    {
        if ($action instanceof ClassConstFetch) {
            return $action->class instanceof Name ? [$action->class->toString(), '__invoke'] : null;
        }

        if (! $action instanceof Array_ || count($action->items) !== 2) {
            return null;
        }

        $class = $action->items[0]->value ?? null;
        $method = $action->items[1]->value ?? null;

        if (! $class instanceof ClassConstFetch || ! $class->class instanceof Name || ! $method instanceof String_) {
            return null;
        }

        return [$class->class->toString(), $method->value];
    }

    /**
     * The FQCN of the first parameter of `[$class, $method]` whose type is a {@see FormRequest}
     * subclass, via reflection — or null when the class/method/parameter does not resolve.
     *
     * @param  array{string, string}  $method
     * @return class-string|null
     */
    private function firstFormRequestParameter(array $method): ?string
    {
        [$class, $methodName] = $method;

        if (! $this->reflectionProvider->hasClass($class)) {
            return null;
        }

        $native = $this->reflectionProvider->getClass($class)->getNativeReflection();
        if (! $native->hasMethod($methodName)) {
            return null;
        }

        foreach ($native->getMethod($methodName)->getParameters() as $parameter) {
            $type = $parameter->getType();
            if (! $type instanceof ReflectionNamedType) {
                continue;
            }

            if ($type->isBuiltin()) {
                continue;
            }

            $typeName = $type->getName();
            if (! $this->reflectionProvider->hasClass($typeName)) {
                continue;
            }

            // Native ReflectionClass::isSubclassOf (not PHPStan's deprecated ClassReflection
            // variant); the class is known to the provider per the hasClass() gate above.
            $typeReflection = $this->reflectionProvider->getClass($typeName)->getNativeReflection();
            if ($typeName === self::FORM_REQUEST || $typeReflection->isSubclassOf(self::FORM_REQUEST)) {
                /** @var class-string $typeName */
                return $typeName;
            }
        }

        return null;
    }
}
