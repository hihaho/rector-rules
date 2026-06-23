<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Routing;

use Hihaho\RectorRules\Rector\Routing\Concerns\ChecksRouteContext;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Configuration\Middleware as MiddlewareConfiguration;
use Illuminate\Routing\Controllers\Middleware as ControllerMiddleware;
use Illuminate\Routing\Middleware\ValidateSignature;
use Illuminate\Routing\PendingResourceRegistration;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Routing\RouteRegistrar;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Scalar\String_;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * Rewrite string route-middleware references to Laravel's class-based fluent form.
 *
 * Laravel 10.9 added static "named middleware" helpers — `Authenticate::using()`,
 * `Authorize::using()`, `ValidateSignature::relative()`, … — each returning the
 * exact resolver string the magic string would otherwise produce. The rewrite is
 * behaviour-preserving **only for an alias that still points at the framework class**
 * it hardcodes ({@see ALIAS_CLASSES}). An application that remaps an alias to its own
 * subclass in the middleware-alias map (commonly `auth` → a custom `Authenticate`,
 * `guest` → a custom `RedirectIfAuthenticated`, carrying real logic) would have that
 * logic silently bypassed, since `using()` resolves to the *framework* class. The rule
 * cannot read a consumer's alias map from the call site, so the two most-often-remapped
 * aliases, `auth` and `guest`, are **excluded from the default convert-set**
 * ({@see DEFAULT_ALIASES}); convert them only by listing them explicitly in
 * {@see ALIASES} after confirming they are unremapped.
 *
 * Opt-in: not in any set, reachable by FQN. `throttle` is excluded by default
 * because its target class (`ThrottleRequests` vs `ThrottleRequestsWithRedis`) is
 * per-application config that cannot be read from the call site — enable it with
 * {@see INCLUDE_THROTTLE} plus an explicit {@see THROTTLE_CLASS}.
 *
 * @see \Hihaho\RectorRules\Tests\Rector\Routing\MiddlewareStringToClassRector\MiddlewareStringToClassRectorTest
 */
final class MiddlewareStringToClassRector extends AbstractRector implements ConfigurableRectorInterface
{
    use ChecksRouteContext;

    public const string ALIASES = 'aliases';

    public const string CONVERT_BARE_ALIASES = 'convert_bare_aliases';

    public const string INCLUDE_THROTTLE = 'include_throttle';

    public const string THROTTLE_CLASS = 'throttle_class';

    /**
     * The receiver types whose `middleware()` / `withoutMiddleware()` this rule
     * rewrites — the Illuminate routing registration objects, never an unrelated
     * class that happens to expose a `middleware()` method.
     *
     * @var list<string>
     */
    private const array ROUTE_RECEIVER_TYPES = [
        Route::class,
        RouteRegistrar::class,
        Router::class,
        PendingResourceRegistration::class,
    ];

    /**
     * The convertible first-party aliases and the class each resolves to. Their
     * helper strategy lives in {@see buildHelperCall()}; `throttle` is handled
     * separately because its class is configuration-dependent.
     *
     * @var array<string, string>
     */
    private const array ALIAS_CLASSES = [
        'auth' => Authenticate::class,
        'auth.basic' => AuthenticateWithBasicAuth::class,
        'can' => Authorize::class,
        'guest' => RedirectIfAuthenticated::class,
        'password.confirm' => RequirePassword::class,
        'signed' => ValidateSignature::class,
        'verified' => EnsureEmailIsVerified::class,
    ];

    /**
     * The aliases converted by default — every {@see ALIAS_CLASSES} key *except*
     * `auth` and `guest`. Those two are the ones an application most often remaps to a
     * logic-bearing subclass, so converting them to the hardcoded framework class would
     * silently change behaviour. They remain convertible when listed explicitly in
     * {@see ALIASES}.
     *
     * @var list<string>
     */
    private const array DEFAULT_ALIASES = ['auth.basic', 'can', 'password.confirm', 'signed', 'verified'];

    /**
     * Defaulted at declaration (not only in configure()) so the rule still works
     * when registered with a bare ->rule(), which never calls configure().
     *
     * @var list<string>
     */
    private array $enabledAliases = self::DEFAULT_ALIASES;

    private bool $convertBareAliases = true;

    private bool $includeThrottle = false;

    private ?string $throttleClass = null;

    public function configure(array $configuration): void
    {
        /** @var list<string> $aliases */
        $aliases = $configuration[self::ALIASES] ?? self::DEFAULT_ALIASES;
        $this->enabledAliases = $aliases;
        $this->convertBareAliases = (bool) ($configuration[self::CONVERT_BARE_ALIASES] ?? true);
        $this->includeThrottle = (bool) ($configuration[self::INCLUDE_THROTTLE] ?? false);

        $throttleClass = $configuration[self::THROTTLE_CLASS] ?? null;
        $this->throttleClass = is_string($throttleClass) ? ltrim($throttleClass, '\\') : null;
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [MethodCall::class, StaticCall::class, New_::class];
    }

