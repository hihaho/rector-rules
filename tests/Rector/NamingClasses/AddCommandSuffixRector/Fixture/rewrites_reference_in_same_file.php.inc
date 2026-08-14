<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportArticles extends Command
{
}

class CommandRegistrar
{
    public function register(): array
    {
        return [ImportArticles::class];
    }
}

?>
-----
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportArticlesCommand extends Command
{
}

class CommandRegistrar
{
    public function register(): array
    {
        return [\App\Console\Commands\ImportArticlesCommand::class];
    }
}

?>
