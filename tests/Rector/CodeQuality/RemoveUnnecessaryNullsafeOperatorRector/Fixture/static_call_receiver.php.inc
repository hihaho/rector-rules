<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// receiver is a static call returning a non-null object — converted
class PosterRegistry
{
    public static function make(): Poster
    {
        return new Poster();
    }

    public function caption(): string
    {
        $caption = self::make()?->caption();

        return $caption;
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Fixture;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\Source\Poster;

// receiver is a static call returning a non-null object — converted
class PosterRegistry
{
    public static function make(): Poster
    {
        return new Poster();
    }

    public function caption(): string
    {
        $caption = self::make()->caption();

        return $caption;
    }
}
