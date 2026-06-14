<?php

namespace App;

config(['queue.default' => 'sync', 'cache.default' => 'array']);
-----
<?php

namespace App;

config()->set('queue.default', 'sync');
config()->set('cache.default', 'array');
