<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Routing\Concerns;

use Hihaho\RectorRules\Rector\Routing\Concerns\ChecksRouteContext;
use Hihaho\RectorRules\Tests\Support\PathContextChecker;
use LogicException;
use PhpParser\Node;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Rector\ValueObject\Application\File;

final class ChecksRouteContextTest extends TestCase
{
    #[DataProvider('providePaths')]
    public function test_identifies_route_paths(string $filePath, bool $expected): void
    {
        $host = $this->host($filePath);

        $this->assertSame($expected, $host->check());
    }

    /** @return iterable<string, array{string, bool}> */
    public static function providePaths(): iterable
    {
        yield 'laravel routes dir' => [
            '/app/routes/web.php',
            true,
        ];

        yield 'absolute laravel routes path' => [
            '/Users/sander/project/routes/api.php',
            true,
        ];

        yield 'rooted routes dir' => [
            '/routes/console.php',
            true,
        ];

        yield 'outside routes' => [
            '/app/Http/Controllers/ArticleController.php',
            false,
        ];

        yield 'vendor path containing routes is excluded' => [
            '/app/vendor/acme/package/routes/stub.php',
            false,
        ];

        yield 'vendor at root with routes' => [
            '/vendor/acme/routes/stub.php',
            false,
        ];

        yield 'path mentioning routes not as a directory' => [
            '/app/Services/RoutesResolver.php',
            false,
        ];
    }

    private function host(string $filePath): PathContextChecker
    {
        return new readonly class ($filePath) implements PathContextChecker {
            use ChecksRouteContext;

            public function __construct(private string $filePath) {}

            public function check(): bool
            {
                return $this->isInRoutesDirectory();
            }

            protected function isName(Node $node, string $name): bool
            {
                throw new LogicException('Not exercised in path-context tests.');
            }

            private function getFile(): File
            {
                return new File($this->filePath, '');
            }
        };
    }
}
