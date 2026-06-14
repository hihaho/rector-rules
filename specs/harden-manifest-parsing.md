# Harden manifest parsing in NamedArgumentFromManifestRector

## Overview

`NamedArgumentFromManifestRector` reads a JSON manifest produced by an external
PHPStan analyser and names call-site arguments from it, with **no runtime
validation** of the decoded data. A malformed manifest currently throws a raw
`JsonException` out of `configure()`, and a structurally-wrong record reaches
`basename($record['file'])` with an undefined key — a PHP warning that can mis-fire on
the wrong file. This change validates the manifest on load (fail loud on a broken
file, skip a single bad record) and fixes a companion cache-key bug where an
unreadable manifest collapses every hash to the empty string.

## Assumptions

<!-- One bullet per AI-introduced inference; sign off by skimming this section. -->

- **Error policy: throw on a broken file, skip a bad record.** A malformed-JSON or
  non-array manifest throws an `InvalidArgumentException` naming the path; a single
  structurally-invalid record (missing key / wrong scalar type) is skipped. Grounded in
  empirical evidence — see Resolved Questions #1. Note: the throw surfaces as an ugly
  uncaught stack trace (a Rector framework constraint on `configure()`-time throws),
  but is consistent with the rule's existing `Assert::stringNotEmpty` and gives a
  path-naming first line.
- **Unreadable-manifest sentinel = `'manifest-unreadable'`.** Invented string,
  parallel to the existing `'manifest-missing'` sentinel in the same class. It only
  has to be distinct and stable; the exact wording is not load-bearing.
- **Per-record validation skips silently (no log).** Rector rules have no standard
  logging channel here, and the rule's existing `refactor()` guards already skip on
  doubt without logging. Surfacing a skipped-record count is deferred (see Findings).
- **`value` remains optional.** The manifest's `value` field stays optional in
  validation (`array_key_exists('value', …) ⇒ is_string`), matching the existing
  `@phpstan-type ManifestRecord` docblock.
- **Empty `file`/`method`/`paramName` strings are rejected, not just non-strings.** An
  empty `paramName` would become `new Identifier('')` and emit invalid PHP, so the
  required string fields must be non-empty — a tightening surfaced by the Codex review.

---

## 1. Current State

Two files, both at commit `a4c3b32`:

- `src/Rector/CodeQuality/NamedArgumentFromManifestRector.php` — the rule. Manifest is
  loaded in `configure()` (lines 74–89) and consumed in `collectNamesToApply()`
  (lines 189–226). `configure()` today:

  ```php
  public function configure(array $configuration): void
  {
      $path = $configuration[self::MANIFEST] ?? null;
      Assert::stringNotEmpty($path);

      $this->recordsByBasename = [];
      if (! is_file($path)) {
          return;
      }

      /** @var list<array{...}> $records */
      $records = json_decode((string) file_get_contents($path), true, flags: JSON_THROW_ON_ERROR);
      foreach ($records as $record) {
          $this->recordsByBasename[basename($record['file'])][] = $record;
      }
  }
  ```

  Verified live: a syntactically broken manifest throws `JsonException: Syntax error`
  out of `configure()`. A record missing `file` would reach `basename(null)`.

- `src/Caching/ManifestCacheMetaExtension.php` — `getHash()` (lines 54–61) returns
  `(string) hash_file('sha256', $path)`. When the file exists but is unreadable,
  `hash_file()` returns `false` and `(string) false === ''`, so **every** unreadable
  manifest yields the same empty hash, defeating cache invalidation.

`Webmozart\Assert\Assert` is already imported (line 22) and used (line 77).

## 2. Proposed Changes

### 2.1 `configure()` — validate the manifest

1. Wrap `json_decode` in `try/catch (JsonException)` and rethrow a clear,
   path-carrying `InvalidArgumentException` (loud on a broken file).
2. Assert the decoded value is a list (`is_array` + `array_is_list`); otherwise throw
   `InvalidArgumentException` (a JSON object/scalar is a malformed manifest).
3. Per record, skip (`continue`) any entry that is not an array, is missing a required
   key, has a wrong scalar type, or has an **empty** `file`/`method`/`paramName` —
   defensive, matching the rule's skip-on-doubt guards. (An empty `paramName` would
   otherwise become `new Identifier('')` at line 169 and emit invalid PHP.)

**Imports — required (the file is namespaced `Hihaho\RectorRules\Rector\CodeQuality`).**
Add `use JsonException;` and `use InvalidArgumentException;` to the top-of-file `use`
block. Without them, the unqualified names in the snippet below resolve to
`Hihaho\…\CodeQuality\JsonException` / `…\InvalidArgumentException` (nonexistent) and
fail at runtime. Equivalently, write `\JsonException` / `\InvalidArgumentException`
inline — but match the file's existing style, which imports classes at the top.

Target shape:

```php
try {
    $records = json_decode((string) file_get_contents($path), true, flags: JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    throw new InvalidArgumentException(
        sprintf('Manifest at "%s" is not valid JSON: %s', $path, $e->getMessage()),
        previous: $e,
    );
}

if (! is_array($records) || ! array_is_list($records)) {
    throw new InvalidArgumentException(sprintf('Manifest at "%s" must be a JSON array of records.', $path));
}

foreach ($records as $record) {
    if (! $this->isValidRecord($record)) {
        continue;
    }
    $this->recordsByBasename[basename($record['file'])][] = $record;
}
```

