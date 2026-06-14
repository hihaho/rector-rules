<?php

namespace App;

config(['queue.default' => 'sync', 'cache.default' => 'array', 'mail.default' => 'log']);
-----
<?php

namespace App;

config()->set('queue.default', 'sync');
config()->set('cache.default', 'array');
config()->set('mail.default', 'log');
