<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source;

final class AuthorModel extends EloquentDouble
{
    public const string AVATAR = 'avatar';

    public function avatar(): string
    {
        return $this->hasOne(AvatarModel::class);
    }
}