```php
/**
 * @phpstan-assert-if-true array{file: string, line: int, method: string, argIndex: int, paramName: string, value?: string} $record
 */
private function isValidRecord(mixed $record): bool
{
    return is_array($record)
        && isset($record['file'], $record['line'], $record['method'], $record['argIndex'], $record['paramName'])
        && is_string($record['file']) && $record['file'] !== ''
        && is_int($record['line'])
        && is_string($record['method']) && $record['method'] !== ''
        && is_int($record['argIndex'])
        && is_string($record['paramName']) && $record['paramName'] !== ''
        && (! array_key_exists('value', $record) || is_string($record['value']));
}
```

**PHPStan note (`level: max`, strict, bleedingEdge, 100% type coverage):** `mixed
$record` is allowed (`type_perfect.no_mixed: false`). The `@phpstan-assert-if-true` is
load-bearing — it narrows `$record` after the `continue` guard so `basename($record['file'])`
and the typed-property assignment pass. **If PHPStan does not honour the assertion**,
inline the same checks directly in the `foreach` (PHPStan narrows natively) instead of
via the helper. Remove the now-redundant `/** @var list<...> */` docblock above the
decode — do not re-add a `@var` that claims a shape validation no longer guarantees.

### 2.2 `ManifestCacheMetaExtension::getHash()` — distinct sentinel

Pre-check `is_readable()` rather than relying on `hash_file() === false`. On an
unreadable file `hash_file()` **emits a PHP warning before returning `false`** — under
Pest/PHPUnit's strict warning handling that warning would fail or pollute the test, and
it adds noise for consumers. `is_readable()` is side-effect-free.

```php
public function getHash(): string
{
    if (! is_file($this->manifestPath)) {
        return 'manifest-missing';
    }

    if (! is_readable($this->manifestPath)) {
        return 'manifest-unreadable';
    }

    // hash_file() can still return false on a race (file vanished/locked between the
    // checks); guard the cast so an empty-string hash never collides across manifests.
    $hash = hash_file('sha256', $this->manifestPath);

    return $hash === false ? 'manifest-unreadable' : $hash;
}
```

## Edge Cases

