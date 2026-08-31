<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\Support;

use Hihaho\RectorRules\Rector\NamingClasses\Support\ClassDeclaration;
use Hihaho\RectorRules\Rector\NamingClasses\Support\CorpusFiles;
use Hihaho\RectorRules\Rector\NamingClasses\Support\DeclarationCache;
use Hihaho\RectorRules\Rector\NamingClasses\Support\DeclarationIndex;
use Hihaho\RectorRules\Rector\NamingClasses\Support\JsonFileStore;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * The index decides, per file, between reusing a cached parse and doing a new one. Getting
 * that wrong either replays a file that changed or re-reads a corpus that did not.
 */
final class DeclarationIndexTest extends AbstractLazyTestCase
{
    private string $directory = '';

    private string $cacheDirectory = '';

    protected function setUp(): void
    {
        parent::setUp();

        $this->directory = sys_get_temp_dir() . '/hihaho-declaration-index-' . bin2hex(random_bytes(6));
        $this->cacheDirectory = $this->directory . '-cache';

        mkdir($this->directory, 0o777, true);
    }

    protected function tearDown(): void
    {
        foreach ([$this->directory, $this->cacheDirectory] as $directory) {
            $filePaths = glob($directory . '/*');

            foreach ($filePaths === false ? [] : $filePaths as $filePath) {
                unlink($filePath);
            }

            if (is_dir($directory)) {
                rmdir($directory);
            }
        }

        parent::tearDown();
    }

    public function test_parses_a_file_once_and_then_reuses_it(): void
    {
        $this->writeSettledFile('Alpha.php');

        $corpusFiles = new CorpusFiles();
        $path = $this->corpusPath($corpusFiles, 'Alpha.php');

        $index = $this->makeIndex($corpusFiles);
        $index->load('a-key');

        $parses = 0;
        $parse = function (string $filePath) use (&$parses): array {
            ++$parses;

            return ['names' => ['App\Alpha'], 'classes' => []];
        };

        $index->forFile($path, $parse);
        $index->forFile($path, $parse);

        $this->assertSame(1, $parses);
    }

    public function test_re_parses_a_file_whose_digest_moved(): void
    {
        $this->writeSettledFile('Alpha.php');

        $corpusFiles = new CorpusFiles();
        $path = $this->corpusPath($corpusFiles, 'Alpha.php');

        $index = $this->makeIndex($corpusFiles);
        $index->load('a-key');

        $parses = 0;
        $parse = function (string $filePath) use (&$parses): array {
            ++$parses;

            return ['names' => [], 'classes' => []];
        };

        $index->forFile($path, $parse);

        // A fresh CorpusFiles restats, so the index sees the new digest.
        file_put_contents($path, "<?php\n\n// changed\n");
        touch($path, time() - 3);
        clearstatcache();

        $movedCorpusFiles = new CorpusFiles();
        $this->corpusPath($movedCorpusFiles, 'Alpha.php');

        $movedIndex = $this->makeIndex($movedCorpusFiles);
        $movedIndex->load('a-key');
        $movedIndex->forFile($path, $parse);

        $this->assertSame(2, $parses);
    }

    public function test_a_stored_entry_is_reused_by_a_later_run(): void
    {
        $this->writeSettledFile('Alpha.php');

        $first = new CorpusFiles();
        $path = $this->corpusPath($first, 'Alpha.php');

        $index = $this->makeIndex($first);
        $index->load('a-key');
        $index->forFile($path, static fn (string $filePath): array => [
            'names' => ['App\Alpha'],
            'classes' => [new ClassDeclaration('App\Alpha', 'Alpha', null, false)],
        ]);
        $index->store([$path]);

        $second = new CorpusFiles();
        $second->in([$this->directory]);

        $laterIndex = $this->makeIndex($second);
        $laterIndex->load('a-key');

        $parsed = false;
        $entry = $laterIndex->forFile($path, function (string $filePath) use (&$parsed): array {
            $parsed = true;

            return ['names' => [], 'classes' => []];
        });

        $this->assertFalse($parsed);
        $this->assertSame(['App\Alpha'], $entry['names']);
        $this->assertSame('Alpha', $entry['classes'][0]->shortName);
    }

    public function test_a_file_written_this_second_is_not_stored(): void
    {
        // Its digest could still be matched by a later write in the same second.
        file_put_contents($this->directory . '/Fresh.php', "<?php\n");
        clearstatcache();

        $corpusFiles = new CorpusFiles();
        $path = $this->corpusPath($corpusFiles, 'Fresh.php');

        $index = $this->makeIndex($corpusFiles);
        $index->load('a-key');
        $index->forFile($path, static fn (string $filePath): array => ['names' => [], 'classes' => []]);
        $index->store([$path]);

        $this->assertSame([], $this->makeCache()->load('a-key'));
    }

