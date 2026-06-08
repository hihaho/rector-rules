<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source;

final class Poster
{
    public string $original = '';

    public Inner $inner;

    public function caption(): string
    {
        return '';
    }

    public function scaled(int $factor, string $suffix): string
    {
        return $factor . $suffix;
    }
}
