<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use PhpParser\Node;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\BinaryOp\Concat;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Scalar\String_;
use PHPStan\Type\ObjectType;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\NestedArrayEagerLoadingRectorTest
 */
final class NestedArrayEagerLoadingRector extends AbstractRector
{
    /**
     * Eager-load methods this rule targets, lowercased — PHP method names are
     * case-insensitive, so the gate compares the lowercased call name.
     *
     * @var list<string>
     */
    private const array EAGER_LOAD_METHODS = ['with', 'load', 'loadmissing', 'loadcount'];

    /**
     * The reshape only makes sense for Eloquent eager loading. Without a receiver-type
     * gate, any unrelated fluent `with([...])`/`load([...])` (a view, response, or DTO
     * builder) whose array happened to hold dot-string concatenations would be
     * silently rewritten. Require a known Eloquent receiver; skip otherwise.
     *
     * @var list<class-string>
     */
    private const array ELOQUENT_RECEIVERS = [
        Builder::class,
        Model::class,
        Relation::class,
        Collection::class,
    ];

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Convert dot-notation eager loading to nested-array form when multiple relations share a parent',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
$query->with([
    Article::COMMENTS . '.' . Comment::AUTHOR,
    Article::COMMENTS . '.' . Comment::REPLIES,
    Article::AUTHOR,
]);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$query->with([
    Article::COMMENTS => [
        Comment::AUTHOR,
        Comment::REPLIES,
    ],
    Article::AUTHOR,
]);
CODE_SAMPLE,
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
        // Literal method names are always Identifier nodes; gating on that
        // directly avoids the generic name-resolver machinery isNames() runs on
        // every visited call. Match case-insensitively (as isNames() did) since
        // PHP method names are case-insensitive.
        if (! $node->name instanceof Identifier || ! in_array(strtolower($node->name->toString()), self::EAGER_LOAD_METHODS, true)) {
            return null;
        }

        if (! $this->isEloquentReceiver($node->var)) {
            return null;
        }

        $args = $node->getArgs();
        if (! isset($args[0]) || ! $args[0]->value instanceof Array_) {
            return null;
        }

        $newArray = $this->refactorArray($args[0]->value);
        if (! $newArray instanceof Array_) {
            return null;
        }

        $args[0]->value = $this->formatArray($newArray);

