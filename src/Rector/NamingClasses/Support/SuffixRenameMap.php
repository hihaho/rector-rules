<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

use Composer\InstalledVersions;
use FilesystemIterator;
use InvalidArgumentException;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\NodeVisitorAbstract;
use PhpParser\Parser;
use PhpParser\ParserFactory;
use Rector\Configuration\Option;
use Rector\Configuration\Parameter\SimpleParameterProvider;
use Rector\Configuration\RenamedClassesDataCollector;
use Rector\Contract\DependencyInjection\ResettableInterface;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Skipper\Skipper\Skipper;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use Throwable;

/**
 * Builds the complete class-rename map for a suffix rule **before** Rector traverses
 * any file, and renames the declaring files once the run is over.
 *
 * Why a pre-scan rather than registering each rename as it is found: Rector processes
 * files one at a time and never revisits an earlier one, and under the default
 * parallel run each worker holds its own collector. A map populated during traversal
 * therefore only reaches files that happen to sort after the declaration, in the same
 * worker. Scanning up front sidesteps both — every worker independently builds the
 * same complete map before its first file.
 *
 * @internal not public API; may change in any release
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\Support\SuffixRenameMapTest
 */
final class SuffixRenameMap implements ResettableInterface
{
    /**
     * Scan keys already folded into the collector, so N rules sharing this service
     * each scan once. Keyed by caller-supplied key plus the resolved path list.
     *
     * @var array<string, true>
     */
    private array $scanned = [];

    /**
     * Renames to apply to the filesystem once the run has written its changes.
     *
     * @var list<array{path: string, oldShortName: string, newShortName: string}>
     */
    private array $pendingFileRenames = [];

    /**
     * Every rename this service registered, `$oldFqcn => $newFqcn`. The rules consult
     * it so a class the scan declined (a collision) is not renamed in isolation.
     *
     * @var array<string, string>
     */
    private array $renames = [];

    /**
     * Classes the scan deliberately refused (a collision). Kept apart from "never seen",
     * so the per-file fallback can tell a refusal from an absence.
     *
     * @var array<string, true>
     */
    private array $declined = [];

    private bool $shutdownRegistered = false;

    private ?Parser $parser = null;

    /**
     * The scan's view of a corpus file: every class-like name it declares, and the class
     * nodes among them. Both come out of one parse — collecting them separately meant
     * reading and parsing every file in the corpus twice.
     *
     * @var array<string, array{names: list<string>, classes: list<Class_>}>
     */
    private array $scanByFile = [];

    private readonly CorpusFiles $corpusFiles;

    /**
     * Built on first use: Rector sets the cache directory while loading configuration,
     * which can land after this service is constructed.
     */
    private ?ScanCache $scanCache = null;

    public function __construct(
        private readonly RenamedClassesDataCollector $renamedClassesDataCollector,
        private readonly Skipper $skipper,
    ) {
        $this->corpusFiles = new CorpusFiles();
    }

    public function reset(): void
    {
        $this->scanned = [];
        $this->pendingFileRenames = [];
        $this->renames = [];
        $this->declined = [];
        $this->scanByFile = [];
        $this->corpusFiles->reset();
    }

