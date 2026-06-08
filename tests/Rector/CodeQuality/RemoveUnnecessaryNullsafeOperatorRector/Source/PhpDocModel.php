<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source;

/**
 * Non-nullability of $poster exists ONLY in phpdoc (no native property) — like an
 * Eloquent magic relation. The native-type default must NOT trust this; the
 * trust_phpdoc_types opt-in may.
 *
 * @property Poster $poster
 */
final class PhpDocModel
{
    public function __get(string $name): mixed
    {
        return new Poster();
    }
}
