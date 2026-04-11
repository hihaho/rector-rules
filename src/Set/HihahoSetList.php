<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Set;

final class HihahoSetList
{
    private const string SETS_DIR = __DIR__ . '/../../config/sets/';

    public const string ALL = self::SETS_DIR . 'all.php';

    public const string ROUTING = self::SETS_DIR . 'routing.php';

    public const string NAMING = self::SETS_DIR . 'naming.php';
}
