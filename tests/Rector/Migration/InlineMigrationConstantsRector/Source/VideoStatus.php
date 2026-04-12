<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Migration\InlineMigrationConstantsRector\Source;

enum VideoStatus: string
{
    case Active = 'active';

    case Archived = 'archived';
}