    /**
     * Whether this class may be renamed, and if so, register the rename.
     *
     * The pre-scan is the authority whenever it saw the class: it alone can spot a
     * collision across the whole corpus. When it did not see the file at all — a
     * single-file run, or the fixture harness, where the path list is not yet known at
     * container-build time — the rename is cleared here instead, with the cheap
     * same-directory collision check that context allows.
     */
    public function claim(string $oldFqcn, string $newShortName, string $filePath): bool
    {
        $newFqcn = $this->replaceShortName($oldFqcn, $newShortName);

        if (isset($this->renames[$oldFqcn])) {
            // Two rules claiming the same class for different targets would leave the
            // declaration, the references and the file move disagreeing. Honour whichever
            // registered first and refuse the other.
            return $this->collisionKey($this->renames[$oldFqcn]) === $this->collisionKey($newFqcn);
        }

        if (isset($this->declined[$oldFqcn])) {
            return false;
        }

        // Cannot see the corpus here, so fall back to what this file and its directory
        // can tell us: another class in the same file already holding the destination
        // name (renaming would emit a duplicate declaration), or a sibling file named
        // after it.
        if ($this->declaresClass($filePath, $newFqcn) || file_exists(dirname($filePath) . '/' . $newShortName . '.php')) {
            $this->declined[$oldFqcn] = true;

            return false;
        }

        $this->renames[$oldFqcn] = $newFqcn;

        $this->renamedClassesDataCollector->addOldToNewClasses([$oldFqcn => $newFqcn]);

        $this->scheduleFileRename([
            'oldFqcn' => $oldFqcn,
            'newShortName' => $newShortName,
            'oldShortName' => $this->shortNameOf($oldFqcn),
            'path' => $filePath,
            'isOnlyClassInFile' => count($this->classesIn($filePath)) === 1,
        ]);

        return true;
    }

    /**
     * Fail the run when the rule that rewrites references is missing.
     *
     * A suffix rule only records renames; `RenameClassRector` applies them to every
     * reference. It is registered by this package's `config/config.php`, which reaches a
     * consumer either through `extra.rector.includes` (needs the `rector/extension-installer`
     * Composer plugin to be allowed) or through `HihahoSetList::NAMING`. A consumer with
     * the plugin disallowed who registers a suffix rule directly gets neither — and
     * renaming declarations while leaving every reference behind breaks their code
     * silently. Refuse to run instead.
     */
    public function assertReferenceRewritingIsRegistered(string $rectorClass): void
    {
        $registeredRules = SimpleParameterProvider::provideArrayParameter(Option::REGISTERED_RECTOR_RULES);

        if (in_array(RenameClassRector::class, $registeredRules, true)) {
            return;
        }

        throw new InvalidArgumentException(sprintf(
            '%s renames classes, but %s is not registered, so references to a renamed class '
            . 'would be left pointing at a name that no longer exists. Register the rule through '
            . '`HihahoSetList::NAMING`, or import `config/config.php` from hihaho/rector-rules in '
            . 'your rector.php, or allow the `rector/extension-installer` Composer plugin so it is '
            . 'imported automatically.',
            $rectorClass,
            RenameClassRector::class,
        ));
    }

    /**
     * Scan every configured path and register `[$oldFqcn => $newFqcn]` for each class
     * the resolver claims.
     *
     * @param  string  $key  Identifies the calling rule, so two rules don't share a scan.
     * @param  callable(Class_): ?string  $resolveNewShortName  Returns the new short name
     *                                                           for a class this rule claims, or null to leave it alone.
     * @param  list<string>  $destinationSuffixes  Substrings every name this rule renames *to*
     *                                             contains. Must be listed in
     *                                             The filter is widened to cover them.
     */
    public function register(string $key, callable $resolveNewShortName, array $destinationSuffixes): void
    {
        // Anything a rule renames to has to be something the corpus walk tests for, or the
        // files it skips were never checked for a collision with that name.
        $this->corpusFiles->widenTo($destinationSuffixes);

        $paths = $this->scanPaths();

        $scanKey = $key . '|' . implode('|', $paths);

        if (isset($this->scanned[$scanKey])) {
            return;
        }

        $this->scanned[$scanKey] = true;

        $cacheKey = $this->cacheKeyFor($key, $paths);

        $decisions = $cacheKey === null || $this->cacheWasCleared()
            ? null
            : $this->scanCache()->load($cacheKey);

        if ($decisions === null) {
            $decisions = $this->decide($key, $resolveNewShortName, $paths, $destinationSuffixes);

            // Storing a digest of a corpus that is still being written would let a later
            // same-second, same-length edit hide behind it.
            if ($cacheKey !== null && $this->corpusFiles->isSettled($paths)) {
                $this->scanCache()->store($cacheKey, $decisions);
            }
        }

        $this->apply($decisions);
    }

