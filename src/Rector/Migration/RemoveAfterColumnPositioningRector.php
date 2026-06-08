<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Migration;

use Hihaho\RectorRules\Rector\Migration\Concerns\ChecksMigrationContext;
use Illuminate\Database\Schema\ColumnDefinition;
use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PHPStan\Type\ObjectType;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Migration\RemoveAfterColumnPositioningRector\RemoveAfterColumnPositioningRectorTest
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

        // Cheapest, most-selective gate first: almost no method call is named
        // `after`, so bail on the name before the per-node directory string scan.
        if (! $node->name instanceof Identifier || $node->name->toString() !== 'after') {
            return null;
        }

        if (! $this->isInMigrationsDirectory()) {
            return null;
        }

        // Only rewrite ColumnDefinition::after($column). Leaves Blueprint's
        // scoping `after($column, Closure)` and unrelated `->after()` calls
        // (e.g., Collection::after) alone.
        if (! $this->isObjectType($node->var, new ObjectType(ColumnDefinition::class))) {
            return null;
        }

        return $node->var;
    }
}
