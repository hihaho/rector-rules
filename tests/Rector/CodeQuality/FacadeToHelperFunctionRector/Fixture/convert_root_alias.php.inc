<?php

function run(): mixed
{
    return \Cache::get('key') ?? Config::get('app.name');
}

?>
-----
<?php

function run(): mixed
{
    return cache()->get('key') ?? config()->get('app.name');
}

?>