    /**
     * Walks the corpus and works out which classes this rule may rename.
     *
     * @param  callable(Class_): ?string  $resolveNewShortName
     * @param  list<string>  $paths
     * @param  list<string>  $destinationSuffixes
     * @return array{accepted: list<array{oldFqcn: string, newFqcn: string, newShortName: string, oldShortName: string, path: string, isOnlyClassInFile: bool}>, declined: list<string>}
     */
    private function decide(string $key, callable $resolveNewShortName, array $paths, array $destinationSuffixes): array
    {
        $candidates = [];
        $declaredFqcns = [];

        foreach ($this->corpusFiles->in($paths) as $filePath) {
            // A file the consumer skipped is never processed, so its declaration would
            // stay put while references to it got rewritten — a broken tree. Both a
            // global skip and one scoped to this rule count.
            // `shouldSkipElementAndFilePath()` rather than `matchSkip()`: the latter does
            // not exist in the `rector/rector` floor this package supports, and would only
            // fail on CI's prefer-lowest leg.
            if ($this->skipper->shouldSkipFilePath($filePath) || $this->skipper->shouldSkipElementAndFilePath($key, $filePath)) {
                continue;
            }

            // A file already parsed for an earlier rule is free to reuse, and re-testing it
            // would only re-read it. Otherwise ask whether it is worth parsing at all —
            // that test is sound only because collisions below are looked up under
            // destination names; see `CorpusFiles::mayContribute()`.
            if (! isset($this->scanByFile[$filePath]) && ! $this->corpusFiles->mayContribute($filePath)) {
                continue;
            }

            // Interfaces, traits and enums share the class namespace, so a rename onto
            // one of them is just as fatal as onto a class.
            foreach ($this->declaredNamesIn($filePath) as $declaredFqcn) {
                $declaredFqcns[$this->collisionKey($declaredFqcn)] = true;
            }

            $classes = $this->classesIn($filePath);
            $isOnlyClassInFile = count($classes) === 1;

            foreach ($classes as $class) {
                $oldFqcn = $this->fqcnOf($class);

                if ($oldFqcn === null) {
                    continue;
                }

                $declaredFqcns[$this->collisionKey($oldFqcn)] = true;

                $newShortName = $resolveNewShortName($class);

                if ($newShortName === null) {
                    continue;
                }

                // The declared suffixes are what let the walk above skip files without
                // parsing them. A name that contains none of them is a name the skipped
                // files were never checked against, so honour the declaration or stop.
                $this->assertDeclaredDestination($key, $newShortName, $destinationSuffixes);

                $candidates[] = [
                    'oldFqcn' => $oldFqcn,
                    'newFqcn' => $this->replaceShortName($oldFqcn, $newShortName),
                    'newShortName' => $newShortName,
                    'oldShortName' => $this->shortNameOf($oldFqcn),
                    'path' => $filePath,
                    'isOnlyClassInFile' => $isOnlyClassInFile,
                ];
            }
        }

        return $this->decideCandidates($candidates, $declaredFqcns);
    }

    /**
     * @param  list<string>  $destinationSuffixes
     */
    private function assertDeclaredDestination(string $key, string $newShortName, array $destinationSuffixes): void
    {
        foreach ($destinationSuffixes as $destinationSuffix) {
            if (stripos($newShortName, $destinationSuffix) !== false) {
                return;
            }
        }

        throw new InvalidArgumentException(sprintf(
            '%s renamed a class to "%s", which contains none of the destination substrings it '
            . 'declared (%s). The corpus scan skips files on those substrings, so it never '
            . 'checked whether "%s" was already taken.',
            $key,
            $newShortName,
            implode(', ', $destinationSuffixes),
            $newShortName,
        ));
    }

