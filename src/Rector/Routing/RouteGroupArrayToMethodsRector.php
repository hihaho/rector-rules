<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Routing;

use Hihaho\RectorRules\Rector\Routing\Concerns\ChecksRouteContext;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Routing\RouteGroupArrayToMethodsRector\RouteGroupArrayToMethodsRectorTest
 */
final class RouteGroupArrayToMethodsRector extends AbstractRector
{
    use ChecksRouteContext;

    /** @var array<string, string> */
    private const array KEY_TO_METHOD = [
        'middleware' => 'middleware',
        'prefix' => 'prefix',
        'name' => 'name',
        'as' => 'name',
        'namespace' => 'namespace',
        'domain' => 'domain',
        'where' => 'where',
        'excluded_middleware' => 'withoutMiddleware',
        'scope_bindings' => 'scopeBindings',
    ];

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Convert Route::group() with array options to fluent method chaining',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
Route::group(['middleware' => 'web', 'prefix' => 'admin'], function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
Route::middleware('web')->prefix('admin')->group(function (): void {
    Route::get('dashboard', fn () => 'dashboard');
});
CODE_SAMPLE,
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [StaticCall::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof StaticCall) {
            return null;
        }

        // Cheap structural gate first: the `group` method-name check bails the bulk of
        // static calls before the per-node directory context is consulted.
        if (! $this->isRouteGroupWithArray($node)) {
            return null;
        }

        if (! $this->isInRoutesDirectory()) {
            return null;
        }

        $firstArg = $node->args[0];
        $secondArg = $node->args[1];

        if (! $firstArg instanceof Arg || ! $secondArg instanceof Arg) {
            return null;
        }

        /** @var Array_ $arrayArg */
        $arrayArg = $firstArg->value;

        $methodCalls = $this->buildMethodChain($arrayArg);

        if ($methodCalls === null || $methodCalls === []) {
            return null;
        }

        return $this->createGroupChain($node->class, $methodCalls, $secondArg);
    }

    private function isRouteGroupWithArray(StaticCall $node): bool
    {
        if (! $this->isRouteStaticCall($node, 'group')) {
            return false;
        }

        if (count($node->args) !== 2) {
            return false;
        }

        if (! $node->args[0] instanceof Arg) {
            return false;
        }

        return $node->args[0]->value instanceof Array_;
    }

    /**
     * Returns null if any array key is unrecognized (to avoid silently dropping options).
     *
     * @return list<array{method: string, args: list<Arg>}>|null
     */
    private function buildMethodChain(Array_ $array): ?array
    {
        $methods = [];

        foreach ($array->items as $item) {
            if ($item === null || $item->key === null) {
                return null;
            }

            $key = $this->resolveArrayKey($item->key);

            if ($key === null) {
                return null;
            }

            $method = self::KEY_TO_METHOD[$key] ?? null;

            if ($method === null) {
                return null;
            }

            if ($key === 'scope_bindings' && $this->isFalseValue($item->value)) {
                $methods[] = [
                    'method' => 'withoutScopedBindings',
                    'args' => [],
                ];

                continue;
            }

            $methods[] = [
                'method' => $method,
                'args' => [new Arg($item->value)],
            ];
        }

        return $methods;
    }

    /**
     * @param non-empty-list<array{method: string, args: list<Arg>}> $methodCalls
     */
    private function createGroupChain(Expr|Name $routeClass, array $methodCalls, Arg $closureArg): MethodCall
    {
        $firstMethod = array_shift($methodCalls);

        $current = new StaticCall(
            $routeClass,
            new Identifier($firstMethod['method']),
            $firstMethod['args'],
        );

        foreach ($methodCalls as $methodCall) {
            $node = new MethodCall(
                $current,
                new Identifier($methodCall['method']),
                $methodCall['args'],
            );
            $node->setAttribute(AttributeKey::NEWLINE_ON_FLUENT_CALL, true);
            $current = $node;
        }

        $group = new MethodCall(
            $current,
            new Identifier('group'),
            [$closureArg],
        );
        $group->setAttribute(AttributeKey::NEWLINE_ON_FLUENT_CALL, true);

        return $group;
    }

    private function resolveArrayKey(Expr $key): ?string
    {
        if ($key instanceof String_) {
            return $key->value;
        }

        return $this->getName($key);
    }

    private function isFalseValue(Expr $expr): bool
    {
        if ($expr instanceof ConstFetch) {
            return $this->isName($expr, 'false');
        }

        return false;
    }
}
