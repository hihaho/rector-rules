# Naming

`HihahoSetList::NAMING`

Adds the conventional class-name suffix based on the parent class.

| Rule | Effect |
|---|---|
| `AddCommandSuffixRector` | A class extending `Command` ends with `Command` |
| `AddMailSuffixRector` | A class extending `Mailable` ends with `Mail` |
| `AddNotificationSuffixRector` | A class extending `Notification` ends with `Notification` |
| `AddResourceSuffixRector` | A `JsonResource` subclass ends with `Resource`; a `ResourceCollection` subclass ends with `ResourceCollection` |

```diff
-class NotifyUsers extends Command
+class NotifyUsersCommand extends Command
```

Suffixes make the artifact type obvious from the class name alone and prevent collisions
like `App\Mail\Welcome` against `App\Notifications\Welcome`.

## The rules move files and rewrite references

Renaming a class breaks PSR-4 unless the file moves with it, and breaks every reference
unless those are rewritten too, so the rules do the whole job:

1. The declaration is renamed.
2. Every reference is rewritten: `new`, `::class`, type hints, imports, docblock type
   tags (`@param`, `@return`, `@var`) and the free-text tags (`@see`, `@link`, `@uses`,
   including inline `{@see …}`). The rules record their renames; `RenameClassRector` and
   `RenameDocBlockSeeTagRector` apply them, both registered by the package's own
   `config/config.php`.
3. The declaring file is renamed to match, after the run writes its changes.

So a `JsonResource` named `Article` in `Article.php`, used by a controller elsewhere,
comes out as `ArticleResource` in `ArticleResource.php`, with the controller's import,
type hint and `new` expression all updated.

To work regardless of the order Rector processes files in, and regardless of how many
parallel workers it spreads them over, the rules scan every configured path once before
traversal begins. The four rules share that scan, and its result is cached under Rector's
cache directory, so an unchanged tree reuses it across runs. `--clear-cache` bypasses it.

### What to know before you run them

- **Registering a rule directly needs `rector/extension-installer`.** `HihahoSetList::NAMING`
  imports `config/config.php` itself, so the set is self-sufficient. Reaching for
  `->withRules([AddNotificationSuffixRector::class])` instead relies on Rector
  auto-including that config, which needs the optional
  [`rector/extension-installer`](https://github.com/rectorphp/extension-installer) plugin.
  Without it the rule aborts the run with an explanatory message rather than renaming
  declarations and orphaning their references.
- **Configure paths with `withPaths()` in `rector.php`.** Paths given only as
  command-line arguments are not exposed early enough for the pre-scan. The rules then
  fall back to registering each rename as they meet it, which still renames the class,
  the file, and any reference in a file processed later, but can miss one in a file
  processed earlier.
- **`--dry-run` never renames a file.** The diff shows the class rename; the filesystem
  is left alone.
- **Enable `withImportNames(removeUnusedImports: true)`** for clean output. Without it
  Rector emits fully-qualified references and leaves the now-unused `use` behind. Valid
  PHP, but ugly.
- **Run Pint afterwards.** New imports land at the old one's position rather than being
  re-sorted. Worth knowing if you run Rector as a CI dry-run gate without a formatter.
- **Collisions are skipped, not forced.** If the destination class already exists, or two
  classes would converge on one name, both are left alone.
- **A file holding more than one class is not renamed**, nor is one whose name never
  matched its class. The class rename still happens. An anonymous class in a method body
  does not count as a second class.
- **A reference spelled in a different case** (`new ORDERSHIPPED()`) is not rewritten.
  Rector matches class names exactly.
- **Skipped paths are respected.** A declaration under a `withSkip()` path stays out of
  the rename map, so its references are not rewritten either.
- **Path-discovered classes** such as Artisan commands, Livewire components and Filament
  resources keep working, because the file name stays in sync with the class.
- **Budget a prose sweep.** Class names in ordinary comments, Markdown or fixture strings
  are not touched, and should not be, but they do go stale. Grep for the old names once
  the rename lands.
- **Using Rector as a library?** The file renames run from a shutdown hook. Call
  `SuffixRenameMap::flushFileRenames()` yourself if the process keeps running and needs
  the files in place. A failed rename, an unwritable directory for instance, is reported
  on `STDERR`.

Skipped: abstract classes, classes already suffixed correctly, and (in the Resource rule
only) `JsonResource` subclasses whose names already end in `Collection`. Those
look like naming mistakes, and renaming them to `FooCollectionResource` would bury the
bug.
