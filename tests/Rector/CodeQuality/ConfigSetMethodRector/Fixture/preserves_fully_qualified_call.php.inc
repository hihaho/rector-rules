<?php

namespace App;

\config(['queue.default' => 'sync']);
-----
<?php

namespace App;

\config()->set('queue.default', 'sync');
