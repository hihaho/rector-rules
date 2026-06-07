<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Eloquent;

use PhpParser\Node;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\BinaryOp\Concat;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Scalar\String_;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Eloquent\NestedArrayEagerLoadingRector\NestedArrayEagerLoadingRectorTest
 */
final class NestedArrayEagerLoadingRector extends AbstractRector
{
    /** @var list<string> */
    private const array EAGER_LOAD_METHODS = ['with', 'load', 'loadMissing', 'loadCount'];

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Convert dot-notation eager loading to nested-array form when multiple relations share a parent',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
$query->with([
    VideoAiTask::VIDEO . '.' . Video::CONTAINER,
    VideoAiTask::VIDEO . '.' . Video::SUBTITLES,
    VideoAiTask::VIDEO . '.' . Video::INITIAL_VIDEO_FOR_UPLOAD,
    VideoAiTask::USER,
]);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$query->with([
    VideoAiTask::VIDEO => [
        Video::CONTAINER,
        Video::SUBTITLES,
        Video::INITIAL_VIDEO_FOR_UPLOAD,
    ],
    VideoAiTask::USER,
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

    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof MethodCall) {
            return null;
        }

        if (! $this->isNames($node->name, self::EAGER_LOAD_METHODS)) {
            return null;
        }

        $args = $node->getArgs();
        if (! isset($args[0]) || ! $args[0]->value instanceof Array_) {
            return null;
        }

        $newArray = $this->refactorArray($args[0]->value);
        if ($newArray === null) {
            return null;
        }

        $args[0]->value = $newArray;

        return $node;
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
            if (! $item instanceof ArrayItem || $item->key !== null || ! $item->value instanceof Concat) {
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

        $emittedGroups = [];
        $newItems = [];

        foreach ($array->items as $idx => $item) {
            if (! $item instanceof ArrayItem) {
                $newItems[] = $item;

                continue;
            }

            $groupId = $itemGroupIds[$idx] ?? null;

            if ($groupId === null) {
                $newItems[] = $item;

                continue;
            }

            if (count($groupRemainders[$groupId]) < 2) {
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

            $newItems[] = new ArrayItem($nestedArray, $groupPrefixes[$groupId]);
            $emittedGroups[$groupId] = true;
        }

        $array->items = $newItems;

        return $array;
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
