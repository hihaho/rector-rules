<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\RenamePropagation;

/**
 * `AddResourceSuffixRector` does not extend `AbstractAddSuffixRector` — it carries its
 * own naming logic — so cross-file propagation is proven for it separately.
 *
 * @see \Hihaho\RectorRules\Rector\NamingClasses\AddResourceSuffixRector
 */
final class ResourceRenamePropagationTest extends AbstractRenamePropagationTestCase
{
    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/resource_rule.php';
    }

    public function test_rewrites_a_reference_in_a_file_processed_before_the_declaration(): void
    {
        $this->processCorpus();

        $controller = $this->corpusContents('Controllers/ArticleController.php');

        $this->assertStringContainsString('ArticleResource', $controller);
        $this->assertStringNotContainsString('new Article(', $controller);
    }

    public function test_renames_the_declaration_and_its_file(): void
    {
        $this->processCorpus();

        $this->assertFileExists($this->corpusPath('Resources/ArticleResource.php'));
        $this->assertFileDoesNotExist($this->corpusPath('Resources/Article.php'));
    }

    public function test_renames_a_resource_collection_and_its_file(): void
    {
        $this->processCorpus();

        $this->assertFileExists($this->corpusPath('Resources/CommentResourceCollection.php'));
        $this->assertFileDoesNotExist($this->corpusPath('Resources/CommentCollection.php'));
    }

    public function test_leaves_a_deliberately_suffixed_class_alone(): void
    {
        $this->processCorpus();

        $this->assertFileExists($this->corpusPath('Resources/OrderTransformer.php'));
        $this->assertStringContainsString(
            'class OrderTransformer',
            $this->corpusContents('Resources/OrderTransformer.php'),
        );
    }

    /**
     * @return array<string, string>
     */
    protected static function corpusFiles(): array
    {
        return [
            'Controllers/ArticleController.php' => <<<'PHP'
                <?php

                namespace App\Http\Controllers;

                use App\Http\Resources\Article;

                class ArticleController
                {
                    public function show($article)
                    {
                        return new Article($article);
                    }
                }

                PHP,
            'Resources/Article.php' => <<<'PHP'
                <?php

                namespace App\Http\Resources;

                use Illuminate\Http\Resources\Json\JsonResource;

                class Article extends JsonResource
                {
                }

                PHP,
            'Resources/CommentCollection.php' => <<<'PHP'
                <?php

                namespace App\Http\Resources;

                use Illuminate\Http\Resources\Json\ResourceCollection;

                class CommentCollection extends ResourceCollection
                {
                }

                PHP,
            'Resources/OrderTransformer.php' => <<<'PHP'
                <?php

                namespace App\Http\Resources;

                use Illuminate\Http\Resources\Json\JsonResource;

                class OrderTransformer extends JsonResource
                {
                }

                PHP,
        ];
    }
}
