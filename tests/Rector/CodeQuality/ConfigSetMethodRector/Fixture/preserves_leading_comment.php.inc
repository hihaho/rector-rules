<?php

namespace App;

// keep this note
config(['queue.default' => 'sync']);
-----
<?php

namespace App;

// keep this note
config()->set('queue.default', 'sync');