    /**
     * @param MethodCall|StaticCall|New_ $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof MethodCall && ! $node instanceof StaticCall && ! $node instanceof New_) {
            return null;
        }

        $args = $this->middlewareArgs($node);
        if ($args === null) {
            return null;
        }

        $changed = false;
        foreach ($args as $arg) {
            $changed = $this->rewriteArgument($arg) || $changed;
        }

        return $changed ? $node : null;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Rewrite string route-middleware references to the class-based fluent form (Authenticate::using(), Authorize::using(), …)',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
Route::middleware('auth:sanctum')->group(function (): void {
    Route::get('/posts', [PostController::class, 'index'])->middleware('can:viewAny,post');
});
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
Route::middleware(\Illuminate\Auth\Middleware\Authenticate::using('sanctum'))->group(function (): void {
    Route::get('/posts', [PostController::class, 'index'])->middleware(\Illuminate\Auth\Middleware\Authorize::using('viewAny', 'post'));
});
CODE_SAMPLE,
                    [self::CONVERT_BARE_ALIASES => true],
                ),
            ],
        );
    }

    /**
     * The arguments that hold middleware references for this call, or null when the
     * node is not a middleware sink this rule rewrites. Different sinks place the
     * middleware differently:
     *
     * - `->middleware()` / `->withoutMiddleware()` on a routing object, and the
     *   `Route::` facade form — every argument is a middleware reference.
     * - the `bootstrap/app.php` middleware configurator — `group($group, $middleware)`
     *   keeps the group name and rewrites `$middleware` (arg 1); `append`/`prepend`
     *   rewrite `$middleware` (arg 0).
     * - `new Middleware(...)` controller value objects (Laravel 11+) — `$middleware`
     *   (arg 0); the `$only` / `$except` filters are left alone.
     *
     * The single-`$middleware` sinks resolve that argument by name when the call uses
     * PHP 8 named arguments, falling back to source position only when it is safe.
     *
     * @return Arg[]|null
     */
    private function middlewareArgs(MethodCall|StaticCall|New_ $node): ?array
    {
        if ($node instanceof New_) {
            return $this->isControllerMiddlewareValueObject($node)
                ? $this->singleMiddlewareArg($node->getArgs(), 0)
                : null;
        }

        if (! $node->name instanceof Identifier) {
            return null;
        }

        $method = strtolower($node->name->toString());

        if ($node instanceof StaticCall) {
            return $this->isMiddlewareMethod($method) && $this->isRouteClass($node)
                ? $node->getArgs()
                : null;
        }

        // Gate on the method name before the expensive receiver-type resolution: only
        // these few method names can be a middleware sink, so the type resolver never
        // runs for the overwhelming majority of method calls (the per-node hot path).
        if ($this->isMiddlewareMethod($method)) {
            $receiverTypes = $this->getType($node->var)->getObjectClassNames();

            return array_intersect($receiverTypes, self::ROUTE_RECEIVER_TYPES) !== []
                ? $node->getArgs()
                : null;
        }

        return match ($method) {
            'group' => $this->isMiddlewareConfigurator($node) ? $this->singleMiddlewareArg($node->getArgs(), 1) : null,
            'append', 'prepend' => $this->isMiddlewareConfigurator($node) ? $this->singleMiddlewareArg($node->getArgs(), 0) : null,
            default => null,
        };
    }

    /**
     * The single `$middleware` argument of a sink that takes exactly one — resolved by
     * name when the call uses named arguments (every such sink names the parameter
     * `middleware`), else by source position. Returns null when a named argument has
     * made the source position unreliable, so a wrong argument is never rewritten.
     *
     * @param  Arg[]  $args
     * @return list<Arg>|null
     */
    private function singleMiddlewareArg(array $args, int $position): ?array
    {
        foreach ($args as $arg) {
            if ($arg->name instanceof Identifier && $arg->name->toString() === 'middleware') {
                return [$arg];
            }
        }

        // No `middleware:` named argument. PHP requires positional arguments before
        // named ones, so the argument at this source position is still the right one as
        // long as it is itself positional — a later `only:`/`except:` named argument
        // does not shift it. A *named* argument in this slot means the position is
        // unreliable, so skip rather than guess.
        $arg = $args[$position] ?? null;

        return $arg instanceof Arg && ! $arg->name instanceof Identifier ? [$arg] : null;
    }

