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
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
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
 * exact resolver string the magic string would otherwise produce, so the rewrite
 * is behaviour-preserving while making references refactor-safe and navigable.
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
     * Defaulted at declaration (not only in configure()) so the rule still works
     * when registered with a bare ->rule(), which never calls configure().
     *
     * @var list<string>
     */
    private array $enabledAliases = ['auth', 'auth.basic', 'can', 'guest', 'password.confirm', 'signed', 'verified'];

    private bool $convertBareAliases = true;

    private bool $includeThrottle = false;

    private ?string $throttleClass = null;

    public function configure(array $configuration): void
    {
        /** @var list<string> $aliases */
        $aliases = $configuration[self::ALIASES] ?? array_keys(self::ALIAS_CLASSES);
        $this->enabledAliases = $aliases;
        $this->convertBareAliases = (bool) ($configuration[self::CONVERT_BARE_ALIASES] ?? true);
        $this->includeThrottle = (bool) ($configuration[self::INCLUDE_THROTTLE] ?? false);

        $throttleClass = $configuration[self::THROTTLE_CLASS] ?? null;
        $this->throttleClass = is_string($throttleClass) ? ltrim($throttleClass, '\\') : null;
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [MethodCall::class, StaticCall::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof MethodCall && ! $node instanceof StaticCall) {
            return null;
        }

        if (! $this->isMiddlewareCall($node)) {
            return null;
        }

        $changed = false;
        foreach ($node->getArgs() as $arg) {
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

    private function isMiddlewareCall(MethodCall|StaticCall $node): bool
    {
        if (! $node->name instanceof Identifier) {
            return false;
        }

        $method = $node->name->toString();
        if (strcasecmp($method, 'middleware') !== 0 && strcasecmp($method, 'withoutMiddleware') !== 0) {
            return false;
        }

        if ($node instanceof StaticCall) {
            return $this->isRouteClass($node);
        }

        $receiverTypes = $this->getType($node->var)->getObjectClassNames();

        return array_intersect($receiverTypes, self::ROUTE_RECEIVER_TYPES) !== [];
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
