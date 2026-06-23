<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Testing;

use Hihaho\RectorRules\Rector\Testing\Support\RequestConstantResolver;
use Hihaho\RectorRules\Rector\Testing\Support\RouteRequestResolver;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Scalar\String_;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Rector\AbstractRector;
use Rector\ValueObject\PhpVersion;
use Rector\VersionBonding\Contract\MinPhpVersionInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * Align a test's request-payload field-name array keys with the endpoint's FormRequest
 * constants, in whichever direction the endpoint requires — resolving everything itself
 * from the consumer's route files, with no manifest, generator, or application boot.
 *
 * The motivating risk is **asymmetric**: in a test that exercises an *internal* endpoint,
 * a literal field name (`'id'`, `'player_url'`) is a refactor hazard — a field rename
 * silently desyncs the test from the request. But in a test that exercises a *public API
 * surface*, that same literal **is the wire contract**, and a constant there lets a
 * value-rename pass the test while breaking the public API. So the safe move differs by
 * endpoint, and the rule is **bidirectional**:
 *
 * - `to_const` (internal endpoint) — a string-literal key becomes the FormRequest's
 *   matching constant (`['id' => …]` → `[StoreOrderRequest::ID => …]`).
 * - `to_literal` (public endpoint) — a constant key is inlined back to its literal string
 *   (`[StoreOrderRequest::ID => …]` → `['id' => …]`), restoring the wire contract.
 *
 * The endpoint classification and the field→constant mapping are derived statically by
 * {@see RouteRequestResolver} from the configured route files: each `route('name')` maps
 * to its controller's {@see \Illuminate\Foundation\Http\FormRequest} (whose first-party
 * `string` constants name the fields) and to a public/internal verdict (internal iff a
 * configured {@see ROUTE_FILES sibling} middleware FQCN appears as a literal `::class`
 * token in the route's statically-accumulated middleware stack). A route the resolver
 * cannot prove — unknown name, unparseable middleware, no FormRequest — is absent from
 * the map and left untouched (default-safe).
 *
 * **Correlation is same-call-site.** The rule rewrites a payload only where the request
 * verb call names its route directly: `$this->postJson(route('orders.store'), ['id' => …])`.
 * The route name is read from a literal `route('name', …)` in argument position 0; the
 * payload is the **first array argument** of the verb call (Laravel's `$uri, $data,
 * $headers` signature, so a trailing headers array is never mistaken for the payload, and
 * `route()`'s own nested array args are inside the `route()` call, not direct verb args).
 * A variable URL (`post($url, …)`), a raw-string URL, or a non-literal route name is
 * skipped — variable dataflow is out of scope for v1.
 *
 * The rule is position-aware: it rewrites a matching key only where it is an **array key**.
 * A field name in *value* position (`['type' => 'id']`) is never a field reference and is
 * structurally untouchable — only `ArrayItem::$key` of the payload array is visited.
 *
 * Assertion arrays (`assertJson([...])`) are intentionally **out of scope**: they check
 * the *response*, whose keys are resource/response keys, not the request's FormRequest
 * constants this resolver knows. Rewriting them with request constants would be unsound.
 *
 * @see \Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\TestFieldStringToConstantRectorTest
 */
final class TestFieldStringToConstantRector extends AbstractRector implements ConfigurableRectorInterface, MinPhpVersionInterface
{
    /** Absolute paths of the consumer's route files, statically parsed for the route→request map. */
    public const string ROUTE_FILES = 'route_files';

    /**
     * Tokens whose presence in a route's statically-read middleware stack marks it internal —
     * middleware FQCNs (matched as `Foo::class`) and/or string aliases (matched as
     * `'auth'`). A token not listed here is treated public; the boundary must appear as a
     * direct token in the route files, not hidden inside a middleware-group expansion.
     */
    public const string INTERNAL_MIDDLEWARE = 'internal_middleware';

    /** Namespace prefix of constants eligible for rewriting (first-party request classes). */
    public const string FIRST_PARTY_PREFIX = 'first_party_prefix';

    /**
     * Request-verb methods that carry a payload array. Lower-cased; method names are
     * case-insensitive in PHP, so the gate compares against the lower-cased call name.
     */
    private const array PAYLOAD_VERB_METHODS = ['post', 'put', 'patch', 'postjson', 'putjson', 'patchjson'];

    /** @var list<string> */
    private array $routeFiles = [];

    /** @var list<string> */
    private array $internalMiddleware = [];

    private string $firstPartyPrefix = '';

    /** Lazily built from the config above, once per Rector run. */
    private ?RouteRequestResolver $resolver = null;

    /** Lazily built from {@see FIRST_PARTY_PREFIX}, once per Rector run. */
    private ?RequestConstantResolver $constants = null;

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function configure(array $configuration): void
    {
        $routeFiles = $configuration[self::ROUTE_FILES] ?? [];
        Assert::isArray($routeFiles);
        Assert::allStringNotEmpty($routeFiles);

        $internalMiddleware = $configuration[self::INTERNAL_MIDDLEWARE] ?? [];
        Assert::isArray($internalMiddleware);
        Assert::allStringNotEmpty($internalMiddleware);

        $firstPartyPrefix = $configuration[self::FIRST_PARTY_PREFIX] ?? '';
        Assert::stringNotEmpty($firstPartyPrefix);

        $this->routeFiles = array_values($routeFiles);
        $this->internalMiddleware = array_values($internalMiddleware);
        $this->firstPartyPrefix = $firstPartyPrefix;
        $this->resolver = null;
        $this->constants = null;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            "Align a test's request-payload field-name array keys with the endpoint's FormRequest constants, in the direction the endpoint requires (internal → constant, public → literal), resolved statically from the route files",
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$this->postJson(route('orders.store'), ['id' => $order->id]);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$this->postJson(route('orders.store'), [\App\Http\Requests\StoreOrderRequest::ID => $order->id]);
CODE_SAMPLE,
                    [
                        self::ROUTE_FILES => ['/abs/path/routes/web.php'],
                        self::INTERNAL_MIDDLEWARE => ['App\Http\Middleware\Authenticate'],
                        self::FIRST_PARTY_PREFIX => 'App\\',
                    ],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [MethodCall::class];
    }

    /**
     * @param MethodCall $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof MethodCall
            || ! $node->name instanceof Identifier
            || ! in_array($node->name->toLowerString(), self::PAYLOAD_VERB_METHODS, true)) {
            return null;
        }

        if ($this->routeFiles === []) {
            return null;
        }

        $args = array_values($node->getArgs());

        $routeName = $this->routeNameFromArg($args[0]->value ?? null);
        if ($routeName === null) {
            return null;
        }

        $payload = $this->firstArrayArg($args);
        if (! $payload instanceof Array_) {
            return null;
        }

        $info = $this->resolver()->routes()[$routeName] ?? null;
        if ($info === null) {
            return null;
        }

        $changed = $info['internal']
            ? $this->rewriteToConst($payload, $this->constants()->fieldConstants($info['request']))
            : $this->rewriteToLiteral($payload, $info['request']);

        return $changed ? $node : null;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersion::PHP_80;
    }

    private function resolver(): RouteRequestResolver
    {
        return $this->resolver ??= new RouteRequestResolver(
            $this->routeFiles,
            $this->internalMiddleware,
            $this->reflectionProvider,
        );
    }

    private function constants(): RequestConstantResolver
    {
        return $this->constants ??= new RequestConstantResolver(
            $this->firstPartyPrefix,
            $this->reflectionProvider,
        );
    }

    /**
     * The route name from a verb call's first argument when it is a literal
     * `route('name', …)` helper call — else null. Route-parameter args after the name are
     * ignored; only the literal name matters.
     */
    private function routeNameFromArg(?Expr $arg): ?string
    {
        if (! $arg instanceof FuncCall || ! $arg->name instanceof Name) {
            return null;
        }

        if (strcasecmp(ltrim($arg->name->toString(), '\\'), 'route') !== 0) {
            return null;
        }

        $first = $arg->getArgs()[0]->value ?? null;

        return $first instanceof String_ ? $first->value : null;
    }

    /**
     * The first argument of the verb call whose value is an array literal — the payload.
     * Laravel's request helpers are `$uri, $data, $headers`, so the first array is the
     * payload and a trailing headers array is left alone.
     *
     * @param  list<Arg>  $args
     */
    private function firstArrayArg(array $args): ?Array_
    {
        foreach ($args as $arg) {
            if ($arg->value instanceof Array_) {
                return $arg->value;
            }
        }

        return null;
    }

    /**
     * Internal endpoint: rewrite each string-literal payload key that names a known field
     * constant into that `Class::CONST` fetch.
     *
     * @param  array<string, string>  $fieldConstants  value => "FQCN::CONST"
     */
    private function rewriteToConst(Array_ $payload, array $fieldConstants): bool
    {
        $changed = false;

        foreach ($payload->items as $item) {
            if (! $item instanceof ArrayItem) {
                continue;
            }

            if (! $item->key instanceof String_) {
                continue;
            }

            $fqcn = $fieldConstants[$item->key->value] ?? null;
            if ($fqcn === null) {
                continue;
            }

            [$class, $const] = explode('::', $fqcn, 2);
            $item->key = new ClassConstFetch(new FullyQualified($class), new Identifier($const));
            $changed = true;
        }

        return $changed;
    }

    /**
     * Public endpoint: inline each class-constant payload key back to its wire-contract
     * string literal. The value is read **directly** from the constant by the resolver
     * (membership-checked against the route's request, first-party + `string` only,
     * reflected fresh) — so a constant whose value is no longer a string, or one that is not
     * this request's field, is left untouched (drift guard), and duplicate-valued constants
     * resolve correctly.
     *
     * @param  class-string  $requestClass
     */
    private function rewriteToLiteral(Array_ $payload, string $requestClass): bool
    {
        $changed = false;

        foreach ($payload->items as $item) {
            if (! $item instanceof ArrayItem) {
                continue;
            }

            if (! $item->key instanceof ClassConstFetch) {
                continue;
            }

            $value = $this->literalForConstFetch($item->key, $requestClass);
            if ($value === null) {
                continue;
            }

            $item->key = new String_($value);
            $changed = true;
        }

        return $changed;
    }

    /**
     * The wire literal a class-constant key maps to, or null when it is not a first-party
     * field constant of the route's request. A dynamic class (`$x::FOO`) or `::class` fetch
     * never resolves a name and so never matches.
     *
     * @param  class-string  $requestClass
     */
    private function literalForConstFetch(ClassConstFetch $fetch, string $requestClass): ?string
    {
        if (! $fetch->class instanceof Name || ! $fetch->name instanceof Identifier) {
            return null;
        }

        $class = $this->getName($fetch->class);
        if ($class === null) {
            return null;
        }

        return $this->constants()->literalForConstant($requestClass, $class, $fetch->name->toString());
    }
}
