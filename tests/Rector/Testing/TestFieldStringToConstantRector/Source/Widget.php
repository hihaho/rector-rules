<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source;

/**
 * Second test-double model, used by the end-to-end integration fixture to mirror the
 * real producer's output: several unambiguous field constants resolved to one model.
 * The constants are consumed by {@see keys()} so the auto-fix deadcode pass keeps them
 * (see the package CLAUDE.md note on Source/ classes).
 */
class Widget
{
    public const string PLAYER_URL = 'player_url';

    public const string ACCOUNT_ID = 'account_id';

    /** @return array<string> */
    public function keys(): array
    {
        return [self::PLAYER_URL, self::ACCOUNT_ID];
    }
}
