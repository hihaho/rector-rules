<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses;

use Hihaho\RectorRules\Tests\Rector\NamingClasses\AddResourceSuffixRector\AddResourceSuffixRectorTest;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see AddResourceSuffixRectorTest
 */
final class AddResourceSuffixRector extends AbstractRector
{
    private const string JSON_RESOURCE = 'Illuminate\Http\Resources\Json\JsonResource';

    private const string RESOURCE_COLLECTION = 'Illuminate\Http\Resources\Json\ResourceCollection';

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
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

class Video extends JsonResource
{
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
}
CODE_SAMPLE,
                ),
            ],
        );
    }

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

        if ($node->name === null) {
            return null;
        }

        if ($node->extends === null) {
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

        $node->name = new Identifier($className . 'Resource');

        return $node;
    }

    private function isSubclassOf(string $className, string $baseClass): bool
    {
        if ($className === $baseClass) {
            return true;
        }

        if (! $this->reflectionProvider->hasClass($className)) {
            return false;
        }

        return $this->reflectionProvider->getClass($className)->isSubclassOf($baseClass);
    }
}
