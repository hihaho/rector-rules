<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Eloquent;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Scalar\String_;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ReflectionProvider;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\RelationNameToClassConstantRectorTest
 */
final class RelationNameToClassConstantRector extends AbstractRector
{
    /**
     * The Eloquent relation methods this rule targets, lowercased: PHP method
     * names are case-insensitive, so the gate compares the lowercased call name
     * against this list (mirroring what isNames() did via strcasecmp).
     *
     * @var list<string>
     */
    private const array RELATION_METHODS = [
        'with',
        'load',
        'loadmissing',
        'loadcount',
        'relationloaded',
        'getrelation',
        'setrelation',
        'unsetrelation',
    ];

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace string relation names with the existing class constant of the model',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
$article->loadMissing('relatedArticles');
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$article->loadMissing(Article::RELATED_ARTICLES);
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

        // Literal method names are always Identifier nodes; gating on that
        // directly avoids the generic name-resolver machinery isNames() runs on
        // every visited call. Match case-insensitively (as isNames() did) since
        // PHP method names are case-insensitive.
        if (! $node->name instanceof Identifier || ! in_array(strtolower($node->name->toString()), self::RELATION_METHODS, true)) {
            return null;
        }

        $args = $node->getArgs();
        if (! isset($args[0])) {
            return null;
        }

        $classContext = $this->resolveClassContext($node);
        if ($classContext === null) {
            return null;
        }

        [$classReflection, $classNode] = $classContext;

        return $this->convertFirstArg($args[0], $classReflection, $classNode) ? $node : null;
    }

    private function convertFirstArg(Arg $arg, ClassReflection $classReflection, Name $classNode): bool
    {
        $value = $arg->value;

        if ($value instanceof String_) {
            $constFetch = $this->createConstFetch($classReflection, $value->value, $classNode);
            if ($constFetch instanceof ClassConstFetch) {
                $arg->value = $constFetch;

                return true;
            }

            return false;
        }

        if ($value instanceof Array_) {
            return $this->convertArrayItems($value, $classReflection, $classNode);
        }

        return false;
    }

    private function convertArrayItems(Array_ $array, ClassReflection $classReflection, Name $classNode): bool
    {
        $hasChanged = false;

        foreach ($array->items as $item) {
            if (! $item instanceof ArrayItem) {
                continue;
            }

            if (! $item->key instanceof Expr && $item->value instanceof String_) {
                $constFetch = $this->createConstFetch($classReflection, $item->value->value, $classNode);
                if ($constFetch instanceof ClassConstFetch) {
                    $item->value = $constFetch;
                    $hasChanged = true;
                }
            } elseif ($item->key instanceof String_) {
                $constFetch = $this->createConstFetch($classReflection, $item->key->value, $classNode);
                if ($constFetch instanceof ClassConstFetch) {
                    $item->key = $constFetch;
                    $hasChanged = true;
                }
            }
        }

        return $hasChanged;
    }

    /**
     * Resolve both the class reflection the relation constant must live on, and
     * the class node to emit in its place. The emitted node reuses the call's own
     * class reference (self::, static::, the imported name, or — for an instance
     * call — self:: inside the model / the FQCN elsewhere), so it always points at
     * the same class the call already resolved against.
     *
     * @param MethodCall|StaticCall $node
     * @return array{ClassReflection, Name}|null
     */
    private function resolveClassContext(Node $node): ?array
    {
        if ($node instanceof MethodCall) {
            $classReflections = $this->getType($node->var)->getObjectClassReflections();
            if (count($classReflections) !== 1) {
                return null;
            }

            $classReflection = $classReflections[0];
            $classNode = $node->var instanceof Variable && $this->isName($node->var, 'this')
                ? new Name('self')
                : new FullyQualified($classReflection->getName());

            return [$classReflection, $classNode];
        }

        if (! $node->class instanceof Name) {
            return null;
        }

        $className = $this->getName($node->class);
        if ($className === null) {
            return null;
        }

        $lowerClassName = strtolower($className);
        $classReflection = in_array($lowerClassName, ['self', 'static', 'parent'], true)
            ? $this->resolveRelativeClassReflection($node, $lowerClassName)
            : ($this->reflectionProvider->hasClass($className) ? $this->reflectionProvider->getClass($className) : null);

        if (! $classReflection instanceof ClassReflection) {
            return null;
        }

        return [$classReflection, clone $node->class];
    }

    private function resolveRelativeClassReflection(StaticCall $node, string $keyword): ?ClassReflection
    {
        $scope = $node->getAttribute(AttributeKey::SCOPE);
        if (! $scope instanceof Scope) {
            return null;
        }

        $classReflection = $scope->getClassReflection();
        if (! $classReflection instanceof ClassReflection) {
            return null;
        }

        return $keyword === 'parent' ? $classReflection->getParentClass() : $classReflection;
    }

    private function createConstFetch(ClassReflection $classReflection, string $relationName, Name $classNode): ?ClassConstFetch
    {
        $constantName = $this->matchConstantName($classReflection, $relationName);
        if ($constantName === null) {
            return null;
        }

        return new ClassConstFetch(clone $classNode, $constantName);
    }

    /**
     * Find the constant on the class whose value equals the relation name. When
     * multiple constants share the value, only the one whose name matches the
     * SCREAMING_SNAKE_CASE form of the relation name is trusted.
     */
    private function matchConstantName(ClassReflection $classReflection, string $relationName): ?string
    {
        $matches = [];

        foreach ($classReflection->getNativeReflection()->getReflectionConstants() as $reflectionConstant) {
            // Non-public constants would be inaccessible at an external call site
            // (and inherited private ones even via self::), producing a fatal error.
            if (! $reflectionConstant->isPublic()) {
                continue;
            }

            $valueExpr = $classReflection->getConstant($reflectionConstant->getName())->getValueExpr();
            if ($valueExpr instanceof String_ && $valueExpr->value === $relationName) {
                $matches[] = $reflectionConstant->getName();
            }
        }

        if (count($matches) === 1) {
            return $matches[0];
        }

        if ($matches === []) {
            return null;
        }

        $derivedName = strtoupper((string) preg_replace('/(?<!^)[A-Z]/', '_$0', $relationName));

        return in_array($derivedName, $matches, true) ? $derivedName : null;
    }
}
