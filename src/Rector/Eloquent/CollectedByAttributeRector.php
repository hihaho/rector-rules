<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Eloquent;

use Composer\InstalledVersions;
use Hihaho\RectorRules\Rector\Eloquent\Concerns\InspectsEloquentModel;
use Hihaho\RectorRules\Rector\Eloquent\Support\NewCollectionShadowDetector;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Attribute;
use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Return_;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\CollectedByAttributeRectorTest
 */
final class CollectedByAttributeRector extends AbstractRector
{
    use InspectsEloquentModel;

    private const string COLLECTED_BY_ATTRIBUTE = CollectedBy::class;

    private readonly NewCollectionShadowDetector $shadowDetector;

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {
        $this->shadowDetector = new NewCollectionShadowDetector($reflectionProvider);
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace newCollection() override with the #[CollectedBy] attribute',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
use App\Collections\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

final class Article extends Model
{
    /** @param self[] $models */
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
use App\Collections\ArticleCollection;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Model;

#[CollectedBy(ArticleCollection::class)]
final class Article extends Model
{
}
CODE_SAMPLE,
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [Class_::class];
    }

    /**
     * @param Class_ $node
     */
    public function refactor(Node $node): ?Node
    {
        assert($node instanceof Class_);

        if ($node->isAnonymous()) {
            return null;
        }

        // On Laravel 12, HasCollection::resolveCollectionFromAttribute() reads the
        // attribute from static::class only — it does NOT walk the parent chain — so
        // a subclass does not inherit #[CollectedBy] though it does inherit a
        // newCollection() method. Rewriting a subclassable base there would silently
        // strip the custom collection from every descendant. We cannot enumerate
        // subclasses from a single AST, so on Laravel 12 we gate conservatively to
        // final classes (the only ones guaranteed to have no descendants). Laravel 13
        // walks the parent chain, making the attribute effectively inherited, so the
        // rewrite is behaviour-preserving for non-final models too.
        if (! $node->isFinal() && ! $this->attributeInheritedBySubclasses()) {
            return null;
        }

        $newCollectionMethod = null;
        $newCollectionKey = null;

        foreach ($node->stmts as $key => $stmt) {
            if ($stmt instanceof ClassMethod && $this->isName($stmt, 'newCollection')) {
                $newCollectionMethod = $stmt;
                $newCollectionKey = $key;
                break;
            }
        }

        if (! $newCollectionMethod instanceof ClassMethod || $newCollectionKey === null) {
            return null;
        }

        $collectionFqcn = $this->resolveCollectionFqcn($newCollectionMethod);
        if ($collectionFqcn === null) {
            return null;
        }

        if (! $this->isEloquentModel($node)) {
            return null;
        }

        // #[CollectedBy] is only consulted inside the framework base
        // Model::newCollection(). A newCollection() supplied by a trait or by an
        // ancestor model is a real method that shadows the base — so it also beats
        // the attribute. Removing this class's explicit override would hand
        // resolution to that method, not the attribute. Skip such classes.
        $className = $this->getName($node);
        if ($className !== null && $this->shadowDetector->isShadowed($className)) {
            return null;
        }

        if ($this->hasAttribute($node, self::COLLECTED_BY_ATTRIBUTE)) {
            return null;
        }

        $attrArg = new Arg(new ClassConstFetch(new FullyQualified($collectionFqcn), new Identifier('class')));
        $attrGroup = new AttributeGroup([
            new Attribute(new FullyQualified(self::COLLECTED_BY_ATTRIBUTE), [$attrArg]),
        ]);
        array_unshift($node->attrGroups, $attrGroup);

        unset($node->stmts[$newCollectionKey]);

        return $node;
    }

    private function resolveCollectionFqcn(ClassMethod $method): ?string
    {
        if (count($method->stmts ?? []) !== 1) {
            return null;
        }

        $stmt = $method->stmts[0];
        if (! $stmt instanceof Return_ || ! $stmt->expr instanceof New_) {
            return null;
        }

        $new = $stmt->expr;

        if (! $method->returnType instanceof Node) {
            return null;
        }

        $returnTypeFqcn = $this->getName($method->returnType);
        $constructedFqcn = $this->getName($new->class);

        if ($returnTypeFqcn === null || $constructedFqcn === null) {
            return null;
        }

        if ($returnTypeFqcn !== $constructedFqcn) {
            return null;
        }

        $args = $new->getArgs();
        if (count($args) !== 1) {
            return null;
        }

        $firstParam = $method->params[0] ?? null;
        if (! $firstParam instanceof Param) {
            return null;
        }

        $paramName = $this->getName($firstParam->var);
        if ($paramName === null) {
            return null;
        }

        if (! $args[0]->value instanceof Variable) {
            return null;
        }

        if ($this->getName($args[0]->value) !== $paramName) {
            return null;
        }

        return $returnTypeFqcn;
    }

    /**
     * Whether the installed framework inherits #[CollectedBy] through the parent
     * chain (Laravel 13+), so a non-final model can be rewritten safely. On
     * Laravel 12 the attribute is resolved from the model's own class only.
     */
    private function attributeInheritedBySubclasses(): bool
    {
        foreach (['laravel/framework', 'illuminate/database'] as $package) {
            if (! InstalledVersions::isInstalled($package)) {
                continue;
            }

            // The monorepo's illuminate/* subsplits report an empty (or null)
            // version; fall through to the next candidate when that happens.
            $version = (string) InstalledVersions::getVersion($package);
            if ($version === '') {
                continue;
            }

            return version_compare($version, '13.0.0', '>=');
        }

        return false;
    }
}
