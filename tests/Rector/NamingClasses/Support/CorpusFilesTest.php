<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\Support;

use Hihaho\RectorRules\Rector\NamingClasses\Support\CorpusFiles;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * The digest and the settled check are the whole of the scan cache's invalidation. If they
 * are wrong, a run reuses decisions taken against different code — so they are pinned here
 * rather than only through the cache that consumes them.
 */
final class CorpusFilesTest extends AbstractLazyTestCase
{
    private string $directory = '';

    protected function setUp(): void
    {
        parent::setUp();

        $this->directory = sys_get_temp_dir() . '/hihaho-corpus-files-' . bin2hex(random_bytes(6));

        mkdir($this->directory, 0o777, true);
    }

    protected function tearDown(): void
    {
        $filePaths = glob($this->directory . '/*');

        foreach ($filePaths === false ? [] : $filePaths as $filePath) {
            unlink($filePath);
        }

        rmdir($this->directory);

        parent::tearDown();
    }

    public function test_an_unchanged_corpus_digests_the_same_from_a_fresh_instance(): void
    {
        $this->writeFile('Alpha.php', 'Alpha');

        $this->assertSame($this->digest(), $this->digest());
    }

    public function test_an_edit_that_changes_a_file_length_changes_the_digest(): void
    {
        $this->writeFile('Alpha.php', 'Alpha');
        $before = $this->digest();

        $this->writeFile('Alpha.php', 'AlphaWithALongerName');

        $this->assertNotSame($before, $this->digest());
    }

    public function test_adding_a_file_changes_the_digest(): void
    {
        $this->writeFile('Alpha.php', 'Alpha');
        $before = $this->digest();

        $this->writeFile('Beta.php', 'Beta');

        $this->assertNotSame($before, $this->digest());
    }

    public function test_removing_a_file_changes_the_digest(): void
    {
        $this->writeFile('Alpha.php', 'Alpha');
        $this->writeFile('Beta.php', 'Beta');
        $before = $this->digest();

        unlink($this->directory . '/Beta.php');

        $this->assertNotSame($before, $this->digest());
    }

    public function test_a_replaced_file_of_the_same_length_and_time_still_changes_the_digest(): void
    {
        // What an `rsync -a`, a `tar -x` or a restored CI workspace does: same bytes on the
        // stat, different contents. The digest carries the inode so the replacement shows.
        $path = $this->writeFile('Alpha.php', 'Alpha');
        $mtime = filemtime($path);
        $this->assertNotFalse($mtime);
        $before = $this->digest();

        unlink($path);
        $this->writeFile('Alpha.php', 'Gamma');
        touch($path, $mtime);
        clearstatcache();

        $this->assertNotSame($before, $this->digest());
    }

    public function test_a_corpus_written_this_second_is_not_settled(): void
    {
        // Modification times are second-granular, so a file touched in the current second
        // may still be edited without the digest moving. Nothing may be cached against it.
        $this->writeFile('Alpha.php', 'Alpha');

        $this->assertFalse((new CorpusFiles())->isSettled([$this->directory]));
    }

    public function test_a_corpus_whose_files_predate_this_second_is_settled(): void
    {
        $path = $this->writeFile('Alpha.php', 'Alpha');

        touch($path, time() - 5);
        clearstatcache(true, $path);

        $this->assertTrue((new CorpusFiles())->isSettled([$this->directory]));
    }

    private function digest(): string
    {
        // A fresh instance every time: both the listing and the digest are memoised, so a
        // reused one would answer from the walk it already did.
        return (new CorpusFiles())->fingerprintOf([$this->directory]);
    }

    private function writeFile(string $fileName, string $className): string
    {
        $path = $this->directory . '/' . $fileName;

        file_put_contents($path, "<?php\n\nnamespace App\\Corpus;\n\nclass {$className}\n{\n}\n");

        return $path;
    }
}
