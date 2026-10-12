# Documentation

Source for the published site at
[hihaho.github.io/rector-rules](https://hihaho.github.io/rector-rules/). The links below
point at the files in this folder so they work on GitHub; the site strips the `NN-`
prefix, so `04-code-quality.md` publishes as `/code-quality`.

## Getting started

- [Why hihaho/rector-rules?](01-why-rector-rules.md): what the rules rewrite, what they refuse to guess at, and when another tool fits better
- [Installation](02-installation.md): requirements, enabling a set, and the `withPaths()` requirement for the location-gated sets
- [Getting started](03-getting-started.md): one dry run, reading the diff, and keeping the codebase clean in CI

## Rule sets

- [Code quality](04-code-quality.md): named flag arguments, dropped default arguments, `config()->set()`, nullsafe removal
- [Eloquent](05-eloquent.md): `#[CollectedBy]` and `#[ObservedBy]` conversions, nested eager loading, relation constants
- [Naming](06-naming.md): the suffix each base class implies, and the classes left alone
- [Routing](07-routing.md): route-path normalization and fluent route groups
- [Migrations](08-migrations.md): INSTANT DDL, self-contained migrations, and the opt-in flag-column conversion
- [Imports](09-imports.md): aliasing the imports whose short names collide
- [Testing](10-testing.md): table strings as model classes, and `assertModelExists()`

## Opt-in rules

Each sits outside every set and is a no-op until registered by FQN.

- [Named arguments from a manifest](11-named-argument-manifest.md): the manifest schema, and the cache trap that hides a fresh one
- [Middleware strings to classes](12-middleware-string-to-class.md): the behaviour-safe aliases, and the `throttle` caveat
- [Test payload field names](13-test-field-constants.md): the internal/public asymmetry and its config contract

## Working on the site

```bash
npm --prefix docs ci
npm --prefix docs run dev     # local preview
npm --prefix docs run build   # what CI runs; fails on a dead internal link
```

Page order, titles and the "Next" blurbs live in `.vitepress/pages.ts`, which drives the
sidebar, the rewrites and the generated `llms-full.txt`. Adding a page means adding it
there; the build fails if a page is missing from the list.
