<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses\Support;

use Composer\InstalledVersions;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use Throwable;

/**
 * Identifies the code that produced a cached scan.
 *
 * A corpus digest says nothing about the two things outside the corpus that change what the
 * scan decides: the installed packages, because the candidate test reflects over a parent
 * class, and this package's own rules. Both are folded in here.
 *
 * Null means this process cannot identify itself, and the caller must then skip caching
 * rather than write an entry nothing can invalidate.
 *
 * @internal not public API; may change in any release
 */
final class PackageFingerprint
{
    private ?string $resolved = null;

    private bool $isResolved = false;

    public function resolve(): ?string
    {
        if ($this->isResolved) {
            return $this->resolved;
        }

        $this->isResolved = true;

        try {
            // `InstalledVersions` freezes its reference at install time, so on a `dev-*` or
            // path install the version alone never moves when the scan's logic changes —
            // hence the digest of this package's own sources alongside it.
            $this->resolved = InstalledVersions::getVersion('hihaho/rector-rules')
                . '@' . (InstalledVersions::getReference('hihaho/rector-rules') ?? '')
                . '@' . hash('xxh128', serialize(InstalledVersions::getAllRawData()))
                . '@' . $this->ruleSourceDigest();
        } catch (Throwable) {
            $this->resolved = null;
        }

        return $this->resolved;
    }

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
}
