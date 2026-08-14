<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\RenamePropagation;

use FilesystemIterator;
use Hihaho\RectorRules\Rector\NamingClasses\Support\SuffixRenameMap;
use Rector\Application\ApplicationFileProcessor;
use Rector\Configuration\ConfigurationFactory;
use Rector\Configuration\Option;
use Rector\Configuration\Parameter\SimpleParameterProvider;
use Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocatorProvider\DynamicSourceLocatorProvider;
use Rector\Skipper\Skipper\Skipper;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

/**
 * Harness for cross-file coverage of the suffix rules.
 *
 * The `.php.inc` fixtures prove same-file propagation, but they cannot express the
 * defect these rules actually had: a reference in a *different* file, processed before
 * the declaration. `doTestFile()` processes exactly one path, and
 * `$includeFixtureDirectoryAsSource` only feeds the source locator. So this drives
 * `ApplicationFileProcessor::processFiles()` over a whole generated corpus.
 *
 * Each subclass supplies its own corpus, and every corpus places the referencing file
 * in a directory that sorts *before* the declaration's — Rector walks files in name
 * order, so this is the ordering that a mid-traversal rename map cannot handle.
 */
abstract class AbstractRenamePropagationTestCase extends AbstractRectorTestCase
{
    private static string $corpusPath = '';

    private static bool $processed = false;

    /**
     * Corpus to generate, as `relative/path.php => file contents`.
     *
     * @return array<string, string>
     */
    abstract protected static function corpusFiles(): array;

    /**
     * Deterministic per test class, so a config file can name it too — a skip pattern has
     * to be declared before the corpus exists.
     */
    public static function corpusDirectory(): string
    {
        return sys_get_temp_dir() . '/hihaho-rename-propagation-'
            . str_replace('\\', '_', static::class);
    }

    public static function setUpBeforeClass(): void
    {
        self::$processed = false;
        self::$corpusPath = static::corpusDirectory();

        self::deleteDirectory(self::$corpusPath);

        foreach (static::corpusFiles() as $relativePath => $contents) {
            $absolutePath = self::$corpusPath . '/' . $relativePath;

            if (! is_dir(dirname($absolutePath))) {
                mkdir(dirname($absolutePath), 0o777, true);
            }

            file_put_contents($absolutePath, $contents);
        }
    }

    public static function tearDownAfterClass(): void
    {
        self::deleteDirectory(self::$corpusPath);

        parent::tearDownAfterClass();
    }

    protected function setUp(): void
    {
        // Creating the container imports Rector's own `config/config.php`, which calls
        // `paths([])`. So the corpus path has to be set after the container exists but
        // before `parent::setUp()` constructs the rules — that is when the pre-scan runs.
        self::getContainer();

        SimpleParameterProvider::setParameter(Option::PATHS, [self::$corpusPath]);

        parent::setUp();
    }

    /**
     * Runs Rector over the whole corpus once per test class.
     */
    protected function processCorpus(): void
    {
        if (self::$processed) {
            return;
        }

        self::$processed = true;

        // FilesFinder applies path skips before anything is processed; this harness feeds
        // ApplicationFileProcessor directly, so it has to do the same or a skipped file
        // would be processed here but not in a real run.
        $skipper = $this->make(Skipper::class);

        $filePaths = array_values(array_filter(
            $this->corpusFilePaths(),
            static fn (string $filePath): bool => ! $skipper->shouldSkipFilePath($filePath),
        ));

        SimpleParameterProvider::setParameter(Option::SOURCE, $filePaths);

        $this->make(DynamicSourceLocatorProvider::class)->addDirectories([self::$corpusPath]);

        $configuration = $this->make(ConfigurationFactory::class)->createForTests($filePaths);

        $this->make(ApplicationFileProcessor::class)->processFiles($filePaths, $configuration);

        // In a real run this fires from a shutdown hook, once Rector has written every
        // file. Nothing about the guards differs; only the trigger.
        $this->make(SuffixRenameMap::class)->flushFileRenames();
    }

    protected function corpusPath(string $relativePath = ''): string
    {
        return $relativePath === '' ? self::$corpusPath : self::$corpusPath . '/' . $relativePath;
    }

    protected function corpusContents(string $relativePath): string
    {
        return (string) file_get_contents($this->corpusPath($relativePath));
    }

    /** @return list<string> */
    private function corpusFilePaths(): array
    {
        $paths = [];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(self::$corpusPath, FilesystemIterator::SKIP_DOTS),
        );

        foreach ($iterator as $fileInfo) {
            if ($fileInfo instanceof SplFileInfo && $fileInfo->getExtension() === 'php') {
                $paths[] = $fileInfo->getPathname();
            }
        }

        sort($paths);

        return $paths;
    }

    private static function deleteDirectory(string $directory): void
    {
        if (! is_dir($directory)) {
            return;
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST,
        );

        foreach ($iterator as $fileInfo) {
            if (! $fileInfo instanceof SplFileInfo) {
                continue;
            }

            $fileInfo->isDir() ? rmdir($fileInfo->getPathname()) : unlink($fileInfo->getPathname());
        }

        rmdir($directory);
    }
}
