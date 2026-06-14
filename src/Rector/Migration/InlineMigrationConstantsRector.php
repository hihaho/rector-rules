<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Migration;

use Hihaho\RectorRules\Rector\Migration\Concerns\ChecksMigrationContext;
use PhpParser\Node;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\Float_;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Scalar\String_;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\InlineMigrationConstantsRectorTest
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
$table->boolean(Article::COMMENTS_ENABLED)->nullable();
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$table->boolean('comments_enabled')->nullable();
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

        if (! $node->name instanceof Identifier) {
            return null;
        }

        $constantName = $node->name->toString();

        // Skip ::class references — those are always valid. This cheap structural gate
        // runs before the directory check: `::class` is by far the most common
        // ClassConstFetch, and bailing it here avoids the per-node context lookup.
        if ($constantName === 'class') {
            return null;
        }

        if (! $this->isInMigrationsDirectory()) {
            return null;
        }

        $className = $this->getName($node->class);

        if ($className === null) {
            return null;
        }

        if (! $this->reflectionProvider->hasClass($className)) {
            return null;
        }

        $classReflection = $this->reflectionProvider->getClass($className);

        // Enum cases are class constants under the hood, but inlining their
        // backing value silently drops type safety. Leave enum references alone.
        if ($classReflection->isEnum() && $classReflection->hasEnumCase($constantName)) {
            return null;
        }

        if (! $classReflection->hasConstant($constantName)) {
            return null;
        }

        $constantReflection = $classReflection->getConstant($constantName);
        $valueExpr = $constantReflection->getValueExpr();

        if ($valueExpr instanceof String_) {
            return new String_($valueExpr->value);
        }

        if ($valueExpr instanceof Int_) {
            return new Int_($valueExpr->value);
        }

        if ($valueExpr instanceof Float_) {
            return new Float_($valueExpr->value);
        }

        if ($valueExpr instanceof ConstFetch) {
            $name = $valueExpr->name->toLowerString();

            if (in_array($name, ['true', 'false', 'null'], true)) {
                return new ConstFetch(new Name($name));
            }
        }

        return null;
    }
}
