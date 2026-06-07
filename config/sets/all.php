<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/eloquent.php');
    $rectorConfig->import(__DIR__ . '/imports.php');
    $rectorConfig->import(__DIR__ . '/migrations.php');
    $rectorConfig->import(__DIR__ . '/naming.php');
    $rectorConfig->import(__DIR__ . '/routing.php');
};