    public function test_a_file_no_longer_in_the_corpus_is_dropped(): void
    {
        $this->writeSettledFile('Kept.php');
        $this->writeSettledFile('Removed.php');

        $corpusFiles = new CorpusFiles();
        $kept = $this->corpusPath($corpusFiles, 'Kept.php');
        $removed = $this->corpusPath($corpusFiles, 'Removed.php');

        $index = $this->makeIndex($corpusFiles);
        $index->load('a-key');

        $parse = static fn (string $filePath): array => ['names' => [], 'classes' => []];
        $index->forFile($kept, $parse);
        $index->forFile($removed, $parse);
        $index->store([$kept, $removed]);

        $this->assertCount(2, $this->makeCache()->load('a-key'));

        // The same index, told the corpus now holds only one of them.
        $index->store([$kept]);

        $stored = $this->makeCache()->load('a-key');
        $this->assertArrayHasKey($kept, $stored);
        $this->assertArrayNotHasKey($removed, $stored);
    }

    public function test_without_a_key_nothing_is_written(): void
    {
        $this->writeSettledFile('Alpha.php');

        $corpusFiles = new CorpusFiles();
        $path = $this->corpusPath($corpusFiles, 'Alpha.php');

        $index = $this->makeIndex($corpusFiles);
        $index->load(null);
        $index->forFile($path, static fn (string $filePath): array => ['names' => [], 'classes' => []]);
        $index->store([$path]);

        $entries = glob($this->cacheDirectory . '/*.json');

        $this->assertNotFalse($entries);
        $this->assertSame([], $entries);
    }

    public function test_reset_forgets_the_run(): void
    {
        $this->writeSettledFile('Alpha.php');

        $corpusFiles = new CorpusFiles();
        $path = $this->corpusPath($corpusFiles, 'Alpha.php');

        $index = $this->makeIndex($corpusFiles);
        $index->load('a-key');

        $parses = 0;
        $parse = function (string $filePath) use (&$parses): array {
            ++$parses;

            return ['names' => [], 'classes' => []];
        };

        $index->forFile($path, $parse);
        $index->reset();
        $index->load('a-key');
        $index->forFile($path, $parse);

        $this->assertSame(2, $parses);
    }

    public function test_a_file_that_could_not_be_read_is_not_remembered(): void
    {
        // A failed read moves neither size nor timestamps, so an empty entry written from
        // one would be reused for every later run — silently taking the file out of
        // collision detection instead of costing a single retry.
        $this->writeSettledFile('Unreadable.php');

        $corpusFiles = new CorpusFiles();
        $path = $this->corpusPath($corpusFiles, 'Unreadable.php');

        $index = $this->makeIndex($corpusFiles);
        $index->load('a-key');

        $entry = $index->forFile($path, static fn (string $filePath): ?array => null);

        $this->assertSame([], $entry['names']);
        $this->assertSame([], $entry['classes']);

        $index->store([$path]);

        $this->assertSame([], $this->makeCache()->load('a-key'));
    }

    public function test_a_failed_read_does_not_evict_a_good_entry(): void
    {
        $this->writeSettledFile('Alpha.php');

        $corpusFiles = new CorpusFiles();
        $path = $this->corpusPath($corpusFiles, 'Alpha.php');

        $index = $this->makeIndex($corpusFiles);
        $index->load('a-key');
        $index->forFile($path, static fn (string $filePath): array => [
            'names' => ['App\\Alpha'],
            'classes' => [],
        ]);
        $index->store([$path]);

        // A later run where the same file cannot be read: its digest still matches, so the
        // good entry answers and the read is never attempted.
        $laterIndex = $this->makeIndex($corpusFiles);
        $laterIndex->load('a-key');

        $entry = $laterIndex->forFile($path, static fn (string $filePath): ?array => null);

        $this->assertSame(['App\\Alpha'], $entry['names']);
    }

    private function makeIndex(CorpusFiles $corpusFiles): DeclarationIndex
    {
        return new DeclarationIndex($this->makeCache(), $corpusFiles);
    }

    private function makeCache(): DeclarationCache
    {
        return new DeclarationCache(new JsonFileStore($this->cacheDirectory));
    }

    private function writeSettledFile(string $fileName): string
    {
        $path = $this->directory . '/' . $fileName;

        file_put_contents($path, "<?php\n\nnamespace App;\n\nclass " . basename($fileName, '.php') . "\n{\n}\n");
        touch($path, time() - 5);
        clearstatcache();

        return $path;
    }

    /**
     * The walk reports paths the way the directory iterator spells them, which on Windows
     * is not how the test wrote them. Everything keyed by path has to use its spelling.
     */
    private function corpusPath(CorpusFiles $corpusFiles, string $fileName): string
    {
        foreach ($corpusFiles->in([$this->directory]) as $filePath) {
            if (basename($filePath) === $fileName) {
                return $filePath;
            }
        }

        self::fail(sprintf('%s is not in the corpus', $fileName));
    }
}