| Scenario | Handling |
|----------|----------|
| Manifest file missing entirely | No-op — existing `is_file()` guard returns early (unchanged). Covered by `ConfigureManifestTest::test_a_missing_manifest_file_is_a_no_op`. |
| Manifest is syntactically invalid JSON | Throw `InvalidArgumentException` naming the path (the message is the first line of the resulting fatal; the stack trace is unavoidable for any `configure()`-time throw — see Resolved Questions #1). Phase 1 Tests. |
| Manifest is valid JSON but not an array (object / scalar) | Throw `InvalidArgumentException`. Phase 1 Tests. |
| One record missing a required key (`file`/`line`/…) | That record is skipped; valid records still load. No warning, no throw. Asserted by loaded-state reflection — Phase 1 Tests. |
| Record with wrong scalar type (`"line": "5"`, `"argIndex": "1"`) | Skipped by `isValidRecord` type checks. Phase 1 Tests. |
| Record with empty `paramName` (`""`) | Skipped (would otherwise become `new Identifier('')` → invalid PHP). Phase 1 Tests. |
| Empty manifest (`[]`) | `array_is_list([])` is true; loop is a no-op; rule names nothing. No change from today. |
| Manifest exists but is unreadable | `getHash()` returns `'manifest-unreadable'` via an `is_readable()` pre-check (distinct, non-colliding, no `hash_file` warning). Phase 2 Tests (skip-guarded for filesystems that ignore `0000`). |
| All 14 existing fixtures (valid records) | Unchanged — matching logic untouched; fixtures must stay green. Phase 1 Tests. |

## Implementation

### Phase 1: Validate the manifest in the rule (Priority: HIGH)

- [x] Modify `configure()` in `NamedArgumentFromManifestRector.php` per §2.1 — wrap
      decode, assert list, add `isValidRecord()`, skip invalid records — **only**
      `configure()` changes; do not touch the matching logic.
- [x] Confirm the 14 existing `NamedArgumentFromManifestRector/Fixture/*.php.inc`
      still pass (matching logic unchanged).
- [x] Tests — create
      `tests/Rector/CodeQuality/NamedArgumentFromManifestRector/ConfigureManifestTest.php`
      modelled on `tests/Caching/ManifestCacheMetaExtensionTest.php` (temp-file
      setUp/tearDown, `AbstractLazyTestCase`; `new NamedArgumentFromManifestRector()`
      news bare). Cover: (a) malformed JSON throws `InvalidArgumentException` whose
      message contains the path; (b) non-list JSON throws; (c) **a record missing a
      required key (or with an empty `paramName`) is skipped while a co-located valid
      record loads** — assert this against the loaded state, not just
      `expectNotToPerformAssertions()` (a void `configure()` with no state assertion
      cannot distinguish "skipped" from "wrongly retained"). Read the private
      `recordsByBasename` via reflection and assert it contains exactly the valid
      record(s):
      ```php
      $ref = new \ReflectionProperty(NamedArgumentFromManifestRector::class, 'recordsByBasename');
      $loaded = $ref->getValue($rule);
      // manifest = [<invalid record>, <one valid record for "a.php">]
      $this->assertSame(['a.php'], array_keys($loaded));
      $this->assertCount(1, $loaded['a.php']);
      ```
      (d) a missing file is a no-op. If `AbstractLazyTestCase` is not importable here,
      fall back to `PHPUnit\Framework\TestCase` and note it in Findings.

### Phase 2: Fix the cache-key sentinel (Priority: HIGH)

- [x] Modify `ManifestCacheMetaExtension::getHash()` per §2.2 — return
      `'manifest-unreadable'` via an `is_readable()` pre-check (avoids the `hash_file()`
      warning), with the `=== false` cast-guard retained for the race case.
- [x] Tests — add `test_hash_signals_an_unreadable_manifest` to
      `ManifestCacheMetaExtensionTest.php`: `chmod($manifest, 0000)`, then
      `markTestSkipped` if `is_readable()` is still true (filesystems/Windows that
      ignore the mode), else assert `getHash() === 'manifest-unreadable'`. Add
      `@chmod($this->manifest, 0644)` at the top of `tearDown()` so cleanup still
      deletes the file.

### Phase 3: Verification (Priority: HIGH)

- [x] `vendor/bin/pest` — full suite green (316 tests, 315 pass, 1 skip).
- [x] `vendor/bin/phpstan analyse --memory-limit=2G` — `errors:0`.
- [x] `vendor/bin/rector process --dry-run` — `changed_files:0` (the CI auto-fix bot
      rewrites non-dry-run-clean trees on push).

---

## Open Questions

None.

---

## Resolved Questions

1. **How should a malformed manifest be handled — throw or skip?** **Decision:** Throw
   a clear `InvalidArgumentException` for a wholesale-broken file (invalid JSON or
   non-array); skip a single structurally-invalid record. **Rationale (corrected after
   empirical testing):** An earlier draft claimed a thrown exception renders as a clean
   Rector error message. That is **false** — verified by running Rector with a malformed
   manifest: a throw from `configure()` (which Rector fires lazily via
   `RectorConfig.php:154` `afterResolving`, outside both `bin/rector.php`'s
   `try/catch` and Symfony Console's handler) surfaces as a **raw uncaught fatal with a
   full stack trace**. The same is true of the rule's *existing*
   `Assert::stringNotEmpty($path)` and even Rector's own `InvalidConfigurationException`.
   The decision to throw still stands, on three corrected grounds: (a) it is
   **consistent with the rule's existing behaviour** — the author already chose a
   loud-throw (the Webmozart `Assert`) for misconfiguration, producing the identical
   ugly trace; a malformed manifest is the same class of "the setup is broken" error.
   (b) Rewrapping the raw `JsonException` still **improves the first line** of that
   trace — `Manifest at "/path" is not valid JSON: Syntax error` names the file and
   cause, where the raw `JsonException: Syntax error in …Rector.php:85` does not.
   (c) Skipping a single bad record matches the rule's pervasive skip-on-doubt
   `continue` guards; failing a whole-codebase run on one typo would be hostile.
   Silent-skip-everything (option B) was rejected because a corrupt generated manifest
   would then make the rule silently name nothing — undebuggable, worse than an ugly-
   but-named fatal. Fail-loud-on-every-record (option C) was rejected as hostile.
   **Known limitation:** the stack trace is ugly and we cannot make Rector render
   `configure()`-time throws cleanly; that is a Rector framework constraint, documented
   here so it is not mistaken for a defect in this change.

---

## Findings

<!-- Notes added during implementation. Do not remove this section. -->

- Deferred: surfacing a count of skipped records via Rector's reporting — useful
  diagnostics, but Rector rules have no standard logging channel here and it is not
  required for correctness.
- `isValidRecord()`'s `@phpstan-assert-if-true` is honoured at `level: max` — PHPStan
  narrows `$record` after the `continue` guard, so `basename($record['file'])` and the
  typed-property assignment pass with no inline duplication. The §2.1 fallback (inline
  the checks in the `foreach`) was not needed.
- Rector's own pipeline rewrote the new `catch` block — `CatchExceptionNameMatchingTypeRector`
  renamed `$e` → `$jsonException`, and `ThrowWithPreviousExceptionRector` added the
  `getCode()` second arg. Adopted Rector's exact shape in source so the CI auto-fix bot
  has nothing to rewrite on push (`rector --dry-run` → `changed_files:0`).
- `markTestSkipped()` is called statically (`self::markTestSkipped(...)`) — PHPStan
  `staticMethod.dynamicCall` flags the `$this->` form.
- The unreadable-manifest test **ran** (did not skip) on the macOS dev filesystem —
  `0000` is honoured for a non-root user — so the suite shows 1 skip, not 2. The
  `markTestSkipped` guard still protects root/Windows CI legs.
