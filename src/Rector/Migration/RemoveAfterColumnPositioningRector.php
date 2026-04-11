<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Migration;

use Hihaho\RectorRules\Rector\Migration\Concerns\ChecksMigrationContext;
use Hihaho\RectorRules\Tests\Rector\Migration\RemoveAfterColumnPositioningRector\RemoveAfterColumnPositioningRectorTest;
use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see RemoveAfterColumnPositioningRectorTest
 */
final class RemoveAfterColumnPositioningRector extends AbstractRector
{
    use ChecksMigrationContext;

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Remove ->after() column positioning from migrations (can disable INSTANT DDL)',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
$table->string('description')->after('name');
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$table->string('description');
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

        if (! $this->isInMigrationsDirectory()) {
            return null;
        }

        if (! $node->name instanceof Identifier) {
            return null;
        }

        if ($node->name->toString() !== 'after') {
            return null;
        }

        return $node->var;
    }
}
