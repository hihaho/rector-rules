<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Eloquent\Support;

use PhpParser\Node\Expr;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\ClassMethod;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ReflectionProvider;
use Rector\NodeNameResolver\NodeNameResolver;
use Rector\PhpParser\AstResolver;
use Rector\PhpParser\Node\BetterNodeFinder;

/**
 * Resolves the model a relation points to by reading the relation method's body
 * and extracting the first `::class` argument of its Eloquent relationship factory
 * call (e.g. `$this->belongsTo(Comment::class)`).
 *
 * @internal
 */
final class RelatedModelResolver
{
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
        private readonly NodeNameResolver $nodeNameResolver,
    ) {}

    public function resolve(ClassReflection $classReflection, string $relationName): ?ClassReflection
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

            if (! $this->nodeNameResolver->isName($methodCall->var, 'this')) {
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
            return $this->nodeNameResolver->getName($expr->class);
        }

        if ($expr instanceof String_) {
            return $expr->value;
        }

        return null;
    }
}
