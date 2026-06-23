# Upgrading

Migration notes for breaking changes, newest first. Patch and minor releases
without a breaking change are not listed here — see the `CHANGELOG.md`.

## 0.15.0

### `TestFieldStringToConstantRector` is now self-resolving (config keys changed)

The opt-in `TestFieldStringToConstantRector` no longer reads a generated JSON
manifest. It resolves everything itself, statically, from your route files — so
adoption drops from "run a per-project producer that boots the framework" to three
lines of config. The rule's purpose is unchanged (align test request-payload field
keys with their FormRequest constants, bidirectionally by endpoint); only how it
obtains the route → request map and the internal/public classification changed.

**This is a breaking change to the rule's configuration.** The `MANIFEST` constant
is removed and replaced by three keys.

Before (0.13 – 0.14):

```php
->withConfiguredRule(TestFieldStringToConstantRector::class, [
    TestFieldStringToConstantRector::MANIFEST => __DIR__ . '/test-field-manifest.json',
])
```

After (0.15):

```php
->withConfiguredRule(TestFieldStringToConstantRector::class, [
    TestFieldStringToConstantRector::ROUTE_FILES => [
        __DIR__ . '/routes/web.php',
        __DIR__ . '/routes/api.php',
    ],
    TestFieldStringToConstantRector::INTERNAL_MIDDLEWARE => [
        \App\Http\Middleware\Authenticate::class,
    ],
    TestFieldStringToConstantRector::FIRST_PARTY_PREFIX => 'App\\',
])
```

**To migrate:**

1. Replace the `MANIFEST` key with `ROUTE_FILES`, `INTERNAL_MIDDLEWARE`, and
   `FIRST_PARTY_PREFIX`.
2. Delete the manifest-generating producer (the artisan command, the JSON file) and
   the manifest-generating producer (the artisan command, the JSON file). The rule no
   longer reads a manifest — but it now depends on your **route files' content**, so it
   still has a cache dependency (see "Cache correctness" below): re-point any
   `ManifestCacheMetaExtension` you had at your route file paths instead of the old
   manifest, or run the pass with `--no-cache`.
3. Point `ROUTE_FILES` at the same route files your application loads.
4. List in `INTERNAL_MIDDLEWARE` every token that marks an endpoint internal — a
   middleware FQCN (matched as `Foo::class`) and/or a string alias (matched as
   `'auth'`). A token not listed is treated public.

**Cache correctness.** Rector keys its per-file cache on the *test* file and the config
*parameters*, not on your route files' content — so with caching on, a route or constant
change over unchanged tests would be served stale. Fold the route files into the cache key:
register `ManifestCacheMetaExtension` with your route file paths (it hashes any paths you
give it), or run the rule's pass with `rector process --no-cache`.

**Boundary and coverage caveats.** The internal-middleware boundary must appear as a direct
token in the route files (inline or on an enclosing group). If your auth middleware
is added by a **middleware-group expansion** (e.g. the `web` group pulls it in via
the HTTP kernel), the static parse cannot see it and those routes will look public —
exclude them from the rule's scope. A `Foo::using(...)` middleware is treated public
(it is not the bare `::class` token, matching the booted stack); a route whose
middleware is built dynamically (a variable, concatenation, or call) is skipped, not
guessed. Route actions resolve only as `Controller::class` or `[Controller::class,
'method']` — a **string action** inside a `Route::controller(...)->group(...)` block is
not resolved, so those endpoints are a no-op (left untouched, never mis-rewritten).

The rule remains **not in any set** and a **no-op until configured**. If you were not
using `TestFieldStringToConstantRector`, no action is needed.
