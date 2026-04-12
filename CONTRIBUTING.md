# Contributing

Thanks for taking the time to improve this package.

## Local setup

```bash
git clone https://github.com/hihaho/rector-rules.git
cd rector-rules
composer install
```

## Running checks

```bash
composer test       # Pest suite
composer qa         # Pint + Rector + PHPStan + tests (what CI runs)
```

Run `composer qa` before opening a PR. The auto-fix CI workflow will run Pint and Rector on your branch, but running locally is faster.

## Writing a fixture

Every rule behavior change needs a fixture. Fixtures live under `tests/Rector/<Category>/<Rule>/Fixture/`.

A fixture that exercises a rewrite uses this format:

```php
<?php

// input
class Foo extends Bar
{
}

-----
<?php

// expected output
class FooBar extends Bar
{
}
```

A fixture that asserts the rule **skips** a case omits the `-----` separator. The file is treated as both input and expected output, so the test fails if the rule rewrites anything:

```php
<?php

// input — rule should leave this alone
abstract class BaseFoo extends Bar
{
}
```

When adding a new rule, include fixtures for:

- The happy-path rewrite.
- A skip case (rule doesn't apply).
- Any edge case the rule specifically guards against (e.g. a collision, an abstract class, a dynamic method name).

Look at `tests/Rector/Routing/NormalizeRoutePathRector/Fixture/routes/` for a rule with good coverage.

## Code style

Pint, Rector, and PHPStan are the source of truth. `composer qa` runs all three. Don't hand-tune style; let the tools decide.

PHPStan runs at `level: max` with strict rules. If a finding looks like a real bug, fix the code; don't suppress it.

## Pull requests

- One rule or behavior change per PR keeps review easy.
- Update `CHANGELOG.md` under the `## Unreleased` section.
- If you add a rule, update `README.md` so the set table stays in sync.
- Fixture files should stay minimal — one concern per fixture.
