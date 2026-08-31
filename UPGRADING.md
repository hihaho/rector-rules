# Upgrading

Migration notes for breaking changes, newest first. Patch and minor releases
without a breaking change are not listed here — see the `CHANGELOG.md`.

## 0.20.0

### A file whose only extra class is anonymous is now renamed

The suffix rules leave a file alone when it declares more than one class — renaming it
would break PSR-4 for the classes that were not renamed. That count used to include
anonymous classes inside method bodies:

```php
class OrderShipped extends Notification
{
    public function toMail($notifiable)
    {
        return new class {};   // used to block the file rename
    }
}
```

An anonymous class has no name, is never a rename candidate, and is not a declaration
PSR-4 can see, so it no longer blocks the rename. A file like the one above now gets
renamed to `OrderShippedNotification.php` along with its class, where before the class
was renamed and the file was left behind.

If you were relying on an anonymous class to keep a file where it is, use `withSkip()`
on that path instead.

## 0.19.0

### Rename propagation is wired through the package config, not `RelatedConfigInterface`

Rector 2.6.5 removed `Rector\Contract\DependencyInjection\RelatedConfigInterface`, which
the suffix rules implemented. On that version every run that loaded them died with
`Interface "Rector\Contract\DependencyInjection\RelatedConfigInterface" not found`.

The interface was also how the rules pulled in the rule that rewrites references
(`RenameClassRector`) and the `@see`/`@link`/`@uses` pass. That wiring now lives in the
package's own `config/config.php`, which reaches you in one of two ways:

- **`HihahoSetList::NAMING` imports it.** Nothing to change — this is the recommended path.
- **`->withRules([AddNotificationSuffixRector::class])`** relies on Rector auto-including
  the config through `extra.rector.includes`, which needs the optional
  `rector/extension-installer` Composer plugin to be allowed:

  ```bash
  composer config --no-plugins allow-plugins.rector/extension-installer true
  composer require --dev rector/extension-installer
  ```

If neither applies, the rule now aborts the run with a message naming the fix, rather
than renaming declarations and leaving every reference pointing at a class that no longer
exists. On `rector/rector` below 2.6.5 that combination used to work through the removed
interface, so this is the one behaviour change in the release.

## 0.17.0

### The suffix rules now rename files

`AddNotificationSuffixRector`, `AddCommandSuffixRector`, `AddMailSuffixRector` and
`AddResourceSuffixRector` used to rename only the class declaration. Every reference
was left pointing at the old name, and the file kept its old name — so the class no
longer matched its PSR-4 path. Running them on an autoloaded directory produced a tree
that did not autoload, and classes discovered by path (Artisan commands, Livewire
components, Filament resources) disappeared with no static error.

They now rename the declaration, every reference, **and the file**.

**This is a behaviour change, not a config change.** Nothing in your `rector.php` has
to change. But the diff these rules produce is different: it now contains file renames.

```diff
-app/Notifications/OrderShipped.php          class OrderShipped
+app/Notifications/OrderShippedNotification.php   class OrderShippedNotification

 // and in every referencing file:
-$customer->notify(new OrderShipped($order));
+$customer->notify(new OrderShippedNotification($order));
```

**To migrate:**

1. Run `vendor/bin/rector process --dry-run` first and read the diff. If you had
   previously run these rules and hand-fixed the fallout, expect a smaller diff than
   you might fear — already-suffixed classes are left alone.
2. Add `->withImportNames(removeUnusedImports: true)` if you have not already.
   Without it, rewritten references are emitted fully qualified and the now-unused
   `use` is left behind. Valid PHP, but noisy.
3. Give Rector its paths through `withPaths()` in `rector.php` rather than only as
   command-line arguments. The rules scan the configured paths once before traversal
   so the result does not depend on file order or worker count; paths supplied only on
   the command line are not visible to that scan.
4. Commit the rename as its own commit. Git tracks the file moves cleanly, but mixing
   them with unrelated edits makes review harder.

**What the rules refuse to do.** A rename is skipped, not forced, when the destination
name is already taken by a class, interface, trait or enum (compared case-insensitively),
when two classes would converge on one name, or when the target directory is not
writable. Files holding more than one class are not renamed, nor are files whose name
never matched the class. A declaration under a `withSkip()` path is left out entirely —
its references are not rewritten either.

`--dry-run` never renames a file.

### `ManifestCacheMetaExtension` is deprecated

Rector 2.6 retired `CacheMetaExtensionInterface` ("no longer applied"), so
`Hihaho\RectorRules\Caching\ManifestCacheMetaExtension` is now a no-op. It still
exists and will be removed in the next major. Let Rector manage its own cache, or clear
the cache directory in CI.

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
