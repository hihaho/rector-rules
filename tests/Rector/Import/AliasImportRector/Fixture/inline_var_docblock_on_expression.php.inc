<?php

namespace App\Jobs;

use Illuminate\Database\Eloquent\Collection;

final class ProcessVideoJob
{
    public function handle(): void
    {
        /** @var Collection<int, \App\Models\Question> $questions */
        $questions = $this->loadQuestions();
    }

    private function loadQuestions(): mixed
    {
        return null;
    }
}

-----
<?php

namespace App\Jobs;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;

final class ProcessVideoJob
{
    public function handle(): void
    {
        /** @var EloquentCollection<int, \App\Models\Question> $questions */
        $questions = $this->loadQuestions();
    }

    private function loadQuestions(): mixed
    {
        return null;
    }
}
