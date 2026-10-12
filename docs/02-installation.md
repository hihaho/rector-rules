# Installation

```bash
composer require hihaho/rector-rules --dev
```

## Requirements

| | |
|---|---|
| PHP | `^8.3` |
| Rector | `^2.6` |
| Laravel | Tested against 12 and 13. The rules match against `Illuminate\…` classes, so they need a Laravel app to act on |

The package ships no service provider and nothing to publish. It is a set of Rector
rules plus the set-list constants that group them, so nothing runs until you enable a set.

Install [`rector/extension-installer`](https://github.com/rectorphp/extension-installer)
alongside it if you plan to register the naming rules directly rather than through
`HihahoSetList::NAMING`. That plugin auto-includes the package's `config/config.php`,
which wires up the rename propagation those rules depend on. The set imports that config
itself, so it works either way.

## Enable it in `rector.php`

```php
use Hihaho\RectorRules\Set\HihahoSetList;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([__DIR__ . '/app', __DIR__ . '/database', __DIR__ . '/routes', __DIR__ . '/tests'])
    ->withSets([
        HihahoSetList::ALL,
    ]);
```

`ALL` imports all seven sets. To pick individually:

```php
->withSets([
    HihahoSetList::CODE_QUALITY,
    HihahoSetList::ELOQUENT,
    HihahoSetList::NAMING,
    HihahoSetList::ROUTING,
    HihahoSetList::MIGRATIONS,
    HihahoSetList::IMPORTS,
    HihahoSetList::TESTING,
])
```

Two sets gate on where a file lives, so `withPaths()` has to reach them: the routing
rules run only on files under a `routes/` directory, and the migration rules only on
files under a `migrations/` directory. Both skip anything under `/vendor/`.

Next: [run it and read the first diff](03-getting-started.md).
