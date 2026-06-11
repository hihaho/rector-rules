<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source;

// A minimal Eloquent stand-in: just enough of the relationship factory surface
// for the rule to read a relation method body and hop to the related model. The
// bodies return the class-string so every parameter is used and a return type is
// declared, keeping the double Rector- and PHPStan-clean.
abstract class EloquentDouble
{
    /** @param class-string $related */
    protected function belongsTo(string $related): string
    {
        return $related;
    }

    /** @param class-string $related */
    protected function hasMany(string $related): string
    {
        return $related;
    }

    /** @param class-string $related */
    protected function hasOne(string $related): string
    {
        return $related;
    }

    // Polymorphic: no single related model to hop to. The rule deliberately does
    // not treat this as a factory it can follow.
    protected function morphTo(string $name): string
    {
        return $name;
    }
}
