# Testing

`HihahoSetList::TESTING`

| Rule | Effect |
|---|---|
| `AssertDatabaseTableToModelClassRector` | Replaces a database-assertion table string with the matching Eloquent model class |
| `AssertModelExistsRector` | Replaces an `assertDatabaseHas`/`Missing` single-`id` check with `assertModelExists`/`Missing` |

## `AssertDatabaseTableToModelClassRector`

```diff
-$this->assertDatabaseHas('users', ['email' => $email]);
+$this->assertDatabaseHas(\App\Models\User::class, ['email' => $email]);
```

A model class is rename-safe and navigable, where a table string rots silently when the
table is renamed. Laravel resolves the table from the model, so behaviour is unchanged.

The rule inserts the fully-qualified name. Add `->withImportNames()` to your Rector
config and it lands as a short `User::class` with the `use` statement added for you.

- Applies to `assertDatabaseHas`, `assertDatabaseMissing` and `assertDatabaseCount`,
  called as `$this->…`, `self::…` or `static::…` inside a PHPUnit `TestCase` subclass.
  `assertSoftDeleted` and `assertNotSoftDeleted` are excluded: with a model they also
  resolve the deleted-at column, so a table match alone does not prove behaviour is
  preserved.
- The string is rewritten only when the resolved model's own table provably equals it. A
  model with a mismatched `$table`, an overridden `getTable()`, or no resolvable model at
  all is left untouched, so expect the occasional string the rule declines to convert.
- Configurable via `model_namespace` (default `App\Models`) and a `table_to_model` map
  for tables the singularise-and-studly convention cannot resolve. A map entry is still
  verified, never trusted blindly.

## `AssertModelExistsRector`

```diff
-$this->assertDatabaseHas(Article::class, ['id' => $article->id]);
-$this->assertDatabaseMissing(Article::class, ['id' => $article->id]);
+$this->assertModelExists($article);
+$this->assertModelMissing($article);
```

- Fires when argument 1 is `SomeModel::class`, argument 2 is a single-item
  `['id' => $var->id]` array, and PHPStan can confirm `$var` is typed as `SomeModel`.
- Accepts a class-constant key (`SomeModel::ID`) when the constant resolves to `'id'`.
- Skips three-argument calls: the third is a connection name, and dropping it would
  silently switch connections.
- Skips multi-key arrays, which assert attribute values rather than existence.
- Fires only inside a `PHPUnit\Framework\TestCase` subclass, on `$this` or
  `self::`/`static::`, so a non-test helper with a same-named method is left alone.

Also available, opt-in:
[`TestFieldStringToConstantRector`](13-test-field-constants.md).
