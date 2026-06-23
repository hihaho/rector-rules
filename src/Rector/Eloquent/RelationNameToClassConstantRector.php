<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Eloquent;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\BinaryOp\Concat;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\ClassMethod;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ReflectionProvider;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\PhpParser\AstResolver;
use Rector\PhpParser\Node\BetterNodeFinder;
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

    /**
     * Eloquent relationship factory methods whose first `::class` argument names
     * the related model. Used to hop from one model to the next when resolving a
     * nested relation path; lowercased because PHP method names are
     * case-insensitive. `morphTo` is intentionally absent — its target is
     * polymorphic, so there is no single related model to hop to.
     *
     * @var list<string>
     */
    private const array RELATION_FACTORIES = [
        'belongsto',
        'hasmany',
        'hasone',
        'belongstomany',
        'morphmany',
        'morphone',
        'morphtomany',
        'morphedbymany',
        'hasmanythrough',
        'hasonethrough',
    ];

    /**
     * Memoises related-model resolution per `owner::relation` so the AST walk that
     * reads a relation method body runs at most once per pair across the run.
     *
     * @var array<string, string|null>
     */
    private array $relatedModelCache = [];

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
        private readonly AstResolver $astResolver,
        private readonly BetterNodeFinder $betterNodeFinder,
    ) {}

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace string relation names with the existing class constant of the model, resolving each level of a nested relation against the model that owns it',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
$article->loadMissing([
    'author',
    'comments.author',
    'comments' => ['replies'],
]);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$article->loadMissing([
    Article::AUTHOR,
    Article::COMMENTS . '.' . Comment::AUTHOR,
    Article::COMMENTS => [Comment::REPLIES],
]);
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

    /**
     * @param MethodCall|StaticCall $node
     */
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
            $converted = $this->convertRelationPath($value->value, $classReflection, $classNode);
            if ($converted instanceof Expr) {
                $arg->value = $converted;

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

            $hasChanged = $this->convertArrayItem($item, $classReflection, $classNode) || $hasChanged;
        }

        return $hasChanged;
    }

    private function convertArrayItem(ArrayItem $item, ClassReflection $classReflection, Name $classNode): bool
    {
        // A keyed item nests deeper relations under that key — convert the key
        // against the current model, then recurse into the value (an array of
        // child relations) against the model the key relation resolves to.
        if ($item->key instanceof String_) {
            return $this->convertKeyedItem($item, $item->key->value, $classReflection, $classNode);
        }

        // An already-converted constant key may still carry a nested array to
        // recurse into; read the relation name back off the constant's value.
        if ($item->key instanceof ClassConstFetch && $item->value instanceof Array_) {
            $relationName = $this->resolveConstFetchValue($item->key);

            return $relationName !== null
                && $this->recurseIntoNested($item->value, $relationName, $classReflection);
        }

        // A bare (non-keyed) string item is a leaf relation path.
        if (! $item->key instanceof Expr && $item->value instanceof String_) {
            $converted = $this->convertRelationPath($item->value->value, $classReflection, $classNode);
            if ($converted instanceof Expr) {
                $item->value = $converted;

                return true;
            }
        }

        return false;
    }

    private function convertKeyedItem(ArrayItem $item, string $relationPath, ClassReflection $classReflection, Name $classNode): bool
    {
        $hasChanged = false;

        $convertedKey = $this->convertRelationPath($relationPath, $classReflection, $classNode);
        if ($convertedKey instanceof Expr) {
            $item->key = $convertedKey;
            $hasChanged = true;
        }

        if ($item->value instanceof Array_) {
            if ($this->recurseIntoNested($item->value, $relationPath, $classReflection)) {
                return true;
            }

            return $hasChanged;
        }

        return $hasChanged;
    }

    /**
     * Recurse into a nested eager-load array, resolving its items against the
     * model reached after walking the parent key's (possibly dotted) relation path.
     */
    private function recurseIntoNested(Array_ $nested, string $parentPath, ClassReflection $classReflection): bool
    {
        $childContext = $this->resolveModelAfterPath($parentPath, $classReflection);
        if ($childContext === null) {
            return false;
        }

        [$childReflection] = $childContext;

        return $this->convertArrayItems($nested, $childReflection, new FullyQualified($childReflection->getName()));
    }

    /**
     * Convert a (possibly dot-notation) relation path into a class-constant
     * expression. A single segment yields the constant fetch; a dotted path
     * yields a `Const . '.' . Const` concat, resolving each segment against the
     * model the previous one points to. All-or-nothing: if any segment fails to
     * resolve, the original string is left untouched.
     */
    private function convertRelationPath(string $relationPath, ClassReflection $classReflection, Name $classNode): ?Expr
    {
        $segments = explode('.', $relationPath);

        $currentReflection = $classReflection;
        $currentNode = $classNode;

        /** @var list<Expr> $parts */
        $parts = [];

        foreach ($segments as $index => $segment) {
            $constFetch = $this->createConstFetch($currentReflection, $segment, $currentNode);
            if (! $constFetch instanceof ClassConstFetch) {
                return null;
            }

            $parts[] = $constFetch;

            if ($index === count($segments) - 1) {
                break;
            }

            $relatedReflection = $this->resolveRelatedModel($currentReflection, $segment);
            if (! $relatedReflection instanceof ClassReflection) {
                return null;
            }

            $currentReflection = $relatedReflection;
            $currentNode = new FullyQualified($relatedReflection->getName());
        }

        return $this->foldDotted($parts);
    }

    /**
     * Walk a dotted relation path and return the model reached at its end, used
     * to give a nested array the right model context.
     *
     * @return array{ClassReflection}|null
     */
    private function resolveModelAfterPath(string $relationPath, ClassReflection $classReflection): ?array
    {
        $currentReflection = $classReflection;

        foreach (explode('.', $relationPath) as $segment) {
            $relatedReflection = $this->resolveRelatedModel($currentReflection, $segment);
            if (! $relatedReflection instanceof ClassReflection) {
                return null;
            }

            $currentReflection = $relatedReflection;
        }

        return [$currentReflection];
    }

    /** @param list<Expr> $parts */
    private function foldDotted(array $parts): Expr
    {
        $result = $parts[0];
        foreach (array_slice($parts, 1) as $part) {
            $result = new Concat(new Concat($result, new String_('.')), $part);
        }

        return $result;
    }

    /**
     * Resolve the related model for a relation on the given model by reading the
     * relation method's body and extracting the first `::class` argument of its
     * Eloquent relationship factory call (e.g. `$this->belongsTo(Comment::class)`).
     */
    private function resolveRelatedModel(ClassReflection $classReflection, string $relationName): ?ClassReflection
    {
        $cacheKey = strtolower($classReflection->getName() . '::' . $relationName);
        if (! array_key_exists($cacheKey, $this->relatedModelCache)) {
            $this->relatedModelCache[$cacheKey] = $this->resolveRelatedModelName($classReflection, $relationName);
        }

        $relatedName = $this->relatedModelCache[$cacheKey];
        if ($relatedName === null || ! $this->reflectionProvider->hasClass($relatedName)) {
            return null;
        }

        return $this->reflectionProvider->getClass($relatedName);
    }

    private function resolveRelatedModelName(ClassReflection $classReflection, string $relationName): ?string
    {
        $classMethod = $this->astResolver->resolveClassMethod($classReflection->getName(), $relationName);
        if (! $classMethod instanceof ClassMethod) {
            return null;
        }

        /** @var MethodCall[] $methodCalls */
        $methodCalls = $this->betterNodeFinder->findInstanceOf($classMethod, MethodCall::class);

        foreach ($methodCalls as $methodCall) {
            if (! $methodCall->var instanceof Variable) {
                continue;
            }

            if (! $this->isName($methodCall->var, 'this')) {
                continue;
            }

            if (! $methodCall->name instanceof Identifier) {
                continue;
            }

            if (! in_array(strtolower($methodCall->name->toString()), self::RELATION_FACTORIES, true)) {
                continue;
            }

            $args = $methodCall->getArgs();
            if (! isset($args[0])) {
                continue;
            }

            $relatedName = $this->resolveClassArgName($args[0]->value);
            if ($relatedName !== null) {
                return $relatedName;
            }
        }

        return null;
    }

    private function resolveClassArgName(Expr $expr): ?string
    {
        if ($expr instanceof ClassConstFetch && $expr->name instanceof Identifier && strtolower($expr->name->toString()) === 'class' && $expr->class instanceof Name) {
            return $this->getName($expr->class);
        }

        if ($expr instanceof String_) {
            return $expr->value;
        }

        return null;
    }

    private function resolveConstFetchValue(ClassConstFetch $classConstFetch): ?string
    {
        if (! $classConstFetch->class instanceof Name || ! $classConstFetch->name instanceof Identifier) {
            return null;
        }

        $className = $this->getName($classConstFetch->class);
        if ($className === null || ! $this->reflectionProvider->hasClass($className)) {
            return null;
        }

        $classReflection = $this->reflectionProvider->getClass($className);
        $constantName = $classConstFetch->name->toString();
        if (! $classReflection->hasConstant($constantName)) {
            return null;
        }

        $valueExpr = $classReflection->getConstant($constantName)->getValueExpr();

        return $valueExpr instanceof String_ ? $valueExpr->value : null;
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
