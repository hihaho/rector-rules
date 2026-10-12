# Getting started

You have the package installed and a set enabled. This page takes one convention breach
from "Rector reports it" to "the rewrite is committed".

## 1. See what would change

Rector's dry run prints the diff and touches nothing:

```bash
vendor/bin/rector process --dry-run
```

For a first run on an existing codebase, start with one directory rather than the whole
app:

```bash
vendor/bin/rector process app/Http/Resources --dry-run
```

## 2. Read the diff

Each block names the file, the line, and the rule that produced the change:

```text
1 file with changes
===================

1) app/Http/Resources/Article.php:4

    ---------- begin diff ----------
@@ Line 4 @@

 use Illuminate\Http\Resources\Json\JsonResource;

-class Article extends JsonResource
+class ArticleResource extends JsonResource
 {
 }
    ----------- end diff -----------

Applied rules:
 * AddResourceSuffixRector


 [OK] 1 file would have been changed (dry-run) by Rector
```

The rule name is the thing to check when a diff surprises you. Each set's page here lists
what its rules fire on and, more usefully, what they deliberately skip.

## 3. Apply it

```bash
vendor/bin/rector process
```

Rector rewrites the files in place. Review the result as you would any commit.

::: tip The naming rules also move files
The example above renames a class, so it renames `Article.php` to `ArticleResource.php`
and rewrites every reference to it as well. That is a wider change than the other sets
make, and `--dry-run` shows the class rename without touching the filesystem. See
[Naming](06-naming.md#the-rules-move-files-and-rewrite-references) for the gotchas,
notably that `withPaths()` has to be set in `rector.php` for the pre-scan to see your code.
:::

Formatting is not Rector's job. Run your style pass afterwards:

```bash
vendor/bin/pint
```

::: tip Running under an agent wrapper?
`laravel/pao` rewrites `--error-format`, so Rector prints JSON instead of the diff above.
Prefix the command with `PAO_DISABLE=1` to get the readable output back.
:::

## 4. Keep it from drifting back

Once a codebase is clean, a check in CI keeps it that way. `--dry-run` exits `2` when
there is anything to change and `0` when there is not:

```yaml
- name: Rector
  run: vendor/bin/rector process --dry-run
```

## Where to go next

The seven set pages are reference: what each rule rewrites, what it skips, and what you
can configure. [Code quality](04-code-quality.md) is the set with the most configuration,
so it is a reasonable next read.

If you want a rule that is not in any set, four are opt-in. Each needs a decision the
parser cannot make on its own (your database engine, your middleware aliases, your auth
boundary), and each is a no-op until you register it. They start with
[named arguments from a manifest](11-named-argument-manifest.md).
