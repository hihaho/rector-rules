<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Set;

final class HihahoSetList
{
    private const string SETS_DIR = __DIR__ . '/../../config/sets/';

    public const string ALL = self::SETS_DIR . 'all.php';

    public const string CODE_QUALITY = self::SETS_DIR . 'code-quality.php';

    public const string ELOQUENT = self::SETS_DIR . 'eloquent.php';

    public const string IMPORTS = self::SETS_DIR . 'imports.php';

    public const string MIGRATIONS = self::SETS_DIR . 'migrations.php';

    public const string NAMING = self::SETS_DIR . 'naming.php';

    public const string ROUTING = self::SETS_DIR . 'routing.php';

    public const string TESTING = self::SETS_DIR . 'testing.php';
}
