<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Expression;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\ConfigSetMethodRector\ConfigSetMethodRectorTest
 */
final class ConfigSetMethodRector extends AbstractRector
{
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace the config([\'key\' => $value]) setter form with config()->set(\'key\', $value)',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
config(['queue.default' => 'sync']);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
config()->set('queue.default', 'sync');
CODE_SAMPLE,
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [Expression::class];
    }

    /**
     * @param Expression $node *//** @return Expression[]|null

    public function refactor(Node $node): ?array
    {
        if (! $node->expr instanceof FuncCall) {
            return null;
        }

        $funcCall = $node->expr;

        // Gate on the cheap instanceof before the name-resolver machinery: a dynamic
        // call (`$fn(...)`) has an Expr name and never matches, so bail it here.
        if (! $funcCall->name instanceof Name || ! $this->isName($funcCall->name, 'config')) {
            return null;
        }

        // `config(...)` (first-class callable) has no real args, and CallLike::getArgs()
        // asserts against being called on one — bail before it fatals.
        if ($funcCall->isFirstClassCallable()) {
            return null;
        }

        $args = $funcCall->getArgs();
        if (count($args) !== 1 || ! $args[0]->value instanceof Array_) {
            return null;
        }

        $setterCalls = $this->buildSetterCalls($args[0]->value, $funcCall->name);
        if ($setterCalls === null) {
            return null; // array had a non-string-literal key, or was empty
        }

        // Carry any leading comment / suppression marker on the original statement onto
        // the first generated call so the rewrite is not lossy.
        $this->mirrorComments($setterCalls[0], $node);

        // One config()->set() statement per pair; Rector splices the array in for the
        // original statement (a single-element array replaces it 1:1).
        return $setterCalls;
    }

    /**
     * @return Expression[]|null null when any item has a non-string-literal key, or the array is empty
     */
    private function buildSetterCalls(Array_ $array, Name $configName): ?array
    {
        if ($array->items === []) {
            return null;
        }

        $calls = [];
        foreach ($array->items as $item) {
            if (! $item instanceof ArrayItem || ! $item->key instanceof String_) {
                return null;
            }

            // config()->set('key', $value) — reuse the original name node (cloned per
            // call) so a fully-qualified `\config([...])` or an imported helper keeps
            // resolving to the same function it did before the rewrite.
            $setCall = new MethodCall(
                new FuncCall(clone $configName),
                new Identifier('set'),
                [new Arg($item->key), new Arg($item->value)],
            );
            $calls[] = new Expression($setCall);
        }

        return $calls;
    }
}
