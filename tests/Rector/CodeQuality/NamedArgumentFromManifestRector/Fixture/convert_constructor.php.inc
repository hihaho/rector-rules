<?php

function run($store, $platform, $start, $end, $q): void
{
    new MergeFeedback($q, true, false);
}
-----
<?php

function run($store, $platform, $start, $end, $q): void
{
    new MergeFeedback($q, answeredCorrectly: true, answeredPartlyCorrect: false);
}
