# Migrations

`HihahoSetList::MIGRATIONS`

Applies only to files under a directory named `migrations`, and skips anything under
`/vendor/`.

| Rule | Effect |
|---|---|
| `RemoveAfterColumnPositioningRector` | Removes `->after()` column positioning |
| `InlineMigrationConstantsRector` | Inlines class constants (string, int, float, bool, null); leaves enum cases alone |

```diff
 Schema::table('users', function (Blueprint $table): void {
-    $table->string('description')->after('name');
-    $table->boolean(Article::COMMENTS_ENABLED)->nullable();
+    $table->string('description');
+    $table->boolean('comments_enabled')->nullable();
 });
```

A migration has to be self-contained. `->after()` can disable MySQL's INSTANT DDL
optimization on large tables, and referencing a model constant creates a dependency that
breaks once the constant is renamed or removed.

## Scope

- `RemoveAfterColumnPositioningRector` strips `->after()` only where the receiver is a
  `ColumnDefinition`, as in `$table->string('x')->after('y')`. Blueprint's two-argument
  scoping form (`$table->after($col, Closure)`) and unrelated `->after()` methods such
  as `Collection::after` are left alone.
- `InlineMigrationConstantsRector` skips enum cases, so `Status::Active` keeps its enum
  semantics instead of silently becoming a string literal.

## Opt-in: `FlagColumnToBooleanRector`

Converts flag-style integer columns to `boolean`:

```diff
-$table->tinyInteger('is_published')->default(1);
+$table->boolean('is_published')->default(true);
```

This rule is deliberately outside the `MIGRATIONS` set and is a no-op until you opt in,
because it is only safe on **MySQL and MariaDB**, where `tinyInteger` is `tinyint` and
`boolean` is `tinyint(1)`, so storage is identical. On PostgreSQL it would be an incompatible
`smallint` to `boolean` change.

```php
->withConfiguredRule(FlagColumnToBooleanRector::class, [
    FlagColumnToBooleanRector::CONFIRM_MYSQL_COMPATIBLE => true,
])
```

### Historical migrations

Editing an already-run migration does not change production, because it will not re-run.
Prod stays `tinyint` while a freshly built database gets
`tinyint(1)`. On MySQL that difference is display width only, but treat the run as a
deliberate one-time normalisation rather than a routine pass.

### Scope

Only signed `tinyInteger` columns whose name matches a flag pattern *and* that carry an
explicit `->default(0|1|true|false)`. The pattern is a prefix list (`is_`, `has_`,
`should_`, `can_`, `are_`, `allow_`, `allows_`, `enable_`, `enables_`) plus a suffix list
(`_enabled`, `_disabled`, `_required`), both configurable via `name_prefixes` and
`name_suffixes`.

`unsignedTinyInteger` is intentionally out of scope: its 0-255 range would be lost if a
misclassified flag-named column were narrowed to a signed `tinyint(1)`. Defaultless,
auto-increment, `->change()`, wider-type and non-flag columns are left untouched. The
name-plus-default heuristic is not proof a column is boolean (`has_count`, say), so
review the diff.
