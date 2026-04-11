<?php declare(strict_types = 1);

return [
	'lastFullAnalysisTime' => 1775919025,
	'meta' => array (
  'cacheVersion' => 'v12-linesToIgnore',
  'phpstanVersion' => '2.1.46',
  'fnsr' => false,
  'metaExtensions' => 
  array (
  ),
  'phpVersion' => 80504,
  'projectConfig' => '{parameters: {featureToggles: {bleedingEdge: true, checkNonStringableDynamicAccess: true, checkParameterCastableToNumberFunctions: true, skipCheckGenericClasses: {_prevent_merging: true}, stricterFunctionMap: true, reportPreciseLineForUnusedFunctionParameter: true, checkPrintfParameterTypes: true, internalTag: true, newStaticInAbstractClassStaticMethod: true, checkExtensionsForComparisonOperators: true, checkGenericIterableClasses: true, reportTooWideBool: true, rawMessageInBaseline: true, reportNestedTooWideType: false, assignToByRefForeachExpr: true, curlSetOptArrayTypes: true}, disallowedFunctionCalls: [{function: \'apache_setenv()\', message: might overwrite existing variables}, {function: \'dl()\', message: \'removed from most SAPIs, might load untrusted code\'}, {function: \'eval()\', message: \'eval is evil, please write more code and do not use eval()\'}, {function: \'create_function()\', message: \'the function is about as evil as using eval()\', errorTip: \'create_function() has been deprecated as of PHP 7.2, and removed as of PHP 8.0\'}, {function: \'extract()\', message: \'do not use extract() and especially not on untrusted data\'}, {function: \'posix_getpwuid()\', message: might reveal system user information}, {function: \'posix_kill()\', message: do not send signals to processes from the script}, {function: \'posix_mkfifo()\', message: do not create named pipes in the script}, {function: \'posix_mknod()\', message: do not create special files in the script}, {function: \'highlight_file()\', message: might reveal source code or config files}, {function: \'show_source()\', message: \'might reveal source code or config files (alias of highlight_file())\'}, {function: \'pfsockopen()\', message: \'use fsockopen() to create non-persistent socket connections\'}, {function: \'print_r()\', message: use some logger instead, allowParamsAnywhere: {2: true}}, {function: \'proc_nice()\', message: changes the priority of the current process}, {function: \'putenv()\', message: might overwrite existing variables}, {function: \'socket_create_listen()\', message: do not accept new socket connections in the PHP script}, {function: \'socket_listen()\', message: do not accept new socket connections in the PHP script}, {function: \'var_dump()\', message: use some logger instead}, {function: \'var_export()\', message: use some logger instead, allowParamsAnywhere: {2: true}}, {function: \'phpinfo()\', message: might reveal session id or other tokens in cookies, errorTip: see https://www.michalspacek.com/stealing-session-ids-with-phpinfo-and-how-to-stop-it and use e.g. spaze/phpinfo instead}, {function: \'exec()\'}, {function: \'passthru()\'}, {function: \'proc_open()\'}, {function: \'shell_exec()\'}, {function: \'system()\'}, {function: \'pcntl_exec()\'}, {function: \'popen()\'}, {function: \'md5()\', message: \'use hash() with at least SHA-256 for secure hash, or password_hash() for passwords\'}, {function: \'sha1()\', message: \'use hash() with at least SHA-256 for secure hash, or password_hash() for passwords\'}, {function: \'md5_file()\', message: \'use hash_file() with at least SHA-256 for secure hash\'}, {function: \'sha1_file()\', message: \'use hash_file() with at least SHA-256 for secure hash\'}, {function: \'hash()\', message: \'use hash() with at least SHA-256 for secure hash, or password_hash() for passwords\', allowExceptCaseInsensitiveParams: {1: md5}}, {function: \'hash()\', message: \'use hash() with at least SHA-256 for secure hash, or password_hash() for passwords\', allowExceptCaseInsensitiveParams: {1: sha1}}, {function: \'hash_file()\', message: \'use hash_file() with at least SHA-256 for secure hash, or password_hash() for passwords\', allowExceptCaseInsensitiveParams: {1: md5}}, {function: \'hash_file()\', message: \'use hash_file() with at least SHA-256 for secure hash, or password_hash() for passwords\', allowExceptCaseInsensitiveParams: {1: sha1}}, {function: \'hash_init()\', message: \'use hash_init() with at least SHA-256 for secure hash, or password_hash() for passwords\', allowExceptCaseInsensitiveParams: {1: md5}}, {function: \'hash_init()\', message: \'use hash_init() with at least SHA-256 for secure hash, or password_hash() for passwords\', allowExceptCaseInsensitiveParams: {1: sha1}}, {function: \'rand()\', message: \'it is not a cryptographically secure generator, use random_int() instead\'}, {function: \'mt_rand()\', message: \'it is not a cryptographically secure generator, use random_int() instead\'}, {function: \'lcg_value()\', message: \'it is not a cryptographically secure generator, use random_int() instead\'}, {function: \'uniqid()\', message: \'it is not a cryptographically secure generator, use random_bytes() instead\'}, {function: \'mysql_query()\', message: \'use PDO::prepare() with variable binding/parametrized queries to prevent SQL Injection vulnerability\'}, {function: \'mysql_unbuffered_query()\', message: \'use PDO::prepare() with variable binding/parametrized queries to prevent SQL Injection vulnerability\'}, {function: \'mysqli_query()\', message: \'use PDO::prepare() with variable binding/parametrized queries to prevent SQL Injection vulnerability\'}, {function: \'mysqli_multi_query()\', message: \'use PDO::prepare() with variable binding/parametrized queries to prevent SQL Injection vulnerability\'}, {function: \'mysqli_real_query()\', message: \'use PDO::prepare() with variable binding/parametrized queries to prevent SQL Injection vulnerability\'}], disallowedMethodCalls: [{function: \'mysqli::query()\', message: \'use PDO::prepare() with variable binding/parametrized queries to prevent SQL Injection vulnerability\'}, {function: \'mysqli::multi_query()\', message: \'use PDO::prepare() with variable binding/parametrized queries to prevent SQL Injection vulnerability\'}, {function: \'mysqli::real_query()\', message: \'use PDO::prepare() with variable binding/parametrized queries to prevent SQL Injection vulnerability\'}], tmpDir: /Users/sandermuller/Documents/GitHub/rector-rules/.cache/phpstan, paths: [/Users/sandermuller/Documents/GitHub/rector-rules/src, /Users/sandermuller/Documents/GitHub/rector-rules/tests], level: max, type_coverage: {return: 100, param: 100, property: 100, constant: 0, declare: 100}, type_perfect: {null_over_false: true, no_mixed: false, narrow_param: false, narrow_return: true}, cognitive_complexity: {class: 80, function: 20}, strictRules: {allRules: true}, treatPhpDocTypesAsCertain: false}}',
  'analysedPaths' => 
  array (
    0 => '/Users/sandermuller/Documents/GitHub/rector-rules/src',
    1 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests',
  ),
  'scannedFiles' => 
  array (
  ),
  'composerLocks' => 
  array (
    '/Users/sandermuller/Documents/GitHub/rector-rules/composer.lock' => 'eb3d53ad7f5b754b9d23a996a45347da7d88fdbc98dd578142a49f70c8e9aa4d',
  ),
  'composerInstalled' => 
  array (
    '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/installed.php' => 
    array (
      'versions' => 
      array (
        'brianium/paratest' => 
        array (
          'pretty_version' => 'v7.8.5',
          'version' => '7.8.5.0',
          'reference' => '9b324c8fc319cf9728b581c7a90e1c8f6361c5e5',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../brianium/paratest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'brick/math' => 
        array (
          'pretty_version' => '0.14.8',
          'version' => '0.14.8.0',
          'reference' => '63422359a44b7f06cae63c3b429b59e8efcc0629',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../brick/math',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'carbonphp/carbon-doctrine-types' => 
        array (
          'pretty_version' => '3.2.0',
          'version' => '3.2.0.0',
          'reference' => '18ba5ddfec8976260ead6e866180bd5d2f71aa1d',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../carbonphp/carbon-doctrine-types',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'composer/semver' => 
        array (
          'pretty_version' => '3.4.4',
          'version' => '3.4.4.0',
          'reference' => '198166618906cb2de69b95d7d47e5fa8aa1b2b95',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/./semver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'cordoval/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'davedevelopment/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'dflydev/dot-access-data' => 
        array (
          'pretty_version' => 'v3.0.3',
          'version' => '3.0.3.0',
          'reference' => 'a23a2bf4f31d3518f3ecb38660c95715dfead60f',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../dflydev/dot-access-data',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'doctrine/deprecations' => 
        array (
          'pretty_version' => '1.1.6',
          'version' => '1.1.6.0',
          'reference' => 'd4fe3e6fd9bb9e72557a19674f44d8ac7db4c6ca',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../doctrine/deprecations',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'doctrine/inflector' => 
        array (
          'pretty_version' => '2.1.0',
          'version' => '2.1.0.0',
          'reference' => '6d6c96277ea252fc1304627204c3d5e6e15faa3b',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../doctrine/inflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'doctrine/lexer' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '31ad66abc0fc9e1a1f2d9bc6a42668d2fbbcd6dd',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../doctrine/lexer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'dragonmantank/cron-expression' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => 'd61a8a9604ec1f8c3d150d09db6ce98b32675013',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../dragonmantank/cron-expression',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'egulias/email-validator' => 
        array (
          'pretty_version' => '4.0.4',
          'version' => '4.0.4.0',
          'reference' => 'd42c8731f0624ad6bdc8d3e5e9a4524f68801cfa',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../egulias/email-validator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fakerphp/faker' => 
        array (
          'pretty_version' => 'v1.24.1',
          'version' => '1.24.1.0',
          'reference' => 'e0ee18eb1e6dc3cda3ce9fd97e5a0689a88a64b5',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../fakerphp/faker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fidry/cpu-core-counter' => 
        array (
          'pretty_version' => '1.3.0',
          'version' => '1.3.0.0',
          'reference' => 'db9508f7b1474469d9d3c53b86f817e344732678',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../fidry/cpu-core-counter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'filp/whoops' => 
        array (
          'pretty_version' => '2.18.4',
          'version' => '2.18.4.0',
          'reference' => 'd2102955e48b9fd9ab24280a7ad12ed552752c4d',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../filp/whoops',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fruitcake/php-cors' => 
        array (
          'pretty_version' => 'v1.4.0',
          'version' => '1.4.0.0',
          'reference' => '38aaa6c3fd4c157ffe2a4d10aa8b9b16ba8de379',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../fruitcake/php-cors',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'graham-campbell/result-type' => 
        array (
          'pretty_version' => 'v1.1.4',
          'version' => '1.1.4.0',
          'reference' => 'e01f4a821471308ba86aa202fed6698b6b695e3b',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../graham-campbell/result-type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'guzzlehttp/guzzle' => 
        array (
          'pretty_version' => '7.10.0',
          'version' => '7.10.0.0',
          'reference' => 'b51ac707cfa420b7bfd4e4d5e510ba8008e822b4',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../guzzlehttp/guzzle',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'guzzlehttp/promises' => 
        array (
          'pretty_version' => '2.3.0',
          'version' => '2.3.0.0',
          'reference' => '481557b130ef3790cf82b713667b43030dc9c957',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../guzzlehttp/promises',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'guzzlehttp/psr7' => 
        array (
          'pretty_version' => '2.9.0',
          'version' => '2.9.0.0',
          'reference' => '7d0ed42f28e42d61352a7a79de682e5e67fec884',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../guzzlehttp/psr7',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'guzzlehttp/uri-template' => 
        array (
          'pretty_version' => 'v1.0.5',
          'version' => '1.0.5.0',
          'reference' => '4f4bbd4e7172148801e76e3decc1e559bdee34e1',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../guzzlehttp/uri-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'hamcrest/hamcrest-php' => 
        array (
          'pretty_version' => 'v2.1.1',
          'version' => '2.1.1.0',
          'reference' => 'f8b1c0173b22fa6ec77a81fe63e5b01eba7e6487',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../hamcrest/hamcrest-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'illuminate/auth' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/broadcasting' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/bus' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/cache' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/collections' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/concurrency' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/conditionable' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/config' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/console' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/container' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/contracts' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/cookie' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/database' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/encryption' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/events' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/filesystem' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/hashing' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/http' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/json-schema' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/log' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/macroable' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/mail' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/notifications' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/pagination' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/pipeline' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/process' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/queue' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/redis' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/reflection' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/routing' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/session' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/support' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/testing' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/translation' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/validation' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'illuminate/view' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => 'v12.56.0',
          ),
        ),
        'jean85/pretty-package-versions' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '4d7aa5dab42e2a76d99559706022885de0e18e1a',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../jean85/pretty-package-versions',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'kodova/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'laravel/boost' => 
        array (
          'pretty_version' => 'v2.4.3',
          'version' => '2.4.3.0',
          'reference' => '841d52905728cfac9f93c778a1758e740ce9a367',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/boost',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/framework' => 
        array (
          'pretty_version' => 'v12.56.0',
          'version' => '12.56.0.0',
          'reference' => 'dac16d424b59debb2273910dde88eb7050a2a709',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/framework',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/mcp' => 
        array (
          'pretty_version' => 'v0.6.5',
          'version' => '0.6.5.0',
          'reference' => '583a6282bf0f074d754f7ff5cd1fff9d34244691',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/mcp',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/pail' => 
        array (
          'pretty_version' => 'v1.2.6',
          'version' => '1.2.6.0',
          'reference' => 'aa71a01c309e7f66bc2ec4fb1a59291b82eb4abf',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/pail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/pint' => 
        array (
          'pretty_version' => 'v1.29.0',
          'version' => '1.29.0.0',
          'reference' => 'bdec963f53172c5e36330f3a400604c69bf02d39',
          'type' => 'project',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/pint',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/prompts' => 
        array (
          'pretty_version' => 'v0.3.16',
          'version' => '0.3.16.0',
          'reference' => '11e7d5f93803a2190b00e145142cb00a33d17ad2',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/prompts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/roster' => 
        array (
          'pretty_version' => 'v0.5.1',
          'version' => '0.5.1.0',
          'reference' => '5089de7615f72f78e831590ff9d0435fed0102bb',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/roster',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/serializable-closure' => 
        array (
          'pretty_version' => 'v2.0.11',
          'version' => '2.0.11.0',
          'reference' => 'd1af40ac4a6ccc12bd062a7184f63c9995a63bdd',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/serializable-closure',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/tinker' => 
        array (
          'pretty_version' => 'v2.11.1',
          'version' => '2.11.1.0',
          'reference' => 'c9f80cc835649b5c1842898fb043f8cc098dd741',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../laravel/tinker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'league/commonmark' => 
        array (
          'pretty_version' => '2.8.2',
          'version' => '2.8.2.0',
          'reference' => '59fb075d2101740c337c7216e3f32b36c204218b',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../league/commonmark',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'league/config' => 
        array (
          'pretty_version' => 'v1.2.0',
          'version' => '1.2.0.0',
          'reference' => '754b3604fb2984c71f4af4a9cbe7b57f346ec1f3',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../league/config',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'league/flysystem' => 
        array (
          'pretty_version' => '3.33.0',
          'version' => '3.33.0.0',
          'reference' => '570b8871e0ce693764434b29154c54b434905350',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../league/flysystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'league/flysystem-local' => 
        array (
          'pretty_version' => '3.31.0',
          'version' => '3.31.0.0',
          'reference' => '2f669db18a4c20c755c2bb7d3a7b0b2340488079',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../league/flysystem-local',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'league/mime-type-detection' => 
        array (
          'pretty_version' => '1.16.0',
          'version' => '1.16.0.0',
          'reference' => '2d6702ff215bf922936ccc1ad31007edc76451b9',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../league/mime-type-detection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'league/uri' => 
        array (
          'pretty_version' => '7.8.1',
          'version' => '7.8.1.0',
          'reference' => '08cf38e3924d4f56238125547b5720496fac8fd4',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../league/uri',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'league/uri-interfaces' => 
        array (
          'pretty_version' => '7.8.1',
          'version' => '7.8.1.0',
          'reference' => '85d5c77c5d6d3af6c54db4a78246364908f3c928',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../league/uri-interfaces',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'mockery/mockery' => 
        array (
          'pretty_version' => '1.6.12',
          'version' => '1.6.12.0',
          'reference' => '1f4efdd7d3beafe9807b08156dfcb176d18f1699',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../mockery/mockery',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'monolog/monolog' => 
        array (
          'pretty_version' => '3.10.0',
          'version' => '3.10.0.0',
          'reference' => 'b321dd6749f0bf7189444158a3ce785cc16d69b0',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../monolog/monolog',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'mtdowling/cron-expression' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '^1.0',
          ),
        ),
        'myclabs/deep-copy' => 
        array (
          'pretty_version' => '1.13.4',
          'version' => '1.13.4.0',
          'reference' => '07d290f0c47959fd5eed98c95ee5602db07e0b6a',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../myclabs/deep-copy',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nesbot/carbon' => 
        array (
          'pretty_version' => '3.11.4',
          'version' => '3.11.4.0',
          'reference' => 'e890471a3494740f7d9326d72ce6a8c559ffee60',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../nesbot/carbon',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nette/schema' => 
        array (
          'pretty_version' => 'v1.3.5',
          'version' => '1.3.5.0',
          'reference' => 'f0ab1a3cda782dbc5da270d28545236aa80c4002',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../nette/schema',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nette/utils' => 
        array (
          'pretty_version' => 'v4.1.3',
          'version' => '4.1.3.0',
          'reference' => 'bb3ea637e3d131d72acc033cfc2746ee893349fe',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../nette/utils',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nikic/php-parser' => 
        array (
          'pretty_version' => 'v5.7.0',
          'version' => '5.7.0.0',
          'reference' => 'dca41cd15c2ac9d055ad70dbfd011130757d1f82',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../nikic/php-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/collision' => 
        array (
          'pretty_version' => 'v8.9.3',
          'version' => '8.9.3.0',
          'reference' => 'b0d8ab95b29c3189aeeb902d81215231df4c1b64',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../nunomaduro/collision',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/termwind' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => '712a31b768f5daea284c2169a7d227031001b9a8',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../nunomaduro/termwind',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/canvas' => 
        array (
          'pretty_version' => 'v10.2.0',
          'version' => '10.2.0.0',
          'reference' => '7ac2f2d58f05b8fc4ef1fe673cbdab7603023729',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../orchestra/canvas',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/canvas-core' => 
        array (
          'pretty_version' => 'v10.2.0',
          'version' => '10.2.0.0',
          'reference' => '11fdb579f4f2d4bd68a22bd206cabc32e7856e32',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../orchestra/canvas-core',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/sidekick' => 
        array (
          'pretty_version' => 'v1.2.20',
          'version' => '1.2.20.0',
          'reference' => '267a71b56cb2fe1a634d69fc99889c671b77ff43',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../orchestra/sidekick',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/testbench' => 
        array (
          'pretty_version' => 'v10.11.0',
          'version' => '10.11.0.0',
          'reference' => 'd73b4426dacddd2c1f5e671e0efd7665b16d2b84',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../orchestra/testbench',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/testbench-core' => 
        array (
          'pretty_version' => 'v10.13.0',
          'version' => '10.13.0.0',
          'reference' => '6221641095e8e6ba83f66e5cd8fef51be44db801',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../orchestra/testbench-core',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'orchestra/workbench' => 
        array (
          'pretty_version' => 'v10.1.0',
          'version' => '10.1.0.0',
          'reference' => 'bb5025efd9ea83610b87b3287956d90170b464e6',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../orchestra/workbench',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest' => 
        array (
          'pretty_version' => 'v3.8.6',
          'version' => '3.8.6.0',
          'reference' => '8871a6f5ef1de8e7c8dee2a270991449a7b6af73',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../pestphp/pest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin' => 
        array (
          'pretty_version' => 'v3.0.0',
          'version' => '3.0.0.0',
          'reference' => 'e79b26c65bc11c41093b10150c1341cc5cdbea83',
          'type' => 'composer-plugin',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../pestphp/pest-plugin',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin-arch' => 
        array (
          'pretty_version' => 'v3.1.1',
          'version' => '3.1.1.0',
          'reference' => 'db7bd9cb1612b223e16618d85475c6f63b9c8daa',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../pestphp/pest-plugin-arch',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'pestphp/pest-plugin-mutate' => 
        array (
          'pretty_version' => 'v3.0.5',
          'version' => '3.0.5.0',
          'reference' => 'e10dbdc98c9e2f3890095b4fe2144f63a5717e08',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../pestphp/pest-plugin-mutate',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/manifest' => 
        array (
          'pretty_version' => '2.0.4',
          'version' => '2.0.4.0',
          'reference' => '54750ef60c58e43759730615a392c31c80e23176',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phar-io/manifest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/version' => 
        array (
          'pretty_version' => '3.2.1',
          'version' => '3.2.1.0',
          'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phar-io/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/reflection-common' => 
        array (
          'pretty_version' => '2.2.0',
          'version' => '2.2.0.0',
          'reference' => '1d01c49d4ed62f25aa84a747ad35d5a16924662b',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpdocumentor/reflection-common',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/reflection-docblock' => 
        array (
          'pretty_version' => '6.0.3',
          'version' => '6.0.3.0',
          'reference' => '7bae67520aa9f5ecc506d646810bd40d9da54582',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpdocumentor/reflection-docblock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/type-resolver' => 
        array (
          'pretty_version' => '2.0.0',
          'version' => '2.0.0.0',
          'reference' => '327a05bbee54120d4786a0dc67aad30226ad4cf9',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpdocumentor/type-resolver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpoption/phpoption' => 
        array (
          'pretty_version' => '1.9.5',
          'version' => '1.9.5.0',
          'reference' => '75365b91986c2405cf5e1e012c5595cd487a98be',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpoption/phpoption',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpstan/extension-installer' => 
        array (
          'pretty_version' => '1.4.3',
          'version' => '1.4.3.0',
          'reference' => '85e90b3942d06b2326fba0403ec24fe912372936',
          'type' => 'composer-plugin',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpstan/extension-installer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpstan/phpdoc-parser' => 
        array (
          'pretty_version' => '2.3.2',
          'version' => '2.3.2.0',
          'reference' => 'a004701b11273a26cd7955a61d67a7f1e525a45a',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpstan/phpdoc-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpstan/phpstan' => 
        array (
          'pretty_version' => '2.1.46',
          'version' => '2.1.46.0',
          'reference' => 'a193923fc2d6325ef4e741cf3af8c3e8f54dbf25',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpstan/phpstan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpstan/phpstan-deprecation-rules' => 
        array (
          'pretty_version' => '2.0.4',
          'version' => '2.0.4.0',
          'reference' => '6b5571001a7f04fa0422254c30a0017ec2f2cacc',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpstan/phpstan-deprecation-rules',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpstan/phpstan-phpunit' => 
        array (
          'pretty_version' => '2.0.16',
          'version' => '2.0.16.0',
          'reference' => '6ab598e1bc106e6827fd346ae4a12b4a5d634c32',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpstan/phpstan-phpunit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpstan/phpstan-strict-rules' => 
        array (
          'pretty_version' => '2.0.10',
          'version' => '2.0.10.0',
          'reference' => '1aba28b697c1e3b6bbec8a1725f8b11b6d3e5a5f',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpstan/phpstan-strict-rules',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-code-coverage' => 
        array (
          'pretty_version' => '11.0.12',
          'version' => '11.0.12.0',
          'reference' => '2c1ed04922802c15e1de5d7447b4856de949cf56',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpunit/php-code-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-file-iterator' => 
        array (
          'pretty_version' => '5.1.1',
          'version' => '5.1.1.0',
          'reference' => '2f3a64888c814fc235386b7387dd5b5ed92ad903',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpunit/php-file-iterator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-invoker' => 
        array (
          'pretty_version' => '5.0.1',
          'version' => '5.0.1.0',
          'reference' => 'c1ca3814734c07492b3d4c5f794f4b0995333da2',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpunit/php-invoker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-text-template' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '3e0404dc6b300e6bf56415467ebcb3fe4f33e964',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpunit/php-text-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-timer' => 
        array (
          'pretty_version' => '7.0.1',
          'version' => '7.0.1.0',
          'reference' => '3b415def83fbcb41f991d9ebf16ae4ad8b7837b3',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpunit/php-timer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/phpunit' => 
        array (
          'pretty_version' => '11.5.50',
          'version' => '11.5.50.0',
          'reference' => 'fdfc727f0fcacfeb8fcb30c7e5da173125b58be3',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../phpunit/phpunit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/clock' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'e41a24703d4560fd0acb709162f73b8adfc3aa0d',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../psr/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/clock-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/container' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../psr/container',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/container-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '1.1|2.0',
          ),
        ),
        'psr/event-dispatcher' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../psr/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-client' => 
        array (
          'pretty_version' => '1.0.3',
          'version' => '1.0.3.0',
          'reference' => 'bb5906edc1c324c9a05aa0873d40117941e5fa90',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../psr/http-client',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/http-client-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-factory' => 
        array (
          'pretty_version' => '1.1.0',
          'version' => '1.1.0.0',
          'reference' => '2b4765fddfe3b508ac62f829e852b1501d3f6e8a',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../psr/http-factory',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/http-factory-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-message' => 
        array (
          'pretty_version' => '2.0',
          'version' => '2.0.0.0',
          'reference' => '402d35bcb92c70c026d1a6a9883f06b2ead23d71',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../psr/http-message',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/http-message-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/log' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => 'f16e1d5863e37f8d8c2a01719f5b34baa2b714d3',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../psr/log',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/log-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
            1 => '3.0.0',
          ),
        ),
        'psr/simple-cache' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '764e0b3939f5ca87cb904f570ef9be2d78a07865',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../psr/simple-cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/simple-cache-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
          ),
        ),
        'psy/psysh' => 
        array (
          'pretty_version' => 'v0.12.22',
          'version' => '0.12.22.0',
          'reference' => '3be75d5b9244936dd4ac62ade2bfb004d13acf0f',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../psy/psysh',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'ralouphie/getallheaders' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '120b605dfeb996808c31b6477290a714d356e822',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../ralouphie/getallheaders',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'ramsey/collection' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '344572933ad0181accbf4ba763e85a0306a8c5e2',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../ramsey/collection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'ramsey/uuid' => 
        array (
          'pretty_version' => '4.9.2',
          'version' => '4.9.2.0',
          'reference' => '8429c78ca35a09f27565311b98101e2826affde0',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../ramsey/uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'rector/rector' => 
        array (
          'pretty_version' => '2.4.1',
          'version' => '2.4.1.0',
          'reference' => '000b7050b9e4fe98db2192971e56eb0b302b3feb',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../rector/rector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'rector/type-perfect' => 
        array (
          'pretty_version' => '2.1.2',
          'version' => '2.1.2.0',
          'reference' => '0b25e6dc8596c04fb2d5bb686e5aebc91c85afd1',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../rector/type-perfect',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'rhumsaa/uuid' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '4.9.2',
          ),
        ),
        'roave/security-advisories' => 
        array (
          'pretty_version' => 'dev-latest',
          'version' => 'dev-latest',
          'reference' => 'd830a949e5c180e97c2245221daf8b589552cc2c',
          'type' => 'metapackage',
          'install_path' => NULL,
          'aliases' => 
          array (
            0 => '9999999-dev',
          ),
          'dev_requirement' => true,
        ),
        'sandermuller/package-boost' => 
        array (
          'pretty_version' => '0.2.0',
          'version' => '0.2.0.0',
          'reference' => 'eecf5569b4b56f564bdf2700b1fedd33d780ce79',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sandermuller/package-boost',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/cli-parser' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => '15c5dd40dc4f38794d383bb95465193f5e0ae180',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/cli-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '54391c61e4af8078e5b276ab082b6d3c54c9ad64',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/code-unit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit-reverse-lookup' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '183a9b2632194febd219bb9246eee421dad8d45e',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/code-unit-reverse-lookup',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/comparator' => 
        array (
          'pretty_version' => '6.3.3',
          'version' => '6.3.3.0',
          'reference' => '2c95e1e86cb8dd41beb8d502057d1081ccc8eca9',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/comparator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/complexity' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => 'ee41d384ab1906c68852636b6de493846e13e5a0',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/complexity',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/diff' => 
        array (
          'pretty_version' => '6.0.2',
          'version' => '6.0.2.0',
          'reference' => 'b4ccd857127db5d41a5b676f24b51371d76d8544',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/diff',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/environment' => 
        array (
          'pretty_version' => '7.2.1',
          'version' => '7.2.1.0',
          'reference' => 'a5c75038693ad2e8d4b6c15ba2403532647830c4',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/environment',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/exporter' => 
        array (
          'pretty_version' => '6.3.2',
          'version' => '6.3.2.0',
          'reference' => '70a298763b40b213ec087c51c739efcaa90bcd74',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/global-state' => 
        array (
          'pretty_version' => '7.0.2',
          'version' => '7.0.2.0',
          'reference' => '3be331570a721f9a4b5917f4209773de17f747d7',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/global-state',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/lines-of-code' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => 'd36ad0d782e5756913e42ad87cb2890f4ffe467a',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/lines-of-code',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-enumerator' => 
        array (
          'pretty_version' => '6.0.1',
          'version' => '6.0.1.0',
          'reference' => 'f5b498e631a74204185071eb41f33f38d64608aa',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/object-enumerator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-reflector' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '6e1a43b411b2ad34146dee7524cb13a068bb35f9',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/object-reflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/recursion-context' => 
        array (
          'pretty_version' => '6.0.3',
          'version' => '6.0.3.0',
          'reference' => 'f6458abbf32a6c8174f8f26261475dc133b3d9dc',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/recursion-context',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/type' => 
        array (
          'pretty_version' => '5.1.3',
          'version' => '5.1.3.0',
          'reference' => 'f77d2d4e78738c98d9a68d2596fe5e8fa380f449',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/version' => 
        array (
          'pretty_version' => '5.0.2',
          'version' => '5.0.2.0',
          'reference' => 'c687e3387b99f5b03b6caa64c74b63e2936ff874',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../sebastian/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'spatie/once' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'spaze/phpstan-disallowed-calls' => 
        array (
          'pretty_version' => 'v4.10.0',
          'version' => '4.10.0.0',
          'reference' => '501b212b15b8b4c5e2aaf44ee01bb024f85956d3',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../spaze/phpstan-disallowed-calls',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'staabm/side-effects-detector' => 
        array (
          'pretty_version' => '1.0.5',
          'version' => '1.0.5.0',
          'reference' => 'd8334211a140ce329c13726d4a715adbddd0a163',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../staabm/side-effects-detector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/clock' => 
        array (
          'pretty_version' => 'v8.0.8',
          'version' => '8.0.8.0',
          'reference' => 'b55a638b189a6faa875e0ccdb00908fb87af95b3',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/console' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '1e92e39c51f95b88e3d66fa2d9f06d1fb45dd707',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/console',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/css-selector' => 
        array (
          'pretty_version' => 'v8.0.8',
          'version' => '8.0.8.0',
          'reference' => '8db1c00226a94d8ab6aa89d9224eeee91e2ea2ed',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/css-selector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/deprecation-contracts' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => '63afe740e99a13ba87ec199bb07bbdee937a5b62',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/deprecation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/error-handler' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '8dd79d8af777ee6cba2fd4d98da6ffb839f3c0fa',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/error-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/event-dispatcher' => 
        array (
          'pretty_version' => 'v8.0.8',
          'version' => '8.0.8.0',
          'reference' => 'f662acc6ab22a3d6d716dcb44c381c6002940df6',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/event-dispatcher-contracts' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => '59eb412e93815df44f05f342958efa9f46b1e586',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/event-dispatcher-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '2.0|3.0',
          ),
        ),
        'symfony/finder' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => 'e0be088d22278583a82da281886e8c3592fbf149',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/finder',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/http-foundation' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '9381209597ec66c25be154cbf2289076e64d1eab',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/http-foundation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/http-kernel' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '017e76ad089bac281553389269e259e155935e1a',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/http-kernel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/mailer' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => 'f6ea532250b476bfc1b56699b388a1bdbf168f62',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/mailer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/mime' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '6df02f99998081032da3407a8d6c4e1dcb5d4379',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/mime',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-ctype' => 
        array (
          'pretty_version' => 'v1.34.0',
          'version' => '1.34.0.0',
          'reference' => '141046a8f9477948ff284fa65be2095baafb94f2',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/polyfill-ctype',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-intl-grapheme' => 
        array (
          'pretty_version' => 'v1.34.0',
          'version' => '1.34.0.0',
          'reference' => 'ad1b7b9092976d6c948b8a187cec9faaea9ec1df',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/polyfill-intl-grapheme',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-intl-idn' => 
        array (
          'pretty_version' => 'v1.34.0',
          'version' => '1.34.0.0',
          'reference' => '9614ac4d8061dc257ecc64cba1b140873dce8ad3',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/polyfill-intl-idn',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-intl-normalizer' => 
        array (
          'pretty_version' => 'v1.34.0',
          'version' => '1.34.0.0',
          'reference' => '3833d7255cc303546435cb650316bff708a1c75c',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/polyfill-intl-normalizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-mbstring' => 
        array (
          'pretty_version' => 'v1.34.0',
          'version' => '1.34.0.0',
          'reference' => '6a21eb99c6973357967f6ce3708cd55a6bec6315',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/polyfill-mbstring',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-php80' => 
        array (
          'pretty_version' => 'v1.34.0',
          'version' => '1.34.0.0',
          'reference' => 'dfb55726c3a76ea3b6459fcfda1ec2d80a682411',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/polyfill-php80',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-php83' => 
        array (
          'pretty_version' => 'v1.34.0',
          'version' => '1.34.0.0',
          'reference' => '3600c2cb22399e25bb226e4a135ce91eeb2a6149',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/polyfill-php83',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-php84' => 
        array (
          'pretty_version' => 'v1.34.0',
          'version' => '1.34.0.0',
          'reference' => '88486db2c389b290bf87ff1de7ebc1e13e42bb06',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/polyfill-php84',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-php85' => 
        array (
          'pretty_version' => 'v1.34.0',
          'version' => '1.34.0.0',
          'reference' => '2c408a6bb0313e6001a83628dc5506100474254e',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/polyfill-php85',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-uuid' => 
        array (
          'pretty_version' => 'v1.34.0',
          'version' => '1.34.0.0',
          'reference' => '26dfec253c4cf3e51b541b52ddf7e42cb0908e94',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/polyfill-uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/process' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '60f19cd3badc8de688421e21e4305eba50f8089a',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/routing' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '9608de9873ec86e754fb6c0a0fa7e5f1a960eb6b',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/routing',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/service-contracts' => 
        array (
          'pretty_version' => 'v3.6.1',
          'version' => '3.6.1.0',
          'reference' => '45112560a3ba2d715666a509a0bc9521d10b6c43',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/service-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/string' => 
        array (
          'pretty_version' => 'v8.0.8',
          'version' => '8.0.8.0',
          'reference' => 'ae9488f874d7603f9d2dfbf120203882b645d963',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/string',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/translation' => 
        array (
          'pretty_version' => 'v8.0.8',
          'version' => '8.0.8.0',
          'reference' => '27c03ae3940de24ba2f71cfdbac824f2aa1fdf2f',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/translation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/translation-contracts' => 
        array (
          'pretty_version' => 'v3.6.1',
          'version' => '3.6.1.0',
          'reference' => '65a8bc82080447fae78373aa10f8d13b38338977',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/translation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/translation-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '2.3|3.0',
          ),
        ),
        'symfony/uid' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '6883ebdf7bf6a12b37519dbc0df62b0222401b56',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/uid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/var-dumper' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '9510c3966f749a1d1ff0059e1eabef6cc621e7fd',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/var-dumper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/yaml' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => 'c58fdf7b3d6c2995368264c49e4e8b05bcff2883',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symfony/yaml',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symplify/phpstan-extensions' => 
        array (
          'pretty_version' => '12.0.2',
          'version' => '12.0.2.0',
          'reference' => '5ce15cb084eb3bc7f92b77020c59ff3d318746d5',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symplify/phpstan-extensions',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symplify/rule-doc-generator-contracts' => 
        array (
          'pretty_version' => '11.2.0',
          'version' => '11.2.0.0',
          'reference' => '479cfcfd46047f80624aba931d9789e50475b5c6',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../symplify/rule-doc-generator-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ta-tikoma/phpunit-architecture-test' => 
        array (
          'pretty_version' => '0.8.7',
          'version' => '0.8.7.0',
          'reference' => '1248f3f506ca9641d4f68cebcd538fa489754db8',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../ta-tikoma/phpunit-architecture-test',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'theseer/tokenizer' => 
        array (
          'pretty_version' => '1.3.1',
          'version' => '1.3.1.0',
          'reference' => 'b7489ce515e168639d17feec34b8847c326b0b3c',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../theseer/tokenizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tijsverkoyen/css-to-inline-styles' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => 'f0292ccf0ec75843d65027214426b6b163b48b41',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../tijsverkoyen/css-to-inline-styles',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tomasvotruba/cognitive-complexity' => 
        array (
          'pretty_version' => '1.1.0',
          'version' => '1.1.0.0',
          'reference' => '3ca30d23ec743d1d0d67d2d6f2824538a98941f8',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../tomasvotruba/cognitive-complexity',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tomasvotruba/type-coverage' => 
        array (
          'pretty_version' => '2.1.0',
          'version' => '2.1.0.0',
          'reference' => '468354b3964120806a69890cbeb3fcf005876391',
          'type' => 'phpstan-extension',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../tomasvotruba/type-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'vlucas/phpdotenv' => 
        array (
          'pretty_version' => 'v5.6.3',
          'version' => '5.6.3.0',
          'reference' => '955e7815d677a3eaa7075231212f2110983adecc',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../vlucas/phpdotenv',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'voku/portable-ascii' => 
        array (
          'pretty_version' => '2.0.3',
          'version' => '2.0.3.0',
          'reference' => 'b1d923f88091c6bf09699efcd7c8a1b1bfd7351d',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../voku/portable-ascii',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'webmozart/assert' => 
        array (
          'pretty_version' => '2.3.0',
          'version' => '2.3.0.0',
          'reference' => 'eb0d790f735ba6cff25c683a85a1da0eadeff9e4',
          'type' => 'library',
          'install_path' => '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/composer/../webmozart/assert',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
      ),
    ),
  ),
  'executedFilesHashes' => 
  array (
    '/Users/sandermuller/Documents/GitHub/rector-rules/vendor/nesbot/carbon/lazy/Carbon/UnprotectedDatePeriod.php' => 'a5aa8ee50d1b999eddced70f94f8d759d7fe0575e7d583d94ea119483a6fc6ae',
    'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/Attribute85.php' => 'cb8b31e82c61ce197871c9e8a6f122256751f2ab606dd2be90846d4fa5f8933e',
    'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionAttribute.php' => 'c0068e383717870a304781d462f7e2afe1c6f24e9133851852a2aca96b4fa26f',
    'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionIntersectionType.php' => '65fe0a8bc6fe285d8ddc8798ab5b9299920af70db5ad74596bc08df823e7c5d9',
    'phar:///Users/sandermuller/Documents/GitHub/rector-rules/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionUnionType.php' => '1e2fe940e4ba4e00d9ee6adb2af3ee1bf333e6f8afe61c61deb038886d293427',
  ),
  'phpExtensions' => 
  array (
    0 => 'Core',
    1 => 'FFI',
    2 => 'PDO',
    3 => 'Phar',
    4 => 'Reflection',
    5 => 'SPL',
    6 => 'SimpleXML',
    7 => 'Zend OPcache',
    8 => 'bcmath',
    9 => 'bz2',
    10 => 'calendar',
    11 => 'ctype',
    12 => 'curl',
    13 => 'date',
    14 => 'dba',
    15 => 'dom',
    16 => 'exif',
    17 => 'fileinfo',
    18 => 'filter',
    19 => 'ftp',
    20 => 'gd',
    21 => 'gettext',
    22 => 'gmp',
    23 => 'hash',
    24 => 'herd',
    25 => 'iconv',
    26 => 'imagick',
    27 => 'imap',
    28 => 'intl',
    29 => 'json',
    30 => 'ldap',
    31 => 'lexbor',
    32 => 'libxml',
    33 => 'mbstring',
    34 => 'mongodb',
    35 => 'mysqli',
    36 => 'mysqlnd',
    37 => 'openssl',
    38 => 'pcntl',
    39 => 'pcov',
    40 => 'pcre',
    41 => 'pdo_mysql',
    42 => 'pdo_pgsql',
    43 => 'pdo_sqlite',
    44 => 'pdo_sqlsrv',
    45 => 'pgsql',
    46 => 'posix',
    47 => 'random',
    48 => 'readline',
    49 => 'redis',
    50 => 'session',
    51 => 'shmop',
    52 => 'soap',
    53 => 'sockets',
    54 => 'sodium',
    55 => 'sqlite3',
    56 => 'sqlsrv',
    57 => 'standard',
    58 => 'sysvmsg',
    59 => 'sysvsem',
    60 => 'sysvshm',
    61 => 'tokenizer',
    62 => 'uri',
    63 => 'xml',
    64 => 'xmlreader',
    65 => 'xmlwriter',
    66 => 'xsl',
    67 => 'zip',
    68 => 'zlib',
    69 => 'zstd',
  ),
  'stubFiles' => 
  array (
  ),
  'level' => 'max',
),
	'projectExtensionFiles' => array (
),
	'errorsCallback' => static function (): array { return array (
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Import/AliasImportRector.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $configuration (array<string, string>) of method Hihaho\\RectorRules\\Rector\\Import\\AliasImportRector::configure() should be contravariant with parameter $configuration (array<mixed>) of method Rector\\Contract\\Rector\\ConfigurableRectorInterface::configure()',
       'file' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Import/AliasImportRector.php',
       'line' => 65,
       'canBeIgnored' => true,
       'filePath' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Import/AliasImportRector.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 65,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childParameterType',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/InlineMigrationConstantsRector.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $className of method PHPStan\\Reflection\\ReflectionProvider::hasClass() expects string, string|null given.',
       'file' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/InlineMigrationConstantsRector.php',
       'line' => 75,
       'canBeIgnored' => true,
       'filePath' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/InlineMigrationConstantsRector.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 75,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AbstractAddSuffixRector.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to deprecated method isSubclassOf() of class PHPStan\\Reflection\\ClassReflection:
Use isSubclassOfClass instead.',
       'file' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AbstractAddSuffixRector.php',
       'line' => 78,
       'canBeIgnored' => true,
       'filePath' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AbstractAddSuffixRector.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 78,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.deprecated',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddResourceSuffixRector.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to deprecated method isSubclassOf() of class PHPStan\\Reflection\\ClassReflection:
Use isSubclassOfClass instead.',
       'file' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddResourceSuffixRector.php',
       'line' => 142,
       'canBeIgnored' => true,
       'filePath' => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddResourceSuffixRector.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 142,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.deprecated',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
); },
	'locallyIgnoredErrorsCallback' => static function (): array { return array (
); },
	'linesToIgnore' => array (
),
	'unmatchedLineIgnores' => array (
),
	'collectedDataCallback' => static function (): array { return array (
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Import/AliasImportRector.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Import\\AliasImportRector',
        1 => 'getNodeTypes',
        2 => 'Hihaho\\RectorRules\\Rector\\Import\\AliasImportRector',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      4 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 3,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      4 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      5 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      6 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      7 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      8 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/Concerns/ChecksMigrationContext.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
        1 => 7,
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/InlineMigrationConstantsRector.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'Hihaho\\RectorRules\\Rector\\Migration\\InlineMigrationConstantsRector',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Migration\\InlineMigrationConstantsRector',
        1 => 'getNodeTypes',
        2 => 'Hihaho\\RectorRules\\Rector\\Migration\\InlineMigrationConstantsRector',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/RemoveAfterColumnPositioningRector.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
        1 => 'getNodeTypes',
        2 => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AbstractAddSuffixRector.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AbstractAddSuffixRector',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AbstractAddSuffixRector',
        1 => 'getNodeTypes',
        2 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AbstractAddSuffixRector',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      4 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      5 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddCommandSuffixRector.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddCommandSuffixRector',
        1 => 'baseClass',
        2 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddCommandSuffixRector',
      ),
      1 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddCommandSuffixRector',
        1 => 'suffix',
        2 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddCommandSuffixRector',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddMailSuffixRector.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddMailSuffixRector',
        1 => 'baseClass',
        2 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddMailSuffixRector',
      ),
      1 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddMailSuffixRector',
        1 => 'suffix',
        2 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddMailSuffixRector',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddNotificationSuffixRector.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddNotificationSuffixRector',
        1 => 'baseClass',
        2 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddNotificationSuffixRector',
      ),
      1 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddNotificationSuffixRector',
        1 => 'suffix',
        2 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddNotificationSuffixRector',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddResourceSuffixRector.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddResourceSuffixRector',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddResourceSuffixRector',
        1 => 'getNodeTypes',
        2 => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddResourceSuffixRector',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 2,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 2,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 2,
        1 => 
        array (
        ),
      ),
      4 => 
      array (
        0 => 2,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      4 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      5 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/Concerns/ChecksRouteContext.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
        1 => 12,
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/NormalizeRoutePathRector.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
        1 => 'getNodeTypes',
        2 => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 2,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 2,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      4 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      5 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/RouteGroupArrayToMethodsRector.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
        1 => 'getNodeTypes',
        2 => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 2,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 2,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      4 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      5 => 
      array (
        0 => 3,
        1 => 
        array (
        ),
      ),
      6 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      7 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      4 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      5 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      6 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      7 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      8 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      9 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      10 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Set/HihahoSetList.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 6,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Import/AliasImportRector/AliasImportRectorTest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Tests\\Rector\\Import\\AliasImportRector\\AliasImportRectorTest',
        1 => 'provideConfigFilePath',
        2 => 'Hihaho\\RectorRules\\Tests\\Rector\\Import\\AliasImportRector\\AliasImportRectorTest',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Import/AliasImportRector/config/configured_rule.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/InlineMigrationConstantsRector/InlineMigrationConstantsRectorTest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\InlineMigrationConstantsRector\\InlineMigrationConstantsRectorTest',
        1 => 'provideConfigFilePath',
        2 => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\InlineMigrationConstantsRector\\InlineMigrationConstantsRectorTest',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/InlineMigrationConstantsRector/Source/VideoModel.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 3,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/InlineMigrationConstantsRector/config/configured_rule.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/RemoveAfterColumnPositioningRector/RemoveAfterColumnPositioningRectorTest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\RemoveAfterColumnPositioningRector\\RemoveAfterColumnPositioningRectorTest',
        1 => 'provideConfigFilePath',
        2 => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\RemoveAfterColumnPositioningRector\\RemoveAfterColumnPositioningRectorTest',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/RemoveAfterColumnPositioningRector/config/configured_rule.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddCommandSuffixRector/AddCommandSuffixRectorTest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddCommandSuffixRector\\AddCommandSuffixRectorTest',
        1 => 'provideConfigFilePath',
        2 => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddCommandSuffixRector\\AddCommandSuffixRectorTest',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddCommandSuffixRector/config/configured_rule.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddMailSuffixRector/AddMailSuffixRectorTest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddMailSuffixRector\\AddMailSuffixRectorTest',
        1 => 'provideConfigFilePath',
        2 => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddMailSuffixRector\\AddMailSuffixRectorTest',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddMailSuffixRector/config/configured_rule.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddNotificationSuffixRector/AddNotificationSuffixRectorTest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddNotificationSuffixRector\\AddNotificationSuffixRectorTest',
        1 => 'provideConfigFilePath',
        2 => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddNotificationSuffixRector\\AddNotificationSuffixRectorTest',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddNotificationSuffixRector/config/configured_rule.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddResourceSuffixRector/AddResourceSuffixRectorTest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddResourceSuffixRector\\AddResourceSuffixRectorTest',
        1 => 'provideConfigFilePath',
        2 => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddResourceSuffixRector\\AddResourceSuffixRectorTest',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddResourceSuffixRector/config/configured_rule.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/NormalizeRoutePathRector/NormalizeRoutePathRectorTest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Tests\\Rector\\Routing\\NormalizeRoutePathRector\\NormalizeRoutePathRectorTest',
        1 => 'provideConfigFilePath',
        2 => 'Hihaho\\RectorRules\\Tests\\Rector\\Routing\\NormalizeRoutePathRector\\NormalizeRoutePathRectorTest',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/NormalizeRoutePathRector/config/configured_rule.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/RouteGroupArrayToMethodsRector/RouteGroupArrayToMethodsRectorTest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Hihaho\\RectorRules\\Tests\\Rector\\Routing\\RouteGroupArrayToMethodsRector\\RouteGroupArrayToMethodsRectorTest',
        1 => 'provideConfigFilePath',
        2 => 'Hihaho\\RectorRules\\Tests\\Rector\\Routing\\RouteGroupArrayToMethodsRector\\RouteGroupArrayToMethodsRectorTest',
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ConstantTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\PropertyTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 0,
        1 => 
        array (
        ),
      ),
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ReturnTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/RouteGroupArrayToMethodsRector/config/configured_rule.php' => 
  array (
    'TomasVotruba\\TypeCoverage\\Collectors\\DeclareCollector' => 
    array (
      0 => true,
    ),
    'TomasVotruba\\TypeCoverage\\Collectors\\ParamTypeDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 1,
        1 => 
        array (
        ),
      ),
    ),
  ),
); },
	'dependencies' => array (
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Import/AliasImportRector.php' => 
  array (
    'fileHash' => 'bb9ddd4a089892c520c89c5c7502af30e78e33e71a994a5db30b04d0483d17ef',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Import/AliasImportRector/config/configured_rule.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/Concerns/ChecksMigrationContext.php' => 
  array (
    'fileHash' => '51476026f4d75685da8a751ae7a56925d0efd04c22403bf5ca35b7600c85ae70',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/InlineMigrationConstantsRector.php',
      1 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/RemoveAfterColumnPositioningRector.php',
      2 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/InlineMigrationConstantsRector/config/configured_rule.php',
      3 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/RemoveAfterColumnPositioningRector/config/configured_rule.php',
    ),
    'usedTraitDependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/InlineMigrationConstantsRector.php',
      1 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/RemoveAfterColumnPositioningRector.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/InlineMigrationConstantsRector.php' => 
  array (
    'fileHash' => 'd699b06f26dc884dd8c27579c39369d75fadb8d74074305f01adaeecf9ec912c',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/InlineMigrationConstantsRector/config/configured_rule.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/RemoveAfterColumnPositioningRector.php' => 
  array (
    'fileHash' => 'a7a0a4aaca1d27698bf955d824e7abfcd396037e43ccb14f466c52fa3a299040',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/RemoveAfterColumnPositioningRector/config/configured_rule.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AbstractAddSuffixRector.php' => 
  array (
    'fileHash' => 'a7a64a9de37cb89cf02c2cbad5170041479cdbdd9df361372c2a632c5a7137a3',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddCommandSuffixRector.php',
      1 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddMailSuffixRector.php',
      2 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddNotificationSuffixRector.php',
      3 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddCommandSuffixRector/config/configured_rule.php',
      4 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddMailSuffixRector/config/configured_rule.php',
      5 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddNotificationSuffixRector/config/configured_rule.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddCommandSuffixRector.php' => 
  array (
    'fileHash' => 'b510cfe2d80fd0dc6da4a5f2136dfab35c610a5db4f747ff492506f3bd095c13',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddCommandSuffixRector/config/configured_rule.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddMailSuffixRector.php' => 
  array (
    'fileHash' => 'e6ad47ca92b20a3ae7bb8a1e1b79a8f56fc401afcdefdc693abcaf4495230d32',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddMailSuffixRector/config/configured_rule.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddNotificationSuffixRector.php' => 
  array (
    'fileHash' => '81c4c51609bb590daacc15595a36eff3f9058052214d447e12c5d69180fe3fd7',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddNotificationSuffixRector/config/configured_rule.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddResourceSuffixRector.php' => 
  array (
    'fileHash' => '7da376576364eb9a847fa2b3e9d2e86f169621ef38fbc53dbbda4034b3274cc3',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddResourceSuffixRector/config/configured_rule.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/Concerns/ChecksRouteContext.php' => 
  array (
    'fileHash' => '01986941a90caa1d2be9ebce7297703d3797eecc1e8960617b3e687e04ec3f07',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/NormalizeRoutePathRector.php',
      1 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/RouteGroupArrayToMethodsRector.php',
      2 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/NormalizeRoutePathRector/config/configured_rule.php',
      3 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/RouteGroupArrayToMethodsRector/config/configured_rule.php',
    ),
    'usedTraitDependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/NormalizeRoutePathRector.php',
      1 => '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/RouteGroupArrayToMethodsRector.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/NormalizeRoutePathRector.php' => 
  array (
    'fileHash' => 'cd4cebe7dc43243c0745664cbcd5a41cd392b38d7f5607e45c00c8b039a81d24',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/NormalizeRoutePathRector/config/configured_rule.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/RouteGroupArrayToMethodsRector.php' => 
  array (
    'fileHash' => '57d22c613368c9df767e64f00e03b0b7f245074ab573d434f23ea9754ffbd95c',
    'dependentFiles' => 
    array (
      0 => '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/RouteGroupArrayToMethodsRector/config/configured_rule.php',
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Set/HihahoSetList.php' => 
  array (
    'fileHash' => 'e53cf01d1798e2c0fb487764f599aa224d2be9101a766926bbed003c050cd83a',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Import/AliasImportRector/AliasImportRectorTest.php' => 
  array (
    'fileHash' => '23f2db649cea942558ef764cddcb07125cc6d9a3e77e44cbb6bae1368b49c102',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Import/AliasImportRector/config/configured_rule.php' => 
  array (
    'fileHash' => 'b4b7162c2f7ebcb648a3c60944a470ce947aac1e3382c86c0b46e0104f369300',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/InlineMigrationConstantsRector/InlineMigrationConstantsRectorTest.php' => 
  array (
    'fileHash' => '295bc3bc29b92ec3590f07e5eb0742a0414dca7fff5a45b5b2deb322755c1f04',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/InlineMigrationConstantsRector/Source/VideoModel.php' => 
  array (
    'fileHash' => 'd269f680eb61d8dbaca9b845151176119472c5cfba4946773aaabe7ce633293d',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/InlineMigrationConstantsRector/config/configured_rule.php' => 
  array (
    'fileHash' => '002f2f951a389aeaa682c56e8d5174ac4542641afeb814155eb1412e76426203',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/RemoveAfterColumnPositioningRector/RemoveAfterColumnPositioningRectorTest.php' => 
  array (
    'fileHash' => '45da1f5fb496c5aec556a887146669df5054eb60339375415bb436f74ef8305f',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/RemoveAfterColumnPositioningRector/config/configured_rule.php' => 
  array (
    'fileHash' => '0452a29eddeb5c8571f82db587ca7d688d0080e5cf40164a624e659673560d0c',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddCommandSuffixRector/AddCommandSuffixRectorTest.php' => 
  array (
    'fileHash' => '5d9a7c3c2af0193c23119cb74e0cda3c63b90963d8f238673a2cc6e30d85a48f',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddCommandSuffixRector/config/configured_rule.php' => 
  array (
    'fileHash' => '1641656f6740701b9c3cdf10f389e97210c1fc7c8f65f961f1747f99c06973fa',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddMailSuffixRector/AddMailSuffixRectorTest.php' => 
  array (
    'fileHash' => '2cfff6e73d2951c687ea55412be34bcfa54d96f2477c8f0180d378a0b9ac4ab6',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddMailSuffixRector/config/configured_rule.php' => 
  array (
    'fileHash' => 'f5815d480233a553c63ef3cec8936175854c8ea211e2c5f3d6193bc6394f8764',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddNotificationSuffixRector/AddNotificationSuffixRectorTest.php' => 
  array (
    'fileHash' => 'cb2b39c79285c8c039b9729a8eede4d2843a2de9238b1a32663aad3c62b6456c',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddNotificationSuffixRector/config/configured_rule.php' => 
  array (
    'fileHash' => 'b7d8a6c30bd8a78892c1972ebdec935692dce4aef306e63dd7d2a8985b4294c3',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddResourceSuffixRector/AddResourceSuffixRectorTest.php' => 
  array (
    'fileHash' => 'ebb5af6d39575b0d7a2d8c06ef5a92e2f100144c99603fe14c04fc894f2ada9c',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddResourceSuffixRector/config/configured_rule.php' => 
  array (
    'fileHash' => '6ec792bc40bf27b80c75a5603ad9c0e3e621328e0f017c08b54c5711d77a3dc1',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/NormalizeRoutePathRector/NormalizeRoutePathRectorTest.php' => 
  array (
    'fileHash' => 'c90529d8b3fa21cb051f8e38231b4aadda3cec54d1a7026869190ce1ec26a8ca',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/NormalizeRoutePathRector/config/configured_rule.php' => 
  array (
    'fileHash' => '737dcf415e4e314f9f1e19b2b51395e6d4569220207fda3b5e5e2a8ce7377691',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/RouteGroupArrayToMethodsRector/RouteGroupArrayToMethodsRectorTest.php' => 
  array (
    'fileHash' => 'e206744fc6c6e43723771cae6fc94f683e44a2dad420db01e1a7922a6ee0aee9',
    'dependentFiles' => 
    array (
    ),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/RouteGroupArrayToMethodsRector/config/configured_rule.php' => 
  array (
    'fileHash' => 'b9d9988fd2789bb57af20746a54b58abea0e56757730de32c01bbeb12f36fc89',
    'dependentFiles' => 
    array (
    ),
  ),
),
	'exportedNodesCallback' => static function (): array { return array (
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Import/AliasImportRector.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\Import\\AliasImportRector',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @see AliasImportRectorTest
 */',
         'namespace' => 'Hihaho\\RectorRules\\Rector\\Import',
         'uses' => 
        array (
          'aliasimportrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Import\\AliasImportRector\\AliasImportRectorTest',
          'node' => 'PhpParser\\Node',
          'identifier' => 'PhpParser\\Node\\Identifier',
          'name' => 'PhpParser\\Node\\Name',
          'fullyqualified' => 'PhpParser\\Node\\Name\\FullyQualified',
          'use_' => 'PhpParser\\Node\\Stmt\\Use_',
          'configurablerectorinterface' => 'Rector\\Contract\\Rector\\ConfigurableRectorInterface',
          'abstractrector' => 'Rector\\Rector\\AbstractRector',
          'configuredcodesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\ConfiguredCodeSample',
          'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
          'assert' => 'Webmozart\\Assert\\Assert',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Rector\\AbstractRector',
       'implements' => 
      array (
        0 => 'Rector\\Contract\\Rector\\ConfigurableRectorInterface',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRuleDefinition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'configure',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @param array<string, string> $configuration */',
             'namespace' => 'Hihaho\\RectorRules\\Rector\\Import',
             'uses' => 
            array (
              'aliasimportrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Import\\AliasImportRector\\AliasImportRectorTest',
              'node' => 'PhpParser\\Node',
              'identifier' => 'PhpParser\\Node\\Identifier',
              'name' => 'PhpParser\\Node\\Name',
              'fullyqualified' => 'PhpParser\\Node\\Name\\FullyQualified',
              'use_' => 'PhpParser\\Node\\Stmt\\Use_',
              'configurablerectorinterface' => 'Rector\\Contract\\Rector\\ConfigurableRectorInterface',
              'abstractrector' => 'Rector\\Rector\\AbstractRector',
              'configuredcodesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\ConfiguredCodeSample',
              'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
              'assert' => 'Webmozart\\Assert\\Assert',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'configuration',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNodeTypes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<class-string<Node>> */',
             'namespace' => 'Hihaho\\RectorRules\\Rector\\Import',
             'uses' => 
            array (
              'aliasimportrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Import\\AliasImportRector\\AliasImportRectorTest',
              'node' => 'PhpParser\\Node',
              'identifier' => 'PhpParser\\Node\\Identifier',
              'name' => 'PhpParser\\Node\\Name',
              'fullyqualified' => 'PhpParser\\Node\\Name\\FullyQualified',
              'use_' => 'PhpParser\\Node\\Stmt\\Use_',
              'configurablerectorinterface' => 'Rector\\Contract\\Rector\\ConfigurableRectorInterface',
              'abstractrector' => 'Rector\\Rector\\AbstractRector',
              'configuredcodesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\ConfiguredCodeSample',
              'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
              'assert' => 'Webmozart\\Assert\\Assert',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'refactor',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?PhpParser\\Node',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'node',
               'type' => 'PhpParser\\Node',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/Concerns/ChecksMigrationContext.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedTraitNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
       'phpDoc' => NULL,
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/InlineMigrationConstantsRector.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\Migration\\InlineMigrationConstantsRector',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @see InlineMigrationConstantsRectorTest
 */',
         'namespace' => 'Hihaho\\RectorRules\\Rector\\Migration',
         'uses' => 
        array (
          'checksmigrationcontext' => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
          'inlinemigrationconstantsrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\InlineMigrationConstantsRector\\InlineMigrationConstantsRectorTest',
          'node' => 'PhpParser\\Node',
          'classconstfetch' => 'PhpParser\\Node\\Expr\\ClassConstFetch',
          'identifier' => 'PhpParser\\Node\\Identifier',
          'string_' => 'PhpParser\\Node\\Scalar\\String_',
          'reflectionprovider' => 'PHPStan\\Reflection\\ReflectionProvider',
          'abstractrector' => 'Rector\\Rector\\AbstractRector',
          'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
          'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Rector\\AbstractRector',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'reflectionProvider',
               'type' => 'PHPStan\\Reflection\\ReflectionProvider',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRuleDefinition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNodeTypes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<class-string<Node>> */',
             'namespace' => 'Hihaho\\RectorRules\\Rector\\Migration',
             'uses' => 
            array (
              'checksmigrationcontext' => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
              'inlinemigrationconstantsrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\InlineMigrationConstantsRector\\InlineMigrationConstantsRectorTest',
              'node' => 'PhpParser\\Node',
              'classconstfetch' => 'PhpParser\\Node\\Expr\\ClassConstFetch',
              'identifier' => 'PhpParser\\Node\\Identifier',
              'string_' => 'PhpParser\\Node\\Scalar\\String_',
              'reflectionprovider' => 'PHPStan\\Reflection\\ReflectionProvider',
              'abstractrector' => 'Rector\\Rector\\AbstractRector',
              'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
              'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'refactor',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?PhpParser\\Node',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'node',
               'type' => 'PhpParser\\Node',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Migration/RemoveAfterColumnPositioningRector.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\Migration\\RemoveAfterColumnPositioningRector',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @see RemoveAfterColumnPositioningRectorTest
 */',
         'namespace' => 'Hihaho\\RectorRules\\Rector\\Migration',
         'uses' => 
        array (
          'checksmigrationcontext' => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
          'removeaftercolumnpositioningrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\RemoveAfterColumnPositioningRector\\RemoveAfterColumnPositioningRectorTest',
          'node' => 'PhpParser\\Node',
          'methodcall' => 'PhpParser\\Node\\Expr\\MethodCall',
          'identifier' => 'PhpParser\\Node\\Identifier',
          'abstractrector' => 'Rector\\Rector\\AbstractRector',
          'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
          'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Rector\\AbstractRector',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRuleDefinition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNodeTypes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<class-string<Node>> */',
             'namespace' => 'Hihaho\\RectorRules\\Rector\\Migration',
             'uses' => 
            array (
              'checksmigrationcontext' => 'Hihaho\\RectorRules\\Rector\\Migration\\Concerns\\ChecksMigrationContext',
              'removeaftercolumnpositioningrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\RemoveAfterColumnPositioningRector\\RemoveAfterColumnPositioningRectorTest',
              'node' => 'PhpParser\\Node',
              'methodcall' => 'PhpParser\\Node\\Expr\\MethodCall',
              'identifier' => 'PhpParser\\Node\\Identifier',
              'abstractrector' => 'Rector\\Rector\\AbstractRector',
              'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
              'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'refactor',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?PhpParser\\Node',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'node',
               'type' => 'PhpParser\\Node',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AbstractAddSuffixRector.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AbstractAddSuffixRector',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => 'Rector\\Rector\\AbstractRector',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'reflectionProvider',
               'type' => 'PHPStan\\Reflection\\ReflectionProvider',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'baseClass',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => true,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'suffix',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => true,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNodeTypes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<class-string<Node>> */',
             'namespace' => 'Hihaho\\RectorRules\\Rector\\NamingClasses',
             'uses' => 
            array (
              'node' => 'PhpParser\\Node',
              'identifier' => 'PhpParser\\Node\\Identifier',
              'name' => 'PhpParser\\Node\\Name',
              'class_' => 'PhpParser\\Node\\Stmt\\Class_',
              'reflectionprovider' => 'PHPStan\\Reflection\\ReflectionProvider',
              'abstractrector' => 'Rector\\Rector\\AbstractRector',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'refactor',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?PhpParser\\Node',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'node',
               'type' => 'PhpParser\\Node',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'buildNewName',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'currentName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddCommandSuffixRector.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddCommandSuffixRector',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @see AddCommandSuffixRectorTest
 */',
         'namespace' => 'Hihaho\\RectorRules\\Rector\\NamingClasses',
         'uses' => 
        array (
          'addcommandsuffixrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddCommandSuffixRector\\AddCommandSuffixRectorTest',
          'command' => 'Illuminate\\Console\\Command',
          'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
          'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AbstractAddSuffixRector',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'baseClass',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'suffix',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRuleDefinition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddMailSuffixRector.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddMailSuffixRector',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @see AddMailSuffixRectorTest
 */',
         'namespace' => 'Hihaho\\RectorRules\\Rector\\NamingClasses',
         'uses' => 
        array (
          'addmailsuffixrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddMailSuffixRector\\AddMailSuffixRectorTest',
          'mailable' => 'Illuminate\\Mail\\Mailable',
          'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
          'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AbstractAddSuffixRector',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'baseClass',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'suffix',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRuleDefinition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddNotificationSuffixRector.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddNotificationSuffixRector',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @see AddNotificationSuffixRectorTest
 */',
         'namespace' => 'Hihaho\\RectorRules\\Rector\\NamingClasses',
         'uses' => 
        array (
          'addnotificationsuffixrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddNotificationSuffixRector\\AddNotificationSuffixRectorTest',
          'notification' => 'Illuminate\\Notifications\\Notification',
          'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
          'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AbstractAddSuffixRector',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'baseClass',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'suffix',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRuleDefinition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/NamingClasses/AddResourceSuffixRector.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\NamingClasses\\AddResourceSuffixRector',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @see AddResourceSuffixRectorTest
 */',
         'namespace' => 'Hihaho\\RectorRules\\Rector\\NamingClasses',
         'uses' => 
        array (
          'addresourcesuffixrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddResourceSuffixRector\\AddResourceSuffixRectorTest',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
          'resourcecollection' => 'Illuminate\\Http\\Resources\\Json\\ResourceCollection',
          'node' => 'PhpParser\\Node',
          'identifier' => 'PhpParser\\Node\\Identifier',
          'name' => 'PhpParser\\Node\\Name',
          'class_' => 'PhpParser\\Node\\Stmt\\Class_',
          'reflectionprovider' => 'PHPStan\\Reflection\\ReflectionProvider',
          'abstractrector' => 'Rector\\Rector\\AbstractRector',
          'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
          'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Rector\\AbstractRector',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'reflectionProvider',
               'type' => 'PHPStan\\Reflection\\ReflectionProvider',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRuleDefinition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNodeTypes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<class-string<Node>> */',
             'namespace' => 'Hihaho\\RectorRules\\Rector\\NamingClasses',
             'uses' => 
            array (
              'addresourcesuffixrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddResourceSuffixRector\\AddResourceSuffixRectorTest',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
              'resourcecollection' => 'Illuminate\\Http\\Resources\\Json\\ResourceCollection',
              'node' => 'PhpParser\\Node',
              'identifier' => 'PhpParser\\Node\\Identifier',
              'name' => 'PhpParser\\Node\\Name',
              'class_' => 'PhpParser\\Node\\Stmt\\Class_',
              'reflectionprovider' => 'PHPStan\\Reflection\\ReflectionProvider',
              'abstractrector' => 'Rector\\Rector\\AbstractRector',
              'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
              'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'refactor',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?PhpParser\\Node',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'node',
               'type' => 'PhpParser\\Node',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/Concerns/ChecksRouteContext.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedTraitNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
       'phpDoc' => NULL,
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/NormalizeRoutePathRector.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\Routing\\NormalizeRoutePathRector',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @see NormalizeRoutePathRectorTest
 */',
         'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
         'uses' => 
        array (
          'checksroutecontext' => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
          'normalizeroutepathrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Routing\\NormalizeRoutePathRector\\NormalizeRoutePathRectorTest',
          'node' => 'PhpParser\\Node',
          'staticcall' => 'PhpParser\\Node\\Expr\\StaticCall',
          'string_' => 'PhpParser\\Node\\Scalar\\String_',
          'abstractrector' => 'Rector\\Rector\\AbstractRector',
          'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
          'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Rector\\AbstractRector',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRuleDefinition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNodeTypes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<class-string<Node>> */',
             'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
             'uses' => 
            array (
              'checksroutecontext' => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
              'normalizeroutepathrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Routing\\NormalizeRoutePathRector\\NormalizeRoutePathRectorTest',
              'node' => 'PhpParser\\Node',
              'staticcall' => 'PhpParser\\Node\\Expr\\StaticCall',
              'string_' => 'PhpParser\\Node\\Scalar\\String_',
              'abstractrector' => 'Rector\\Rector\\AbstractRector',
              'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
              'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'refactor',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?PhpParser\\Node',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'node',
               'type' => 'PhpParser\\Node',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Rector/Routing/RouteGroupArrayToMethodsRector.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Rector\\Routing\\RouteGroupArrayToMethodsRector',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @see RouteGroupArrayToMethodsRectorTest
 */',
         'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
         'uses' => 
        array (
          'checksroutecontext' => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
          'routegrouparraytomethodsrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Routing\\RouteGroupArrayToMethodsRector\\RouteGroupArrayToMethodsRectorTest',
          'node' => 'PhpParser\\Node',
          'arg' => 'PhpParser\\Node\\Arg',
          'array_' => 'PhpParser\\Node\\Expr\\Array_',
          'methodcall' => 'PhpParser\\Node\\Expr\\MethodCall',
          'staticcall' => 'PhpParser\\Node\\Expr\\StaticCall',
          'identifier' => 'PhpParser\\Node\\Identifier',
          'name' => 'PhpParser\\Node\\Name',
          'string_' => 'PhpParser\\Node\\Scalar\\String_',
          'abstractrector' => 'Rector\\Rector\\AbstractRector',
          'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
          'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Rector\\AbstractRector',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRuleDefinition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNodeTypes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/** @return array<class-string<Node>> */',
             'namespace' => 'Hihaho\\RectorRules\\Rector\\Routing',
             'uses' => 
            array (
              'checksroutecontext' => 'Hihaho\\RectorRules\\Rector\\Routing\\Concerns\\ChecksRouteContext',
              'routegrouparraytomethodsrectortest' => 'Hihaho\\RectorRules\\Tests\\Rector\\Routing\\RouteGroupArrayToMethodsRector\\RouteGroupArrayToMethodsRectorTest',
              'node' => 'PhpParser\\Node',
              'arg' => 'PhpParser\\Node\\Arg',
              'array_' => 'PhpParser\\Node\\Expr\\Array_',
              'methodcall' => 'PhpParser\\Node\\Expr\\MethodCall',
              'staticcall' => 'PhpParser\\Node\\Expr\\StaticCall',
              'identifier' => 'PhpParser\\Node\\Identifier',
              'name' => 'PhpParser\\Node\\Name',
              'string_' => 'PhpParser\\Node\\Scalar\\String_',
              'abstractrector' => 'Rector\\Rector\\AbstractRector',
              'codesample' => 'Symplify\\RuleDocGenerator\\ValueObject\\CodeSample\\CodeSample',
              'ruledefinition' => 'Symplify\\RuleDocGenerator\\ValueObject\\RuleDefinition',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'refactor',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?PhpParser\\Node',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'node',
               'type' => 'PhpParser\\Node',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/src/Set/HihahoSetList.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Set\\HihahoSetList',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'ALL',
               'value' => 'self::SETS_DIR . \'all.php\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'ROUTING',
               'value' => 'self::SETS_DIR . \'routing.php\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'NAMING',
               'value' => 'self::SETS_DIR . \'naming.php\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'MIGRATIONS',
               'value' => 'self::SETS_DIR . \'migrations.php\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'IMPORTS',
               'value' => 'self::SETS_DIR . \'imports.php\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Import/AliasImportRector/AliasImportRectorTest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Tests\\Rector\\Import\\AliasImportRector\\AliasImportRectorTest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Testing\\PHPUnit\\AbstractRectorTestCase',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'test',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filePath',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedAttributeNode::__set_state(array(
               'name' => 'PHPUnit\\Framework\\Attributes\\DataProvider',
               'args' => 
              array (
                0 => '\'provideData\'',
              ),
            )),
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Iterator',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideConfigFilePath',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/InlineMigrationConstantsRector/InlineMigrationConstantsRectorTest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\InlineMigrationConstantsRector\\InlineMigrationConstantsRectorTest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Testing\\PHPUnit\\AbstractRectorTestCase',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'test',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filePath',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedAttributeNode::__set_state(array(
               'name' => 'PHPUnit\\Framework\\Attributes\\DataProvider',
               'args' => 
              array (
                0 => '\'provideData\'',
              ),
            )),
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Iterator',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideConfigFilePath',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/InlineMigrationConstantsRector/Source/VideoModel.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\InlineMigrationConstantsRector\\Source\\VideoModel',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'CALIPER_ENABLED',
               'value' => '\'caliper_enabled\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'STATUS',
               'value' => '\'status\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'MAX_DURATION',
               'value' => '3600',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Migration/RemoveAfterColumnPositioningRector/RemoveAfterColumnPositioningRectorTest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Tests\\Rector\\Migration\\RemoveAfterColumnPositioningRector\\RemoveAfterColumnPositioningRectorTest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Testing\\PHPUnit\\AbstractRectorTestCase',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'test',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filePath',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedAttributeNode::__set_state(array(
               'name' => 'PHPUnit\\Framework\\Attributes\\DataProvider',
               'args' => 
              array (
                0 => '\'provideData\'',
              ),
            )),
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Iterator',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideConfigFilePath',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddCommandSuffixRector/AddCommandSuffixRectorTest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddCommandSuffixRector\\AddCommandSuffixRectorTest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Testing\\PHPUnit\\AbstractRectorTestCase',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'test',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filePath',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedAttributeNode::__set_state(array(
               'name' => 'PHPUnit\\Framework\\Attributes\\DataProvider',
               'args' => 
              array (
                0 => '\'provideData\'',
              ),
            )),
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Iterator',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideConfigFilePath',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddMailSuffixRector/AddMailSuffixRectorTest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddMailSuffixRector\\AddMailSuffixRectorTest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Testing\\PHPUnit\\AbstractRectorTestCase',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'test',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filePath',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedAttributeNode::__set_state(array(
               'name' => 'PHPUnit\\Framework\\Attributes\\DataProvider',
               'args' => 
              array (
                0 => '\'provideData\'',
              ),
            )),
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Iterator',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideConfigFilePath',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddNotificationSuffixRector/AddNotificationSuffixRectorTest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddNotificationSuffixRector\\AddNotificationSuffixRectorTest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Testing\\PHPUnit\\AbstractRectorTestCase',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'test',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filePath',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedAttributeNode::__set_state(array(
               'name' => 'PHPUnit\\Framework\\Attributes\\DataProvider',
               'args' => 
              array (
                0 => '\'provideData\'',
              ),
            )),
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Iterator',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideConfigFilePath',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/NamingClasses/AddResourceSuffixRector/AddResourceSuffixRectorTest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Tests\\Rector\\NamingClasses\\AddResourceSuffixRector\\AddResourceSuffixRectorTest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Testing\\PHPUnit\\AbstractRectorTestCase',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'test',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filePath',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedAttributeNode::__set_state(array(
               'name' => 'PHPUnit\\Framework\\Attributes\\DataProvider',
               'args' => 
              array (
                0 => '\'provideData\'',
              ),
            )),
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Iterator',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideConfigFilePath',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/NormalizeRoutePathRector/NormalizeRoutePathRectorTest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Tests\\Rector\\Routing\\NormalizeRoutePathRector\\NormalizeRoutePathRectorTest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Testing\\PHPUnit\\AbstractRectorTestCase',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'test',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filePath',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedAttributeNode::__set_state(array(
               'name' => 'PHPUnit\\Framework\\Attributes\\DataProvider',
               'args' => 
              array (
                0 => '\'provideData\'',
              ),
            )),
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Iterator',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideConfigFilePath',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  '/Users/sandermuller/Documents/GitHub/rector-rules/tests/Rector/Routing/RouteGroupArrayToMethodsRector/RouteGroupArrayToMethodsRectorTest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Hihaho\\RectorRules\\Tests\\Rector\\Routing\\RouteGroupArrayToMethodsRector\\RouteGroupArrayToMethodsRectorTest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Rector\\Testing\\PHPUnit\\AbstractRectorTestCase',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'test',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filePath',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedAttributeNode::__set_state(array(
               'name' => 'PHPUnit\\Framework\\Attributes\\DataProvider',
               'args' => 
              array (
                0 => '\'provideData\'',
              ),
            )),
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Iterator',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'provideConfigFilePath',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
); },
];
