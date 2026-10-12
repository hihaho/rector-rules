# Named arguments from a manifest

`NamedArgumentFromManifestRector` sits outside every set and is a no-op until configured.

`FirstPartyFlagArgumentToNamedRector` names a flag only when Rector's own type
resolution can identify the receiver. Whether it resolves depends on how the receiver's
type is declared:

| Receiver type source | Resolves? | What to do |
|---|---|---|
| Native docblock `@property` on the class | Yes, already: PHPStan's built-in annotation extension reads it | Nothing. The usual gates still apply: an `@property` pointing at a vendor class or a union still skips |
| Extension-only dynamic property (no declared property, no typed docblock, type synthesized by a `PropertiesClassReflectionExtension`) | No, not by default | Load the extension into Rector with `withPHPStanConfigs()` |
| Method invented at runtime (a `Macroable` macro or mixin, never statically registered) | No, and static analysis cannot see it at all | Use the manifest bridge |

## Extension-only properties: load the PHPStan config

Rector loads consumer PHPStan config into the same engine that powers its type
resolution, so pointing it at a larastan-enabled neon resolves those receivers directly:

```php
->withPHPStanConfigs([__DIR__ . '/phpstan.neon']) // must include larastan's extension
```

## The manifest bridge

For receivers static analysis cannot resolve even with extensions loaded, chiefly runtime
macros, this rule applies findings a consumer-side PHPStan pass computed. It
does no type resolution of its own. A ready-made producer ships in
[`hihaho/phpstan-rules`](https://github.com/hihaho/phpstan-rules) as a Collector that
writes the JSON below; include its `named-argument-manifest.neon`, or write your own
producer to the format.

```php
->withConfiguredRule(NamedArgumentFromManifestRector::class, [
    NamedArgumentFromManifestRector::MANIFEST => __DIR__ . '/named-arguments-manifest.json',
])
```

The manifest is a JSON array of records, each naming one argument of one call:

```json
[{ "file": "app/Services/TokenStore.php", "line": 42, "method": "getToken", "argIndex": 1, "paramName": "inherit", "value": "false" }]
```

- `file` is a project-relative path, matched as a path-segment suffix of the file under
  traversal. Emit root-relative paths to keep the suffix unambiguous.
- `method` is the method name for a method or static call (never namespaced), or the
  resolved class FQCN for a `new` expression. Both producer and Rector run name
  resolution, so the FQCN is the stable key there.
- `value` is optional: a literal flag the argument must still hold. It guards against
  drift, so a stale manifest line cannot mis-name a since-changed argument.

### Scope and safety

Records are matched by `file` + `line` + `method` and applied only to positional,
not-yet-named, non-unpacked arguments. First-class callables are skipped, and a rename
that would leave a positional argument after a named one is refused for the whole call.
The one residual ambiguity is two calls of the same method name on one physical line
with different receiver types; keep one call per line, as formatters already do.

A malformed manifest fails loud: invalid JSON or a non-array payload throws an
`InvalidArgumentException` naming the path. A single structurally invalid record is
skipped, so one bad line never fails the run.

## The manifest is invisible to the Rector cache

Rector keys each file's cache on the source content plus the configuration
*parameters*, never the content of a file a rule points at. A regenerated manifest with
new findings, over unchanged source, is served from cache and **silently skipped**. Run
the pass with `rector process --no-cache` (or `--clear-cache`); that fits the
regenerate-then-apply workflow, where the manifest changes every cycle anyway.

> Running under an agent wrapper? `laravel/pao` rewrites `--error-format` and can
> interfere with Rector's stream handling, so run the manifest pass with `PAO_DISABLE=1`.
