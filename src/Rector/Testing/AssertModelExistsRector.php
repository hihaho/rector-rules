<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Testing;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ReflectionProvider;
use PHPUnit\Framework\TestCase;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Testing\AssertModelExistsRector\AssertModelExistsRectorTest
 */
final class AssertModelExistsRector extends AbstractRector
{
    private const array METHOD_MAP = [
        'assertdatabasehas' => 'assertModelExists',
        'assertdatabasemissing' => 'assertModelMissing',
    ];

    private const string TEST_CASE_CLASS = TestCase::class;

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace assertDatabaseHas/Missing single-id checks with assertModelExists/Missing',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
$this->assertDatabaseHas(Article::class, ['id' => $article->id]);
$this->assertDatabaseMissing(Article::class, ['id' => $article->id]);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$this->assertModelExists($article);
$this->assertModelMissing($article);
CODE_SAMPLE,
                ),
            ],
        );
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

        if (! $node->name instanceof Identifier) {
            return null;
        }

        $replacement = self::METHOD_MAP[strtolower($node->name->toString())] ?? null;
        if ($replacement === null) {
            return null;
        }

        $args = $node->getArgs();
        if (count($args) !== 2) {
            return null;
        }

        if (! $this->isTestCaseContext($node)) {
            return null;
        }

        $modelClass = $this->resolveModelClass($args[0]);
        $modelVar = $this->resolveModelVar($args[1], $modelClass);

        if ($modelClass === null || $modelVar === null) {
            return null;
        }

        $node->name = new Identifier($replacement);
        $node->args = [new Arg($modelVar)];

        return $node;
    }

    private function isTestCaseContext(MethodCall|StaticCall $node): bool
    {
        if ($node instanceof MethodCall) {
            if (! $node->var instanceof Variable || ! $this->isName($node->var, 'this')) {
                return false;
            }
        } else {
            if (! $node->class instanceof Name) {
                return false;
            }
            if (! in_array(strtolower($node->class->toString()), ['self', 'static'], true)) {
                return false;
            }
        }

        $scope = $node->getAttribute(AttributeKey::SCOPE);
        if (! $scope instanceof Scope) {
            return false;
        }

        $classReflection = $scope->getClassReflection();
        if (! $classReflection instanceof ClassReflection) {
            return false;
        }

        if (! $this->reflectionProvider->hasClass(self::TEST_CASE_CLASS)) {
            return false;
        }

        return $classReflection->isSubclassOfClass(
            $this->reflectionProvider->getClass(self::TEST_CASE_CLASS)
        );
    }

    private function resolveModelClass(Arg $arg): ?string
    {
        if (! $arg->value instanceof ClassConstFetch) {
            return null;
        }

        $constFetch = $arg->value;
        if (! $constFetch->name instanceof Identifier || $constFetch->name->toString() !== 'class') {
            return null;
        }

        return $this->getName($constFetch->class);
    }

    private function resolveModelVar(Arg $arg, ?string $expectedClass): ?Expr
    {
        if ($expectedClass === null) {
            return null;
        }

        if (! $arg->value instanceof Array_ || count($arg->value->items) !== 1) {
            return null;
        }

        $item = $arg->value->items[0];
        if (! $item instanceof ArrayItem || ! $this->isIdKey($item->key)) {
            return null;
        }

        if (! $item->value instanceof PropertyFetch) {
            return null;
        }

        $propFetch = $item->value;
        if (! $propFetch->name instanceof Identifier || $propFetch->name->toString() !== 'id') {
            return null;
        }

        if (! $propFetch->var instanceof Variable) {
            return null;
        }

        $varTypes = $this->getType($propFetch->var)->getObjectClassNames();
        if (! in_array($expectedClass, $varTypes, true)) {
            return null;
        }

        return $propFetch->var;
    }

    private function isIdKey(?Expr $key): bool
    {
        if ($key === null) {
            return false;
        }

        if ($key instanceof String_) {
            return $key->value === 'id';
        }

        if ($key instanceof ClassConstFetch) {
            foreach ($this->getType($key)->getConstantStrings() as $constantString) {
                if ($constantString->getValue() === 'id') {
                    return true;
                }
            }
        }

        return false;
    }
}
