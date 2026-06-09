<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Eloquent;

use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Model;
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
    private const string COLLECTED_BY_ATTRIBUTE = CollectedBy::class;

    private const string ELOQUENT_MODEL = Model::class;

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace newCollection() override with the #[CollectedBy] attribute',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
use App\Collections\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
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
class Article extends Model
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

    public function refactor(Node $node): ?Node
    {
        assert($node instanceof Class_);

        if ($node->isAnonymous()) {
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

        if ($this->hasCollectedByAttribute($node)) {
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

    private function isEloquentModel(Class_ $class): bool
    {
        $className = $this->getName($class);
        if ($className === null || ! $this->reflectionProvider->hasClass($className)) {
            return false;
        }

        if (! $this->reflectionProvider->hasClass(self::ELOQUENT_MODEL)) {
            return false;
        }

        return $this->reflectionProvider->getClass($className)->isSubclassOfClass(
            $this->reflectionProvider->getClass(self::ELOQUENT_MODEL)
        );
    }

    private function hasCollectedByAttribute(Class_ $class): bool
    {
        foreach ($class->attrGroups as $attrGroup) {
            foreach ($attrGroup->attrs as $attr) {
                if ($this->getName($attr->name) === self::COLLECTED_BY_ATTRIBUTE) {
                    return true;
                }
            }
        }

        return false;
    }
}
