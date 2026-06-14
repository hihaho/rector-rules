<?php

function run($store, $platform, $start, $end, $q): void
{
    Foo::resolve($platform, true);
}
-----
<?php

function run($store, $platform, $start, $end, $q): void
{
    Foo::resolve($platform, strict: true);
}
