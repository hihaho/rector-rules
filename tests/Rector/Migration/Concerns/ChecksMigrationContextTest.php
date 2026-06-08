<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Migration\Concerns;

use Hihaho\RectorRules\Rector\Migration\Concerns\ChecksMigrationContext;
use Hihaho\RectorRules\Tests\Support\PathContextChecker;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Rector\ValueObject\Application\File;

final class ChecksMigrationContextTest extends TestCase
{
    #[DataProvider('providePaths')]
    public function test_identifies_migration_paths(string $filePath, bool $expected): void
    {
        $host = $this->host($filePath);

        $this->assertSame($expected, $host->check());
    }

    /** @return iterable<string, array{string, bool}> */
    public static function providePaths(): iterable
    {
        yield 'laravel migrations dir' => [
            '/app/database/migrations/2026_01_01_create_articles.php',
            true,
        ];

        yield 'absolute laravel migrations path' => [
            '/Users/sander/project/database/migrations/2026_04_01_add_column.php',
            true,
        ];

        yield 'rooted migrations dir' => [
            '/migrations/2026_01_01_create_articles.php',
            true,
        ];

        yield 'outside migrations' => [
            '/app/Http/Controllers/ArticleController.php',
            false,
        ];

        yield 'vendor path containing migrations is excluded' => [
            '/app/vendor/acme/package/database/migrations/stub.php',
            false,
        ];

        yield 'vendor at root with migrations' => [
            '/vendor/acme/migrations/stub.php',
            false,
        ];

        yield 'path mentioning migrations not as a directory' => [
            '/app/Models/MigrationsHelper.php',
            false,
        ];
    }

    private function host(string $filePath): PathContextChecker
    {
        return new readonly class ($filePath) implements PathContextChecker {
            use ChecksMigrationContext;

            public function __construct(private string $filePath) {}

            public function check(): bool
            {
                return $this->isInMigrationsDirectory();
            }

            private function getFile(): File
            {
                return new File($this->filePath, '');
            }
        };
    }
}
