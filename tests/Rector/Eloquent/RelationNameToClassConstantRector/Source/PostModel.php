<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source;

final class PostModel extends EloquentDouble
{
    public const string COMMENTS = 'comments';

    public const string AUTHOR = 'author';

    public function comments(): string
    {
        return $this->hasMany(CommentModel::class);
    }

    public function author(): string
    {
        return $this->belongsTo(AuthorModel::class);
    }
}
