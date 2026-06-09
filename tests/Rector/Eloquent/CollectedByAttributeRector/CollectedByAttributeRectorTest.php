<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector;

use Composer\InstalledVersions;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class CollectedByAttributeRectorTest extends AbstractRectorTestCase
{
    #[DataProvider('provideData')]
    public function test(string $filePath): void
    {
        // The non-final gate is version-dependent: Laravel 12 resolves #[CollectedBy]
        // from the model's own class (so a non-final model must be skipped), Laravel 13
        // walks the parent chain (so it can be converted). Each FixtureLaravel* directory
        // holds the expectation for one line of the matrix; run the matching one only.
        if (str_contains($filePath, 'FixtureLaravel13Plus') && ! $this->attributeInheritedBySubclasses()) {
            self::markTestSkipped('Asserts Laravel 13+ behaviour; installed framework is Laravel 12.');
        }

        if (str_contains($filePath, 'FixtureLaravel12') && $this->attributeInheritedBySubclasses()) {
            self::markTestSkipped('Asserts Laravel 12 behaviour; installed framework is Laravel 13+.');
        }

        $this->doTestFile($filePath);
    }

    public static function provideData(): Iterator
    {
        // Recurses into Fixture/ and both FixtureLaravel* directories.
        return self::yieldFilesFromDirectory(__DIR__);
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/configured_rule.php';
    }

    private function attributeInheritedBySubclasses(): bool
    {
        foreach (['laravel/framework', 'illuminate/database'] as $package) {
            if (! InstalledVersions::isInstalled($package)) {
                continue;
            }

            $version = (string) InstalledVersions::getVersion($package);
            if ($version === '') {
                continue;
            }

            return version_compare($version, '13.0.0', '>=');
        }

        return false;
    }
}
