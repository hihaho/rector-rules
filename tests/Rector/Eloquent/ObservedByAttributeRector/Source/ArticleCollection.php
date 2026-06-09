<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\ObservedByAttributeRector\Source;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/** @extends Collection<int, Model> */
final class ArticleCollection extends Collection {}
