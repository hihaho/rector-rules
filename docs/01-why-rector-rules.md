# Why hihaho/rector-rules?

A linter can tell you a convention slipped. It cannot put the code back.

So the finding lands in review as a comment, the author fixes it by hand, and the next
pull request repeats the exercise on a different file. Multiply that by a table string in
a database assertion, a relation referenced as a magic string, an array-based route group
and a `tinyInteger` flag column, and a meaningful share of review time goes on rewrites
a parser could do.

This package is those rewrites: a set of Rector rules that enforce the
[Hihaho Development Guidelines](https://guidelines.hihaho.com/) automatically, grouped
into seven sets you enable in `rector.php`.

```diff
-$this->assertDatabaseHas('users', ['email' => $email]);
+$this->assertDatabaseHas(\App\Models\User::class, ['email' => $email]);
```

## What it refuses to do

Every rule is a rewrite of code you already shipped, so a wrong transform is worse than a
missed one. That trade-off is settled the same way throughout:

- **Verify, then rewrite.** `AssertDatabaseTableToModelClassRector` converts a table
  string only when the resolved model's own table provably equals it. A model with a
  mismatched `$table` or an overridden `getTable()` is left alone.
- **No invented symbols.** `RelationNameToClassConstantRector` uses a constant that
  already exists and is public. It never adds one, and never references a non-public one.
- **All or nothing per site.** A nested relation path converts level by level, and if any
  segment cannot be resolved the whole string stays as it was rather than converting half
  of it.
- **Vendor signatures are off limits** where a rewrite would couple to them. Naming a
  flag argument reads the parameter name, and parameter names change under semver, so
  those rules fire only inside your own namespaces.
- **Four rules stay opt-in** because the safe answer depends on something the parser
  cannot see: your database engine, whether you remapped a middleware alias, or where
  your internal auth boundary sits.

## When something else is the right tool

| You want | Use |
|---|---|
| To *report* a convention breach without rewriting it, in CI or your editor | [`hihaho/phpstan-rules`](https://github.com/hihaho/phpstan-rules) |
| A Laravel upgrade path, or a convention Laravel itself documents | [`driftingly/rector-laravel`](https://github.com/driftingly/rector-laravel), whose sets cover the framework's own migrations |
| Code style: spacing, import order, trailing commas | [Pint](https://laravel.com/docs/pint). Rector rewrites structure, not formatting |

The two hihaho packages are built to pair: PHPStan flags what needs a human decision,
Rector fixes what does not. A few PHPStan rules have no Rector counterpart here because
the fix already ships in an upstream Rector set. Those are listed in the
[main README](https://github.com/hihaho/rector-rules#covered-by-upstream-rector).
