<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\NamedArgumentFromManifestRector;

use Hihaho\RectorRules\Rector\CodeQuality\NamedArgumentFromManifestRector;
use InvalidArgumentException;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;
use ReflectionProperty;

/**
 * Unit-tests the manifest loading/validation in configure(), independent of the
 * Rector fixture harness. Extends Rector's lazy test base (not a bare PHPUnit
 * TestCase) for the same reason {@see \Hihaho\RectorRules\Tests\Caching\ManifestCacheMetaExtensionTest}
 * does: its setUp pulls in Rector's scoper autoload, so loading a class that
 * implements a Rector contract doesn't double-declare the bundled symfony
 * polyfill on the Windows prefer-lowest CI leg.
 */
final class ConfigureManifestTest extends AbstractLazyTestCase
{
    private string $manifest;

    protected function setUp(): void
    {
        parent::setUp();

        $this->manifest = sys_get_temp_dir() . '/named-arg-configure-' . bin2hex(random_bytes(8)) . '.json';
    }

    protected function tearDown(): void
    {
        if (is_file($this->manifest)) {
            unlink($this->manifest);
        }

        parent::tearDown();
    }

    public function test_malformed_json_throws_naming_the_path(): void
    {
        file_put_contents($this->manifest, '{not valid json');

        $rule = new NamedArgumentFromManifestRector();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($this->manifest);

        $rule->configure([NamedArgumentFromManifestRector::MANIFEST => $this->manifest]);
    }

    public function test_non_list_json_throws(): void
    {
        file_put_contents($this->manifest, '{"file":"a.php"}');

        $rule = new NamedArgumentFromManifestRector();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('must be a JSON array of records');

        $rule->configure([NamedArgumentFromManifestRector::MANIFEST => $this->manifest]);
    }

    public function test_invalid_record_is_skipped_while_valid_record_loads(): void
    {
        // First record is missing `paramName`; second has an empty `paramName`;
        // third is the lone valid record. Only the valid one must load.
        file_put_contents($this->manifest, json_encode([
            ['file' => 'a.php', 'line' => 5, 'method' => 'm', 'argIndex' => 1],
            ['file' => 'a.php', 'line' => 6, 'method' => 'm', 'argIndex' => 1, 'paramName' => ''],
            ['file' => 'a.php', 'line' => 7, 'method' => 'm', 'argIndex' => 1, 'paramName' => 'inherit'],
        ]));

        $rule = new NamedArgumentFromManifestRector();
        $rule->configure([NamedArgumentFromManifestRector::MANIFEST => $this->manifest]);

        $loaded = $this->loadedRecords($rule);

        $this->assertSame(['a.php'], array_keys($loaded));
        $this->assertCount(1, $loaded['a.php']);
        $this->assertSame('inherit', $loaded['a.php'][0]['paramName']);
    }

    public function test_record_with_wrong_scalar_type_is_skipped(): void
    {
        // `line` and `argIndex` arrive as strings (a hand-edited manifest); skipped.
        file_put_contents($this->manifest, json_encode([
            ['file' => 'a.php', 'line' => '5', 'method' => 'm', 'argIndex' => '1', 'paramName' => 'inherit'],
            ['file' => 'b.php', 'line' => 9, 'method' => 'm', 'argIndex' => 0, 'paramName' => 'force'],
        ]));

        $rule = new NamedArgumentFromManifestRector();
        $rule->configure([NamedArgumentFromManifestRector::MANIFEST => $this->manifest]);

        $loaded = $this->loadedRecords($rule);

        $this->assertSame(['b.php'], array_keys($loaded));
    }

    public function test_a_missing_manifest_file_is_a_no_op(): void
    {
        $rule = new NamedArgumentFromManifestRector();
        $rule->configure([NamedArgumentFromManifestRector::MANIFEST => $this->manifest]);

        $this->assertSame([], $this->loadedRecords($rule));
    }

    /**
     * @return array<string, list<array{file: string, line: int, method: string, argIndex: int, paramName: string, value?: string}>>
     */
    private function loadedRecords(NamedArgumentFromManifestRector $rule): array
    {
        $property = new ReflectionProperty(NamedArgumentFromManifestRector::class, 'recordsByBasename');

        /** @var array<string, list<array{file: string, line: int, method: string, argIndex: int, paramName: string, value?: string}>> $value */
        $value = $property->getValue($rule);

        return $value;
    }
}
