# Hihaho Rector Rules

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hihaho/rector-rules.svg?style=flat-square)](https://packagist.org/packages/hihaho/rector-rules)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hihaho/rector-rules/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hihaho/rector-rules/actions/workflows/run-tests.yml)
[![GitHub PHPStan Action Status](https://img.shields.io/github/actions/workflow/status/hihaho/rector-rules/phpstan.yml?branch=main&label=phpstan&style=flat-square)](https://github.com/hihaho/rector-rules/actions/workflows/phpstan.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/hihaho/rector-rules.svg?style=flat-square)](https://packagist.org/packages/hihaho/rector-rules)
[![License](https://img.shields.io/github/license/hihaho/rector-rules.svg?style=flat-square)](LICENSE)

Laravel conventions slip in ways a linter can only report: a table string where a model
class belongs, a relation referenced as a magic string. The comment lands in review, and
the fix waits for someone to do it by hand. These [Rector](https://getrector.com/)
rules do the rewrite instead, enforcing the
[Hihaho Development Guidelines](https://guidelines.hihaho.com/) as an automated pass.

```diff
-$this->assertDatabaseHas('users', ['email' => $email]);
+$this->assertDatabaseHas(\App\Models\User::class, ['email' => $email]);
```

## Installation

```bash
composer require hihaho/rector-rules --dev
```

Requires PHP `^8.3` and Rector `^2.6`, and is tested against Laravel 12 and 13.

## Usage

Enable the sets you want in `rector.php`:

```php
use Hihaho\RectorRules\Set\HihahoSetList;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([__DIR__ . '/app', __DIR__ . '/database', __DIR__ . '/routes', __DIR__ . '/tests'])
    ->withSets([
        HihahoSetList::ALL, // or pick per set: CODE_QUALITY, ELOQUENT, NAMING, ROUTING, MIGRATIONS, IMPORTS, TESTING
    ]);
```

Then dry-run before you apply:

```bash
vendor/bin/rector process --dry-run
```

The routing rules only touch files under a `routes/` directory and the migration rules
only files under a `migrations/` directory, so `withPaths()` has to reach them.

## Documentation

Read the full documentation at
**[hihaho.github.io/rector-rules](https://hihaho.github.io/rector-rules/)**.

**Getting started**
- [Why hihaho/rector-rules?](https://hihaho.github.io/rector-rules/why-rector-rules): what the rules rewrite, what they refuse to guess at, and when another tool fits better
- [Installation](https://hihaho.github.io/rector-rules/installation): requirements, enabling a set, and the paths the location-gated sets need
- [Getting started](https://hihaho.github.io/rector-rules/getting-started): one dry run, reading the diff, and keeping the codebase clean in CI

**Rule sets**
- [Code quality](https://hihaho.github.io/rector-rules/code-quality): named flag arguments, dropped default arguments, `config()->set()`, nullsafe removal
- [Eloquent](https://hihaho.github.io/rector-rules/eloquent): `#[CollectedBy]` and `#[ObservedBy]` conversions, nested eager loading, relation constants
- [Naming](https://hihaho.github.io/rector-rules/naming): the suffix each base class implies, and the classes left alone
- [Routing](https://hihaho.github.io/rector-rules/routing): route-path normalization and fluent route groups
- [Migrations](https://hihaho.github.io/rector-rules/migrations): INSTANT DDL, self-contained migrations, and the opt-in flag-column conversion
- [Imports](https://hihaho.github.io/rector-rules/imports): aliasing the imports whose short names collide
- [Testing](https://hihaho.github.io/rector-rules/testing): table strings as model classes, and `assertModelExists()`

**Opt-in rules.** Each sits outside every set and is a no-op until registered by FQN.
- [Named arguments from a manifest](https://hihaho.github.io/rector-rules/named-argument-manifest): the manifest schema, and the cache trap that hides a fresh one
- [Middleware strings to classes](https://hihaho.github.io/rector-rules/middleware-string-to-class): the behaviour-safe aliases, and the `throttle` caveat
- [Test payload field names](https://hihaho.github.io/rector-rules/test-field-constants): the internal/public asymmetry and its config contract

For the static-analysis counterparts, the rules that report but don't rewrite, see
[`hihaho/phpstan-rules`](https://github.com/hihaho/phpstan-rules).

## Covered by upstream Rector

Some rules in `hihaho/phpstan-rules` have no counterpart here, because the fix already
ships upstream. Enable the upstream set.

| PHPStan rule | Upstream set | Notes |
|---|---|---|
| `onlyAllowFacadeAliasInBlade` | `LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES` | Rewrites `use Route;` to `use Illuminate\Support\Facades\Route;`, and its siblings |

```php
use RectorLaravel\Set\LaravelSetList; // driftingly/rector-laravel

->withSets([LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES])
```

## Testing

```bash
composer test
```

Runs the full Pest suite. `composer qa` runs the other three CI gates in one go: Pint,
Rector and PHPStan. It does not run the tests, so run both before pushing.

## Changelog

See [CHANGELOG.md](CHANGELOG.md).

## Contributing

Pull requests and issues are welcome. [CONTRIBUTING.md](CONTRIBUTING.md) covers the
local setup, the fixture format, and what CI checks.

## Security

Please report security issues privately. [SECURITY.md](SECURITY.md) explains how.

## Credits

- [Hihaho](https://github.com/hihaho)
- [All contributors](https://github.com/hihaho/rector-rules/contributors)

## License

MIT. See [LICENSE](LICENSE).
