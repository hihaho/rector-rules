<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Migration;

use Hihaho\RectorRules\Rector\Migration\Concerns\ChecksMigrationContext;
use Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\InlineMigrationConstantsRectorTest;
use PhpParser\Node;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Identifier;
use PhpParser\Node\Scalar\String_;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see InlineMigrationConstantsRectorTest
 */
final class InlineMigrationConstantsRector extends AbstractRector
{
    use ChecksMigrationContext;

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace class constants with their literal values in migrations to keep migrations self-contained',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
$table->boolean(Video::CALIPER_ENABLED)->nullable();
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$table->boolean('caliper_enabled')->nullable();
CODE_SAMPLE,
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [ClassConstFetch::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof ClassConstFetch) {
            return null;
        }

        if (! $this->isInMigrationsDirectory()) {
            return null;
        }

        if (! $node->name instanceof Identifier) {
            return null;
        }

        $constantName = $node->name->toString();

        // Skip ::class references — those are always valid
        if ($constantName === 'class') {
            return null;
        }

        $className = $this->getName($node->class);

        if (! $this->reflectionProvider->hasClass($className)) {
            return null;
        }

        $classReflection = $this->reflectionProvider->getClass($className);

        if (! $classReflection->hasConstant($constantName)) {
            return null;
        }

        $constantReflection = $classReflection->getConstant($constantName);
        $valueExpr = $constantReflection->getValueExpr();

        if ($valueExpr instanceof String_) {
            return new String_($valueExpr->value);
        }

        if ($valueExpr instanceof Node\Scalar\Int_) {
            return new Node\Scalar\Int_($valueExpr->value);
        }

        return null;
    }
}
