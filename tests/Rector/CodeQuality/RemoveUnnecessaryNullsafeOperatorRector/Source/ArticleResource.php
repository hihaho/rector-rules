<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source;

final class ArticleResource
{
    public Poster $poster;            // native, non-null — nullsafe is unnecessary

    public ?Poster $maybePoster = null; // native, nullable — nullsafe is required
}