    /**
     * Turns the walk's candidates into decisions. Nothing here touches the filesystem or
     * this object's state, so the result is exactly what a cached run replays.
     *
     * @param  list<array{oldFqcn: string, newFqcn: string, newShortName: string, oldShortName: string, path: string, isOnlyClassInFile: bool}>  $candidates
     * @param  array<string, true>  $declaredFqcns
     * @return array{accepted: list<array{oldFqcn: string, newFqcn: string, newShortName: string, oldShortName: string, path: string, isOnlyClassInFile: bool}>, declined: list<string>}
     */
    private function decideCandidates(array $candidates, array $declaredFqcns): array
    {
        $destinationCounts = [];

        foreach ($candidates as $candidate) {
            $destinationCounts[$this->collisionKey($candidate['newFqcn'])] ??= 0;
            ++$destinationCounts[$this->collisionKey($candidate['newFqcn'])];
        }

        $accepted = [];
        $declined = [];

        foreach ($candidates as $candidate) {
            // Two classes converging on one name, or a destination that already exists:
            // renaming either would silently merge two types. Leave both alone.
            if ($destinationCounts[$this->collisionKey($candidate['newFqcn'])] > 1) {
                $declined[] = $candidate['oldFqcn'];

                continue;
            }

            if (isset($declaredFqcns[$this->collisionKey($candidate['newFqcn'])])) {
                $declined[] = $candidate['oldFqcn'];

                continue;
            }

            $accepted[] = $candidate;
        }

        return ['accepted' => $accepted, 'declined' => $declined];
    }

    /**
     * Applies decisions — freshly walked or replayed from the cache — to this run.
     *
     * @param  array{accepted: list<array{oldFqcn: string, newFqcn: string, newShortName: string, oldShortName: string, path: string, isOnlyClassInFile: bool}>, declined: list<string>}  $decisions
     */
    private function apply(array $decisions): void
    {
        foreach ($decisions['declined'] as $oldFqcn) {
            $this->declined[$oldFqcn] = true;
        }

        foreach ($decisions['accepted'] as $candidate) {
            $this->renames[$candidate['oldFqcn']] = $candidate['newFqcn'];

            $this->scheduleFileRename($candidate);
        }

        $map = [];

        foreach ($decisions['accepted'] as $candidate) {
            // `scheduleFileRename()` drops a rename whose file it could not move. Handing
            // that one to the collector anyway would rewrite every reference to a class
            // whose declaration keeps its old name.
            if (($this->renames[$candidate['oldFqcn']] ?? null) === $candidate['newFqcn']) {
                $map[$candidate['oldFqcn']] = $candidate['newFqcn'];
            }
        }

        if ($map === []) {
            return;
        }

        $this->renamedClassesDataCollector->addOldToNewClasses($map);
    }

    private function scanCache(): ScanCache
    {
        $cacheDirectory = SimpleParameterProvider::provideStringParameter(
            Option::CACHE_DIR,
            sys_get_temp_dir() . '/rector_cached_files',
        );

        // Per-user directory: the default cache root is a shared, predictable path in the
        // system temp dir, and entries are trusted enough to drive renames.
        $userSuffix = function_exists('posix_geteuid') ? '-' . posix_geteuid() : '';

        return $this->scanCache ??= new ScanCache($cacheDirectory . '/hihaho-suffix-scan' . $userSuffix);
    }

