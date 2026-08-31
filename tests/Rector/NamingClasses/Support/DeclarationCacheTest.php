<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\Support;

use Hihaho\RectorRules\Rector\NamingClasses\Support\ClassDeclaration;
use Hihaho\RectorRules\Rector\NamingClasses\Support\DeclarationCache;
use Hihaho\RectorRules\Rector\NamingClasses\Support\JsonFileStore;
use Illuminate\Notifications\Notification;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * A file's entry is reused whenever its stat digest still matches, so anything this class
 * hands back wrong is decided on for the rest of the run. Every malformed shape has to come
 * back as "not cached" rather than as a half-populated entry.
 */
final class DeclarationCacheTest extends AbstractLazyTestCase
{
    private string $directory = '';

    protected function setUp(): void
    {
        parent::setUp();

        $this->directory = sys_get_temp_dir() . '/hihaho-declaration-cache-' . bin2hex(random_bytes(6));
    }

    protected function tearDown(): void
    {
        $filePaths = glob($this->directory . '/*');

        foreach ($filePaths === false ? [] : $filePaths as $filePath) {
            unlink($filePath);
        }

        if (is_dir($this->directory)) {
            rmdir($this->directory);
        }

        parent::tearDown();
    }

    public function test_reads_back_what_it_stored(): void
    {
        $entries = [
            '/app/Notifications/OrderShipped.php' => [
                'digest' => '111|222|333',
                'names' => ['App\Notifications\OrderShipped'],
                'classes' => [new ClassDeclaration(
                    'App\Notifications\OrderShipped',
                    'OrderShipped',
                    Notification::class,
                    false,
                )],
            ],
        ];

        $declarationCache = $this->makeCache();
        $declarationCache->store('a-corpus', $entries);

        $this->assertEquals($entries, $declarationCache->load('a-corpus'));
    }

    public function test_keeps_a_file_that_declares_nothing(): void
    {
        // A file the filter skipped has no declarations, and remembering that is the point:
        // next run it costs a stat instead of a read.
        $entries = ['/app/helpers.php' => ['digest' => '1|2|3', 'names' => [], 'classes' => []]];

        $declarationCache = $this->makeCache();
        $declarationCache->store('a-corpus', $entries);

        $this->assertEquals($entries, $declarationCache->load('a-corpus'));
    }

    public function test_a_class_with_no_parent_round_trips_as_having_none(): void
    {
        $entries = [
            '/app/Plain.php' => [
                'digest' => '1|2|3',
                'names' => ['App\Plain'],
                'classes' => [new ClassDeclaration('App\Plain', 'Plain', null, false)],
            ],
        ];

        $declarationCache = $this->makeCache();
        $declarationCache->store('a-corpus', $entries);

        $loaded = $declarationCache->load('a-corpus');

        $this->assertArrayHasKey('/app/Plain.php', $loaded);
        $this->assertNull($loaded['/app/Plain.php']['classes'][0]->parentFqcn);
    }

    public function test_a_key_that_was_never_stored_is_empty(): void
    {
        $this->assertSame([], $this->makeCache()->load('never-written'));
    }

    public function test_a_malformed_entry_is_dropped_and_the_rest_survive(): void
    {
        // One bad entry costs a re-parse of that file, not of the corpus.
        $this->makeCache()->store('a-corpus', [
            '/app/Good.php' => ['digest' => '1|2|3', 'names' => ['App\Good'], 'classes' => []],
        ]);

        $path = $this->onlyEntryPath();
        $stored = json_decode((string) file_get_contents($path), true);
        $this->assertIsArray($stored);

        $stored['/app/Bad.php'] = ['digest' => '4|5|6', 'names' => 'not-a-list', 'classes' => []];
        file_put_contents($path, (string) json_encode($stored));

        $loaded = $this->makeCache()->load('a-corpus');

        $this->assertArrayHasKey('/app/Good.php', $loaded);
        $this->assertArrayNotHasKey('/app/Bad.php', $loaded);
    }

    public function test_a_class_entry_missing_its_parent_key_is_dropped(): void
    {
        // Distinct from a null parent: a missing key means the writer was not this code.
        $this->makeCache()->store('a-corpus', [
            '/app/Order.php' => [
                'digest' => '1|2|3',
                'names' => ['App\Order'],
                'classes' => [new ClassDeclaration('App\Order', 'Order', null, false)],
            ],
        ]);

        $path = $this->onlyEntryPath();
        file_put_contents(
            $path,
            '{"\/app\/Order.php":{"digest":"1|2|3","names":["App\\\\Order"],"classes":[{"fqcn":"App\\\\Order","shortName":"Order","isAbstract":false}]}}'
        );

        $this->assertSame([], $this->makeCache()->load('a-corpus'));
    }

    public function test_a_truncated_file_is_empty_rather_than_an_error(): void
    {
        $this->makeCache()->store('a-corpus', [
            '/app/Order.php' => ['digest' => '1|2|3', 'names' => [], 'classes' => []],
        ]);

        file_put_contents($this->onlyEntryPath(), '{"/app/Order.php":{"dig');

        $this->assertSame([], $this->makeCache()->load('a-corpus'));
    }

    private function makeCache(): DeclarationCache
    {
        return new DeclarationCache(new JsonFileStore($this->directory));
    }

    private function onlyEntryPath(): string
    {
        $entries = glob($this->directory . '/*.json');

        $this->assertNotFalse($entries);
        $this->assertCount(1, $entries);

        return $entries[0];
    }
}
