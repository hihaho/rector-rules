<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\Support;

use Hihaho\RectorRules\Rector\NamingClasses\Support\CorpusFiles;
use Hihaho\RectorRules\Rector\NamingClasses\Support\ScanCacheKeys;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * The difference between the two keys is the whole design: a decision depends on every file
 * in the corpus, a file's syntax depends only on that file. Keying declarations per corpus
 * state is what made an edit re-read everything, so it is pinned here.
 */
final class ScanCacheKeysTest extends AbstractLazyTestCase
{
    private string $directory = '';

    protected function setUp(): void
    {
        parent::setUp();

        $this->directory = sys_get_temp_dir() . '/hihaho-scan-cache-keys-' . bin2hex(random_bytes(6));

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

    public function test_editing_a_file_changes_the_decisions_key(): void
    {
        $this->writeFile('Alpha.php', 'Alpha');

        $before = $this->keys()->cacheKeyFor('a-rule', [$this->directory]);

        $this->writeFile('Alpha.php', 'AlphaWithALongerName');

        $this->assertNotSame($before, $this->keys()->cacheKeyFor('a-rule', [$this->directory]));
    }

    public function test_editing_a_file_leaves_the_declarations_key_alone(): void
    {
        // Otherwise every edit would throw away the syntax of every other file.
        $this->writeFile('Alpha.php', 'Alpha');

        $before = $this->keys()->declarationCacheKeyFor([$this->directory]);

        $this->writeFile('Alpha.php', 'AlphaWithALongerName');
        $this->writeFile('Beta.php', 'Beta');

        $this->assertSame($before, $this->keys()->declarationCacheKeyFor([$this->directory]));
    }

    public function test_the_two_keys_are_not_the_same(): void
    {
        $this->writeFile('Alpha.php', 'Alpha');

        $keys = $this->keys();

        $this->assertNotSame(
            $keys->cacheKeyFor('a-rule', [$this->directory]),
            $keys->declarationCacheKeyFor([$this->directory]),
        );
    }

    public function test_each_rule_gets_its_own_decisions_key(): void
    {
        $this->writeFile('Alpha.php', 'Alpha');

        $keys = $this->keys();

        $this->assertNotSame(
            $keys->cacheKeyFor('one-rule', [$this->directory]),
            $keys->cacheKeyFor('another-rule', [$this->directory]),
        );
    }

    public function test_no_package_fingerprint_means_no_caching(): void
    {
        // Rather than write an entry that nothing can invalidate.
        $this->writeFile('Alpha.php', 'Alpha');

        $keys = new ScanCacheKeys(new CorpusFiles(), null);

        $this->assertNull($keys->cacheKeyFor('a-rule', [$this->directory]));
        $this->assertNull($keys->declarationCacheKeyFor([$this->directory]));
    }

    public function test_declarations_are_shared_across_rules(): void
    {
        // Syntax does not depend on which rule asked, so all four rules reuse one entry.
        $this->writeFile('Alpha.php', 'Alpha');

        $keys = $this->keys();
        $key = $keys->declarationCacheKeyFor([$this->directory]);

        $this->assertNotNull($key);
        $this->assertSame($key, $keys->declarationCacheKeyFor([$this->directory]));
    }

    public function test_a_widened_destination_suffix_set_changes_the_declarations_key(): void
    {
        // A wider set means files that were skipped unparsed might now matter, so entries
        // recorded under the narrower set must not be reused.
        $this->writeFile('Alpha.php', 'Alpha');

        $corpusFiles = new CorpusFiles();
        $keys = new ScanCacheKeys($corpusFiles, 'a-package-fingerprint');

        $before = $keys->declarationCacheKeyFor([$this->directory]);

        $corpusFiles->widenTo(['Listener']);

        $this->assertNotSame($before, $keys->declarationCacheKeyFor([$this->directory]));
    }

    private function keys(): ScanCacheKeys
    {
        return new ScanCacheKeys(new CorpusFiles(), 'a-package-fingerprint');
    }

    private function writeFile(string $fileName, string $className): void
    {
        file_put_contents(
            $this->directory . '/' . $fileName,
            "<?php\n\nnamespace App\\Corpus;\n\nclass {$className}\n{\n}\n"
        );

        clearstatcache();
    }
}
