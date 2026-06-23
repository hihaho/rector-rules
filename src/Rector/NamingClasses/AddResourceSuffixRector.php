<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses;

use Hihaho\RectorRules\Rector\NamingClasses\Concerns\ChecksClassHierarchy;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\AddResourceSuffixRector\AddResourceSuffixRectorTest
 */
final class AddResourceSuffixRector extends AbstractRector
{
    use ChecksClassHierarchy;

    private const string JSON_RESOURCE = JsonResource::class;

    private const string RESOURCE_COLLECTION = ResourceCollection::class;

    /**
     * Role-like suffixes that signal the developer intentionally named the
     * class for a different concept. Appending "Resource" would produce
     * awkward double-suffix names (e.g. "FooTransformerResource") and
     * misrepresent the class's intent. Let a human rename these.
     *
     * @var list<string>
     */
    private const array DELIBERATE_SUFFIXES = [
        'Transformer',
        'Presenter',
        'Formatter',
        'Serializer',
        'Mapper',
        'Normalizer',
    ];

    public function __construct(
        protected readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Add "Resource" or "ResourceCollection" suffix to Eloquent API resource classes',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
        if (! $node instanceof Class_) {
            return null;
        }

        if ($node->isAbstract()) {
            return null;
        }

        if (! $node->name instanceof Identifier) {
            return null;
        }

        if (! $node->extends instanceof Name) {
            return null;
        }

        $className = $node->name->toString();
        $parentClassName = $this->getName($node->extends);

        // ResourceCollection extends JsonResource — check the more specific type first.
        if ($this->isSubclassOf($parentClassName, self::RESOURCE_COLLECTION)) {
            return $this->refactorResourceCollection($node, $className);
        }

        if ($this->isSubclassOf($parentClassName, self::JSON_RESOURCE)) {
            return $this->refactorJsonResource($node, $className);
        }

        return null;
    }

    private function refactorResourceCollection(Class_ $node, string $className): ?Class_
    {
        if (str_ends_with($className, 'ResourceCollection')) {
            return null;
        }

        $baseName = $className;

        if (str_ends_with($baseName, 'Collection')) {
            $baseName = substr($baseName, 0, -10);
        }

        if (str_ends_with($baseName, 'Resource')) {
            $baseName = substr($baseName, 0, -8);
        }

        $node->name = new Identifier($baseName . 'ResourceCollection');

        return $node;
    }

    private function refactorJsonResource(Class_ $node, string $className): ?Class_
    {
        if (str_ends_with($className, 'Resource')) {
            return null;
        }

        // A JsonResource subclass named "*Collection" is most likely a design
        // mistake (ResourceCollection is the correct parent for collections).
        // Don't silently produce "FooCollectionResource" — leave it alone.
        if (str_ends_with($className, 'Collection')) {
            return null;
        }

        foreach (self::DELIBERATE_SUFFIXES as $suffix) {
            if (str_ends_with($className, $suffix)) {
                return null;
            }
        }

        $node->name = new Identifier($className . 'Resource');

        return $node;
    }
}
