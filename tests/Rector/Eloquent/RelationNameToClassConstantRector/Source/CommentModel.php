<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Source;

final class CommentModel extends EloquentDouble
{
    public const string AUTHOR = 'author';

    public const string REPLIES = 'replies';

    public const string SUBJECT = 'subject';

    public function author(): string
    {
        return $this->belongsTo(AuthorModel::class);
    }

    public function replies(): string
    {
        return $this->hasMany(CommentModel::class);
    }

    public function subject(): string
    {
        return $this->morphTo('subject');
    }
}
