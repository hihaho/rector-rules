<?php

declare(strict_types=1);

use Hihaho\RectorRules\Rector\Migration\FlagColumnToBooleanRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(FlagColumnToBooleanRector::class, [
        FlagColumnToBooleanRector::CONFIRM_MYSQL_COMPATIBLE => true,
    ]);
};
