<?php

namespace App\Demo;

use App\Feedback\MergeFeedback;

function build($answer): MergeFeedback
{
    return new MergeFeedback($answer, true);
}
-----
<?php

namespace App\Demo;

use App\Feedback\MergeFeedback;

function build($answer): MergeFeedback
{
    return new MergeFeedback($answer, answeredCorrectly: true);
}
