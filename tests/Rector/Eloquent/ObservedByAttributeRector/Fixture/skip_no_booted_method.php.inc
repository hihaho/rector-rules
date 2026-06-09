<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Fixture;

use Illuminate\Database\Eloquent\Model;

// No booted() method — nothing to transform.
class Article extends Model
{
    public string $title = '';
}
