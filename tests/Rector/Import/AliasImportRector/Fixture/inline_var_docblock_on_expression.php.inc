<?php

namespace App\Jobs;

use Illuminate\Database\Eloquent\Collection;

final class ProcessArticleJob
{
    public function handle(): void
    {
        /** @var Collection<int, \App\Models\Article> $articles */
        $articles = $this->loadArticles();
    }

    private function loadArticles(): mixed
    {
        return null;
    }
}

-----
<?php

namespace App\Jobs;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;

final class ProcessArticleJob
{
    public function handle(): void
    {
        /** @var EloquentCollection<int, \App\Models\Article> $articles */
        $articles = $this->loadArticles();
    }

    private function loadArticles(): mixed
    {
        return null;
    }
}
