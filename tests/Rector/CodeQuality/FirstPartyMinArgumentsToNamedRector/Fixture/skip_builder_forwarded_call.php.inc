<?php

namespace App;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\ArticleBuilder;

function run(ArticleBuilder $query): ArticleBuilder
{
    return $query->whereBetween('published_at', ['2026-01-01', '2026-12-31'], 'and');
}