        return $node;
    }

    /**
     * Flag the array for Rector's multi-line printer, but only past a single
     * item so short arrays are left inline.
     */
    private function formatArray(Array_ $array): Array_
    {
        if (count($array->items) > 1) {
            $array->setAttribute(AttributeKey::NEWLINED_ARRAY_PRINT, true);
        }

        return $array;
    }

    /**
     * Eloquent's explicit exits to the base query builder. These deliberately leave
     * the Eloquent API, so a chain continuing through them is genuinely on the base
     * query builder and must not be treated as an `__call()` passthru — unlike the
     * implicit forwarding of e.g. `whereIntegerNotInRaw()`. Lowercased; PHP method
     * names are case-insensitive.
     *
     * @var list<string>
     */
    private const array QUERY_BUILDER_EXITS = ['tobase', 'getquery'];

    /**
     * Walk the fluent call chain rather than testing only the immediate receiver.
     * A mid-chain method forwarded to the base query builder via Eloquent
     * `Builder::__call()` / its `@mixin` — e.g. `whereIntegerNotInRaw()` — resolves
     * to exactly `Illuminate\Database\Query\Builder`, dropping out of the Eloquent
     * allow-list even though at runtime the chain stays on the Eloquent builder.
     * Climb past such links only, and accept once an earlier receiver resolves to an
     * Eloquent type. The base query builder exposes no eager-load method, so a
     * receiver typed as *exactly* that class can only be the passthru illusion;
     * matching subclasses too would risk a custom builder with its own `with()`, an
     * explicit exit (`toBase()`/`getQuery()`) genuinely leaves Eloquent, and any
     * other concrete type means the chain left Eloquent — all of those bail.
     */
    private function isEloquentReceiver(Expr $var): bool
    {
        $current = $var;

        while (true) {
            if ($this->isEloquentType($current)) {
                return true;
            }

            if ($current instanceof MethodCall && $this->isBaseQueryBuilderPassthru($current)) {
                $current = $current->var;

                continue;
            }

            return false;
        }
    }

    private function isBaseQueryBuilderPassthru(MethodCall $methodCall): bool
    {
        if ($methodCall->name instanceof Identifier && in_array(strtolower($methodCall->name->toString()), self::QUERY_BUILDER_EXITS, true)) {
            return false;
        }

        return $this->getType($methodCall)->getObjectClassNames() === [QueryBuilder::class];
    }

    private function isEloquentType(Expr $var): bool
    {
        foreach (self::ELOQUENT_RECEIVERS as $class) {
            if ($this->isObjectType($var, new ObjectType($class))) {
                return true;
            }
        }

        return false;
    }

    private function refactorArray(Array_ $array): ?Array_
    {
        /** @var list<Expr> $groupPrefixes */
        $groupPrefixes = [];
        /** @var list<list<Expr>> $groupRemainders */
        $groupRemainders = [];
        /** @var array<int, int<0, max>> $itemGroupIds */
        $itemGroupIds = [];
        $hasChanges = false;

        foreach ($array->items as $idx => $item) {
            if (! $item instanceof ArrayItem) {
                continue;
            }

            if ($item->key instanceof Expr) {
                continue;
            }

            if (! $item->value instanceof Concat) {
                continue;
            }

            $result = $this->extractPrefixAndRemainder($item->value);
            if ($result === null) {
                continue;
            }

            [$prefix, $remainder] = $result;

            $foundGroupId = null;
            foreach ($groupPrefixes as $gid => $gPrefix) {
                if ($this->nodeComparator->areNodesEqual($gPrefix, $prefix)) {
                    $foundGroupId = $gid;
                    break;
                }
            }

            if ($foundGroupId === null) {
                $foundGroupId = count($groupPrefixes);
                $groupPrefixes[$foundGroupId] = $prefix;
                $groupRemainders[$foundGroupId] = [$remainder];
            } else {
                $groupRemainders[$foundGroupId][] = $remainder;
                if (count($groupRemainders[$foundGroupId]) === 2) {
                    $hasChanges = true;
                }
            }

            $itemGroupIds[$idx] = $foundGroupId;
        }

        if (! $hasChanges) {
            return null;
        }

        $array->items = $this->buildGroupedItems($array->items, $groupPrefixes, $groupRemainders, $itemGroupIds);

        return $array;
    }

    /**
     * @param array<ArrayItem> $items
     * @param array<int<0, max>, Expr> $groupPrefixes
     * @param array<int<0, max>, list<Expr>> $groupRemainders
     * @param array<int<0, max>> $itemGroupIds
     * @return list<ArrayItem>
     */
    private function buildGroupedItems(array $items, array $groupPrefixes, array $groupRemainders, array $itemGroupIds): array
    {
        $emittedGroups = [];
        $newItems = [];

        foreach ($items as $idx => $item) {
            $groupId = $itemGroupIds[$idx] ?? null;

            if ($groupId === null || count($groupRemainders[$groupId]) < 2) {
                $newItems[] = $item;

                continue;
            }

            if (isset($emittedGroups[$groupId])) {
                continue;
            }

            $nestedItems = array_map(
                static fn (Expr $remainder): ArrayItem => new ArrayItem($remainder),
                $groupRemainders[$groupId],
            );
            $nestedArray = $this->refactorArray(new Array_($nestedItems)) ?? new Array_($nestedItems);

            $newItems[] = new ArrayItem($this->formatArray($nestedArray), $groupPrefixes[$groupId]);
            $emittedGroups[$groupId] = true;
        }

        return $newItems;
    }

    /**
     * @return array{Expr, Expr}|null  [prefix, remainder]
     */
    private function extractPrefixAndRemainder(Concat $expr): ?array
    {
        $flat = $this->flattenConcat($expr);
        $segments = $this->splitByDots($flat);

        if (count($segments) < 2) {
            return null;
        }

        $firstItems = array_shift($segments);
        if ($firstItems === []) {
            return null;
        }

        // Discard empty segments (consecutive dots such as A . '.' . '.' . B)
        $segments = array_values(array_filter($segments, static fn (array $s): bool => $s !== []));
        if ($segments === []) {
            return null;
        }

        $remainderExprs = array_map(
            fn (array $items): Expr => $this->foldConcat($items),
            $segments,
        );

        return [$this->foldConcat($firstItems), $this->foldConcat($remainderExprs, true)];
    }

    /** @return list<Expr> */
    private function flattenConcat(Expr $expr): array
    {
        if (! $expr instanceof Concat) {
            return [$expr];
        }

        return [...$this->flattenConcat($expr->left), $expr->right];
    }

    /**
     * @param list<Expr> $flat
     * @return non-empty-list<list<Expr>>
     */
    private function splitByDots(array $flat): array
    {
        /** @var non-empty-list<list<Expr>> $segments */
        $segments = [[]];

        foreach ($flat as $item) {
            if ($item instanceof String_ && $item->value === '.') {
                $segments[] = [];
            } else {
                $segments[count($segments) - 1][] = $item;
            }
        }

        return $segments;
    }

    /** @param list<Expr> $items */
    private function foldConcat(array $items, bool $dotSeparated = false): Expr
    {
        $result = $items[0];
        foreach (array_slice($items, 1) as $item) {
            if ($dotSeparated) {
                $result = new Concat($result, new String_('.'));
            }

            $result = new Concat($result, $item);
        }

        return $result;
    }
}
