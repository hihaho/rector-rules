<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow;

use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\ArticleCollection;
use Illuminate\Database\Eloquent\Model;

// Detector test subject: an ancestor that declares its own newCollection().
// It deliberately does NOT extend Model — the detector inspects traits/ancestors
// for the method regardless of Eloquent-ness, and extending Model would force a
// generic-variance-compatible override that is irrelevant to what is under test.
abstract class AncestorWithNewCollection
{
    /**
     * @param array<int, Model> $models
     */
    public function newCollection(array $models = []): ArticleCollection
    {
        return new ArticleCollection($models);
    }
}