    /**
     * Everything that can change what the walk decides. A key that cannot be built — an
     * unserialisable skip list, or a package version this process cannot identify — means
     * no caching for this run rather than a cache that might be stale.
     *
     * The corpus digest is not enough on its own. Whether a class is a rename candidate is
     * answered by reflection over the parent class, so the answer moves when the installed
     * packages move (a `composer update` that changes a framework base class) or when this
     * package's own rules change, neither of which touches a corpus file. Both are keyed.
     *
     * What remains unkeyed: a class outside the configured paths that a corpus class
     * extends, in a project that also keeps it out of `vendor/`. Such a class is invisible
     * to both digests, so a change to it can be answered from a stale entry — put it under
     * `withPaths()` to make it visible.
     *
     * @param  list<string>  $paths
     */
    private function cacheKeyFor(string $key, array $paths): ?string
    {
        $packageVersion = $this->packageVersion();

        if ($packageVersion === null) {
            return null;
        }

        try {
            return json_encode([
                'package' => $packageVersion,
                'rules' => $this->ruleSourceDigest(),
                'installed' => $this->installedPackagesDigest(),
                'rule' => $key,
                'paths' => $paths,
                'skip' => SimpleParameterProvider::provideArrayParameter(Option::SKIP),
                'suffixes' => $this->corpusFiles->destinationSuffixes(),
                'corpus' => $this->corpusFiles->fingerprintOf($paths),
            ], JSON_THROW_ON_ERROR);
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * A digest of this package's own rule sources.
     *
     * `InstalledVersions` freezes its reference at install time, so on a `dev-*` or path
     * install — this package's own suite, or a consumer developing against a checkout —
     * the version alone never moves when the scan's logic changes.
     */
    private function ruleSourceDigest(): string
    {
        $parts = [];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(__DIR__ . '/../../..', FilesystemIterator::SKIP_DOTS),
        );

        foreach ($iterator as $fileInfo) {
            if (! $fileInfo instanceof SplFileInfo || $fileInfo->getExtension() !== 'php') {
                continue;
            }

            $parts[] = $fileInfo->getPathname() . '|' . $fileInfo->getMTime() . '|' . $fileInfo->getSize();
        }

        sort($parts);

        return hash('xxh128', implode("\n", $parts));
    }

    /**
     * A digest of every installed package's version and reference.
     *
     * The candidate test resolves a class's parent through PHPStan's reflection, so a
     * `composer update` that moves a framework base class changes the scan's answer without
     * touching a single corpus file.
     */
    private function installedPackagesDigest(): string
    {
        if (! class_exists(InstalledVersions::class)) {
            return 'unknown';
        }

        try {
            return hash('xxh128', serialize(InstalledVersions::getAllRawData()));
        } catch (Throwable) {
            return 'unknown';
        }
    }

    /**
     * The installed version of this package, so an upgrade that changes what the scan
     * decides cannot be answered from an entry the old code wrote.
     */
    private function packageVersion(): ?string
    {
        if (! class_exists(InstalledVersions::class)) {
            return null;
        }

        try {
            return InstalledVersions::getVersion('hihaho/rector-rules')
                . '@' . (InstalledVersions::getReference('hihaho/rector-rules') ?? '');
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * Rector's `--clear-cache` never reaches the parameter provider, so read the flag from
     * the command line. A false positive only costs a scan.
     */
    private function cacheWasCleared(): bool
    {
        $argv = $_SERVER['argv'] ?? [];

        return is_array($argv) && in_array('--clear-cache', $argv, true);
    }

    /**
     * @param  array{oldFqcn: string, newShortName: string, oldShortName: string, path: string, isOnlyClassInFile: bool, ...}  $candidate
     */
    private function scheduleFileRename(array $candidate): void
    {
        // A file holding more than one class is not named after any single one of them.
        if (! $candidate['isOnlyClassInFile']) {
            return;
        }

        // The basename never matched the class, so PSR-4 was never relying on it.
        if (pathinfo($candidate['path'], PATHINFO_FILENAME) !== $candidate['oldShortName']) {
            return;
        }

        // A move we could not complete would leave the new class name in the old file —
        // exactly the breakage this rule exists to prevent. Refuse the rename entirely
        // rather than half-applying it.
        if (! is_writable(dirname($candidate['path']))) {
            $this->declined[$candidate['oldFqcn']] = true;
            unset($this->renames[$candidate['oldFqcn']]);

            return;
        }

        $this->pendingFileRenames[] = [
            'path' => $candidate['path'],
            'oldShortName' => $candidate['oldShortName'],
            'newShortName' => $candidate['newShortName'],
        ];

        $this->registerShutdownFlush();
    }

    private function registerShutdownFlush(): void
    {
        if ($this->shutdownRegistered) {
            return;
        }

        $this->shutdownRegistered = true;

        register_shutdown_function(function (): void {
            $this->flushFileRenames();
        });
    }

    /**
     * Rector has no file-move API, so the rename happens after the run has written
     * every file. Each guard below also makes `--dry-run` a no-op: nothing was
     * written, so the new class name is never found on disk.
     *
     * @internal exposed for tests; not part of the public API
     */
    public function flushFileRenames(): void
    {
        foreach ($this->pendingFileRenames as $pendingFileRename) {
            $path = $pendingFileRename['path'];

            if (! is_file($path)) {
                continue;
            }

            // Rector did not write the rename — a dry run, or another worker owns this
            // file. Parsed rather than grepped, so a mention of the name in a comment or
            // a string literal cannot be mistaken for the declaration.
            if (! $this->declaresShortName($path, $pendingFileRename['newShortName'])) {
                continue;
            }

            $destination = dirname($path) . '/' . $pendingFileRename['newShortName'] . '.php';

            if (file_exists($destination)) {
                continue;
            }

            if (! @rename($path, $destination)) {
                // Loud, because the tree is now inconsistent: the class was renamed but
                // its file was not, so it no longer autoloads.
                fwrite(
                    STDERR,
                    sprintf(
                        '[hihaho/rector-rules] Could not rename "%s" to "%s". The class was renamed but the file was not, so it will not autoload. Rename it by hand.%s',
                        $path,
                        basename($destination),
                        PHP_EOL,
                    ),
                );
            }
        }

        $this->pendingFileRenames = [];
    }

    /**
     * The fixture harness supplies files through `Option::SOURCE` and leaves
     * `Option::PATHS` empty; a real run is the other way round.
     *
     * @return list<string>
     */
    private function scanPaths(): array
    {
        $paths = SimpleParameterProvider::provideArrayParameter(Option::PATHS);

        if ($paths === []) {
            $paths = SimpleParameterProvider::provideArrayParameter(Option::SOURCE);
        }

        /** @var list<string> $stringPaths */
        $stringPaths = array_values(array_filter($paths, is_string(...)));

        sort($stringPaths);

        return $stringPaths;
    }

    /**
     * Whether this file already declares the given class, which makes renaming another
     * class in it to that name a duplicate declaration.
     */
    private function declaresClass(string $filePath, string $fqcn): bool
    {
        foreach ($this->declaredNamesIn($filePath) as $declaredFqcn) {
            if ($this->collisionKey($declaredFqcn) === $this->collisionKey($fqcn)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Whether the file declares a class of this short name. Used as the written-to-disk
     * signal before a file rename.
     */
    private function declaresShortName(string $filePath, string $shortName): bool
    {
        // Fresh from disk, not from the scan's memo: this runs after Rector has written
        // the file, and the answer is about what is on disk now.
        foreach ($this->declarationsIn($filePath, fresh: true) as $class) {
            if ($class->name instanceof Identifier && strcasecmp($class->name->toString(), $shortName) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Every class-like name the file declares — classes, interfaces, traits and enums.
     *
     * @return list<string>
     */
    private function declaredNamesIn(string $filePath): array
    {
        return $this->scanFile($filePath)['names'];
    }

    /**
     * One read, one parse and one traversal per corpus file, memoised. `Class_` is a
     * `ClassLike`, so the class nodes fall out of the same walk that collects the
     * declared names.
     *
     * @return array{names: list<string>, classes: list<Class_>}
     */
    private function scanFile(string $filePath): array
    {
        if (isset($this->scanByFile[$filePath])) {
            return $this->scanByFile[$filePath];
        }

        $names = [];
        $classes = [];

        foreach ($this->declarationsIn($filePath) as $classLike) {
            if ($classLike->namespacedName instanceof Name) {
                $names[] = $classLike->namespacedName->toString();
            }

            if (! $classLike instanceof Class_) {
                continue;
            }

            // The node is kept for the whole run so every rule can ask its own question of
            // it, but only its name, parent and modifiers are ever read. Dropping the body
            // here is most of what the memo would otherwise hold — measured at a third of
            // it even on classes with a single short method.
            $classLike->stmts = [];

            $classes[] = $classLike;
        }

        return $this->scanByFile[$filePath] = ['names' => $names, 'classes' => $classes];
    }

    /**
     * PHP class names are case-insensitive, so collisions must be too.
     */
    private function collisionKey(string $fqcn): string
    {
        return strtolower($fqcn);
    }

    /**
     * @return list<Class_>
     */
    private function classesIn(string $filePath): array
    {
        return $this->scanFile($filePath)['classes'];
    }

    /**
     * Every named class-like the file declares, with names resolved.
     *
     * Name resolution and the search run in one traversal, and that traversal stops at a
     * class body: nothing inside one declares a class-like the scan cares about, and
     * resolving the names in method bodies is the bulk of the work in a corpus walk.
     * `NameResolver` has already set `namespacedName` and resolved `extends` by the time
     * the body is skipped.
     *
     * An anonymous class in a method body is therefore no longer counted. It never was a
     * rename candidate — it has no name — and it is not a declaration PSR-4 cares about,
     * so it no longer blocks the file rename either.
     *
     * @param  bool  $fresh  Read the file from disk rather than from the scan's cache.
     *
     * @return list<ClassLike>
     */
    private function declarationsIn(string $filePath, bool $fresh = false): array
    {
        $statements = $this->parseStatements($filePath, $fresh);

        if ($statements === []) {
            return [];
        }

        $declarationCollector = new class extends NodeVisitorAbstract {
            /** @var list<ClassLike> */
            public array $classLikes = [];

            public function enterNode(Node $node): ?int
            {
                if (! $node instanceof ClassLike) {
                    return null;
                }

                if ($node->namespacedName instanceof Name) {
                    $this->classLikes[] = $node;
                }

                return NodeVisitor::DONT_TRAVERSE_CHILDREN;
            }
        };

        (new NodeTraverser(new NameResolver(), $declarationCollector))->traverse($statements);

        return $declarationCollector->classLikes;
    }

    /**
     * @return list<Node>
     */
    private function parseStatements(string $filePath, bool $fresh = false): array
    {
        $contents = $this->corpusFiles->contentsOf($filePath, $fresh);

        if ($contents === null) {
            return [];
        }

        try {
            $statements = $this->parser()->parse($contents);
        } catch (Throwable) {
            // A file Rector itself would report as a parse error; not this rule's problem.
            return [];
        }

        if ($statements === null) {
            return [];
        }

        return array_values($statements);
    }

    private function parser(): Parser
    {
        return $this->parser ??= (new ParserFactory())->createForNewestSupportedVersion();
    }

    /**
     * Null for an anonymous class — a *named* class in the global namespace does get a
     * `namespacedName`, so the guard belongs here rather than on the namespace.
     */
    private function fqcnOf(Class_ $class): ?string
    {
        if (! $class->name instanceof Identifier) {
            return null;
        }

        if (! $class->namespacedName instanceof Name) {
            return null;
        }

        return $class->namespacedName->toString();
    }

    private function shortNameOf(string $fqcn): string
    {
        $position = strrpos($fqcn, '\\');

        return $position === false ? $fqcn : substr($fqcn, $position + 1);
    }

    private function replaceShortName(string $fqcn, string $newShortName): string
    {
        $position = strrpos($fqcn, '\\');

        return $position === false ? $newShortName : substr($fqcn, 0, $position + 1) . $newShortName;
    }
}
