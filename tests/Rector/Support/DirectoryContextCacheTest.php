<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Support;

use Hihaho\RectorRules\Rector\Support\DirectoryContextCache;
use PHPUnit\Framework\TestCase;
use Rector\ValueObject\Application\File;

final class DirectoryContextCacheTest extends TestCase
{
    public function test_memoizes_and_reinvalidates_per_file(): void
    {
        $routesFile = new File('/app/routes/web.php', '');
        $appFile = new File('/app/Http/Controllers/ArticleController.php', '');

        // First call computes; repeat call on the same File returns the memoized verdict.
        $this->assertTrue(DirectoryContextCache::isInRoutesDirectory($routesFile));
        $this->assertTrue(DirectoryContextCache::isInRoutesDirectory($routesFile));

        // A different File recomputes rather than returning the previous verdict...
        $this->assertFalse(DirectoryContextCache::isInRoutesDirectory($appFile));

        // ...and switching back recomputes correctly (no stale cache).
        $this->assertTrue(DirectoryContextCache::isInRoutesDirectory($routesFile));
    }

    public function test_routes_and_migrations_verdicts_are_independent(): void
    {
        $migrationFile = new File('/database/migrations/2024_01_01_create_articles.php', '');

        $this->assertTrue(DirectoryContextCache::isInMigrationsDirectory($migrationFile));
        $this->assertFalse(DirectoryContextCache::isInRoutesDirectory($migrationFile));
    }

    public function test_vendor_paths_are_excluded(): void
    {
        $vendorRoutes = new File('/app/vendor/acme/package/routes/stub.php', '');
        $vendorMigrations = new File('/app/vendor/acme/package/database/migrations/stub.php', '');

        $this->assertFalse(DirectoryContextCache::isInRoutesDirectory($vendorRoutes));
        $this->assertFalse(DirectoryContextCache::isInMigrationsDirectory($vendorMigrations));
    }
}
