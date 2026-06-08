<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Migration\FlagColumnToBooleanRector;
use Rector\Config\RectorConfig;

// confirm_mysql_compatible is NOT set → the rule must be a no-op.
return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->rule(FlagColumnToBooleanRector::class);
};
