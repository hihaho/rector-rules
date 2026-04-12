<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source;

final class VideoModel
{
    public const string CALIPER_ENABLED = 'caliper_enabled';

    public const string STATUS = 'status';

    public const int MAX_DURATION = 3600;

    public const float DEFAULT_RATIO = 1.5;

    public const bool INDEXED_BY_DEFAULT = true;

    public const ?string LEGACY_FIELD = null;

    /** @var list<string> */
    public const array TAGS = ['featured', 'trending'];
}