    private function isMiddlewareMethod(string $method): bool
    {
        return $method === 'middleware' || $method === 'withoutmiddleware';
    }

    private function isMiddlewareConfigurator(MethodCall $node): bool
    {
        return in_array(MiddlewareConfiguration::class, $this->getType($node->var)->getObjectClassNames(), true);
    }

    private function isControllerMiddlewareValueObject(New_ $node): bool
    {
        return $node->class instanceof Name
            && $this->getName($node->class) === ControllerMiddleware::class;
    }

    private function rewriteArgument(Arg $arg): bool
    {
        if ($arg->value instanceof String_) {
            $replacement = $this->convertString($arg->value->value);
            if ($replacement instanceof Expr) {
                $arg->value = $replacement;

                return true;
            }

            return false;
        }

        if ($arg->value instanceof Array_) {
            $changed = false;
            foreach ($arg->value->items as $item) {
                if ($item instanceof ArrayItem && ! $item->key instanceof Expr && $item->value instanceof String_) {
                    $replacement = $this->convertString($item->value->value);
                    if ($replacement instanceof Expr) {
                        $item->value = $replacement;
                        $changed = true;
                    }
                }
            }

            return $changed;
        }

        return false;
    }

    private function convertString(string $middleware): ?Expr
    {
        // Split on the first colon only: 'throttle:60,1' → ['throttle', '60,1'].
        [$alias, $paramString] = array_pad(explode(':', $middleware, 2), 2, null);

        // A parameter that itself contains a colon cannot round-trip through the
        // single-colon helper form — leave it untouched.
        if ($paramString !== null && str_contains($paramString, ':')) {
            return null;
        }

        $params = $paramString === null ? [] : explode(',', $paramString);

        if ($alias === 'throttle') {
            return $this->convertThrottle($params);
        }

        if (! in_array($alias, $this->enabledAliases, true) || ! isset(self::ALIAS_CLASSES[$alias])) {
            return null;
        }

        if ($params === []) {
            // 'can' alone has no ability and is not a valid bare reference.
            if (! $this->convertBareAliases || $alias === 'can') {
                return null;
            }

            return $this->classConstFetch(self::ALIAS_CLASSES[$alias]);
        }

        return $this->buildHelperCall($alias, $params);
    }

    /**
     * @param list<string> $params
     */
    private function buildHelperCall(string $alias, array $params): ?Expr
    {
        $class = self::ALIAS_CLASSES[$alias];

        return match ($alias) {
            // redirectTo() takes a single route name; anything else can't round-trip.
            'verified' => count($params) === 1
                ? $this->staticCall($class, 'redirectTo', $this->stringArgs($params))
                : null,
            // The signed alias selects relative/absolute mode by its first token;
            // remaining tokens are the ignored parameter names.
            'signed' => $params[0] === 'relative'
                ? $this->staticCall($class, 'relative', $this->stringArgs(array_slice($params, 1)))
                : $this->staticCall($class, 'absolute', $this->stringArgs($params)),
            // auth / auth.basic / can / guest / password.confirm all take using().
            default => $this->staticCall($class, 'using', $this->stringArgs($params)),
        };
    }

    /**
     * @param list<string> $params
     */
    private function convertThrottle(array $params): ?Expr
    {
        // The throttle class is per-application config (ThrottleRequests vs
        // ThrottleRequestsWithRedis vs a custom subclass) that cannot be read from the
        // call site, so it must be supplied explicitly — never guessed.
        if (! $this->includeThrottle || $this->throttleClass === null || $params === []) {
            return null;
        }

        // A numeric first parameter is the inline max,decay[,prefix] form → with();
        // a non-numeric one is a named limiter → using() (a single name only).
        if (ctype_digit($params[0])) {
            $args = array_map(
                static fn (string $param): Arg => new Arg(
                    ctype_digit($param) ? new Int_((int) $param) : new String_($param),
                ),
                $params,
            );

            return $this->staticCall($this->throttleClass, 'with', $args);
        }

        if (count($params) !== 1) {
            return null;
        }

        return $this->staticCall($this->throttleClass, 'using', $this->stringArgs($params));
    }

    private function classConstFetch(string $class): ClassConstFetch
    {
        return new ClassConstFetch(new FullyQualified($class), new Identifier('class'));
    }

    /**
     * @param list<Arg> $args
     */
    private function staticCall(string $class, string $method, array $args): StaticCall
    {
        return new StaticCall(new FullyQualified($class), new Identifier($method), $args);
    }

    /**
     * @param list<string> $params
     * @return list<Arg>
     */
    private function stringArgs(array $params): array
    {
        return array_map(static fn (string $param): Arg => new Arg(new String_($param)), $params);
    }
}
