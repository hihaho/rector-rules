<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Eloquent;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Attribute;
use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Expression;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\ObservedByAttributeRectorTest
 */
final class ObservedByAttributeRector extends AbstractRector
{
    private const string OBSERVED_BY_ATTRIBUTE = 'Illuminate\Database\Eloquent\Attributes\ObservedBy';

    private const string ELOQUENT_MODEL = 'Illuminate\Database\Eloquent\Model';

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace booted() observer registration with the #[ObservedBy] attribute',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
use App\Observers\ArticleObserver;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected static function booted(): void
    {
        static::observe(ArticleObserver::class);
    }
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
use App\Observers\ArticleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ArticleObserver::class)]
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

        $bootedMethod = null;
        $bootedKey = null;

        foreach ($node->stmts as $key => $stmt) {
            if ($stmt instanceof ClassMethod && $this->isName($stmt, 'booted')) {
                $bootedMethod = $stmt;
                $bootedKey = $key;
                break;
            }
        }

        if ($bootedMethod === null || $bootedKey === null) {
            return null;
        }

        $observerFqcn = $this->resolveObserverFqcn($bootedMethod);
        if ($observerFqcn === null) {
            return null;
        }

        if (! $this->isEloquentModel($node)) {
            return null;
        }

        if ($this->hasObservedByAttribute($node)) {
            return null;
        }

        $attrArg = new Arg(new ClassConstFetch(new FullyQualified($observerFqcn), new Identifier('class')));
        $attrGroup = new AttributeGroup([
            new Attribute(new FullyQualified(self::OBSERVED_BY_ATTRIBUTE), [$attrArg]),
        ]);
        array_unshift($node->attrGroups, $attrGroup);

        unset($node->stmts[$bootedKey]);

        return $node;
    }

    private function resolveObserverFqcn(ClassMethod $method): ?string
    {
        if (count($method->stmts ?? []) !== 1) {
            return null;
        }

        $stmt = $method->stmts[0];
        if (! $stmt instanceof Expression || ! $stmt->expr instanceof StaticCall) {
            return null;
        }

        $call = $stmt->expr;

        if (! $call->class instanceof Name) {
            return null;
        }

        if (! in_array(strtolower($call->class->toString()), ['static', 'self'], true)) {
            return null;
        }

        if (! $call->name instanceof Identifier || $call->name->toString() !== 'observe') {
            return null;
        }

        $args = $call->getArgs();
        if (count($args) !== 1 || ! $args[0]->value instanceof ClassConstFetch) {
            return null;
        }

        $constFetch = $args[0]->value;
        if (! $constFetch->name instanceof Identifier || $constFetch->name->toString() !== 'class') {
            return null;
        }

        return $this->getName($constFetch->class);
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

    private function hasObservedByAttribute(Class_ $class): bool
    {
        foreach ($class->attrGroups as $attrGroup) {
            foreach ($attrGroup->attrs as $attr) {
                if ($this->getName($attr->name) === self::OBSERVED_BY_ATTRIBUTE) {
                    return true;
                }
            }
        }

        return false;
    }
}
