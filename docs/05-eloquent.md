# Eloquent

`HihahoSetList::ELOQUENT`

| Rule | Effect |
|---|---|
| `CollectedByAttributeRector` | Replaces a `newCollection()` override with `#[CollectedBy]` (Laravel 11+) |
| `ObservedByAttributeRector` | Replaces `booted()` observer registration with `#[ObservedBy]` (Laravel 11+) |
| `NestedArrayEagerLoadingRector` | Converts dot-notation eager loading to nested-array form when relations share a parent |
| `RelationNameToClassConstantRector` | Replaces a string relation name with the model's existing class constant |

## Attribute conversions

```diff
+use Illuminate\Database\Eloquent\Attributes\CollectedBy;
 use App\Collections\ArticleCollection;
 use Illuminate\Database\Eloquent\Model;

+#[CollectedBy(ArticleCollection::class)]
 final class Article extends Model
 {
-    public function newCollection(array $models = []): ArticleCollection
-    {
-        return new ArticleCollection($models);
-    }
 }
```

`CollectedByAttributeRector` fires when `newCollection()` holds exactly one statement,
`return new SomeCollection($models)`, the return type matches the constructed class,
and the class extends `Model`. Methods with extra logic are left untouched, and the rule
skips a class where a trait or ancestor model supplies its own `newCollection()`
(including a trait method aliased to `newCollection`), because the attribute and the
method do not resolve identically.

It also gates on subclassability by installed Laravel version. On **Laravel 12** the
attribute is read from the model's own class only, so a non-`final` base would lose its
collection on subtypes; there the rule converts `final` classes only. On **Laravel 13+**
the attribute resolves up the parent chain and non-final models are converted too.

```diff
+use Illuminate\Database\Eloquent\Attributes\ObservedBy;
 use App\Observers\ArticleObserver;
 use Illuminate\Database\Eloquent\Model;

+#[ObservedBy(ArticleObserver::class)]
 class Article extends Model
 {
-    protected static function booted(): void
-    {
-        static::observe(ArticleObserver::class);
-    }
 }
```

`ObservedByAttributeRector` works the same way on `booted()` holding exactly one
`static::observe(SomeObserver::class)` or `self::observe(...)` statement. The observer
argument must be a `::class` constant fetch; string literals are not converted. Unlike
`CollectedByAttributeRector`, it carries no `final` gate: a non-final model is converted
on any supported Laravel version.

Both are idempotent: they skip a class that already carries the attribute.

## `NestedArrayEagerLoadingRector`

```diff
 $query->with([
-    Article::COMMENTS . '.' . Comment::AUTHOR,
-    Article::COMMENTS . '.' . Comment::TAGS,
+    Article::COMMENTS => [
+        Comment::AUTHOR,
+        Comment::TAGS,
+    ],
     Article::AUTHOR,
 ]);
```

Nested-array form states the shared parent once, so adding or removing a child relation
is a one-line diff.

Applies to `with`, `load`, `loadMissing` and `loadCount`. It groups only when two or
more entries share a parent prefix, so a lone dot-notation chain stays as-is. Grouping
recurses, so deeper shared prefixes nest further.

## `RelationNameToClassConstantRector`

```diff
-$article->loadMissing('relatedArticles');
+$article->loadMissing(Article::RELATED_ARTICLES);
```

Class constants make relation usages findable and rename-safe, where a string literal
breaks silently when the relation is renamed.

- Covers `with`, `load`, `loadMissing`, `loadCount`, `relationLoaded`, `getRelation`,
  `setRelation` and `unsetRelation`, on instance calls and static calls
  (`Model::with(...)`, `self::with(...)`).
- Fires only when the receiver resolves to a single concrete class *and* that class has
  a **public** constant whose value equals the string. It never invents a constant and
  never references a non-public one, which would be a fatal access error.
- Inside the model it emits `self::`/`static::`; elsewhere the class name.
- Only the relation-name argument is touched. Eager-load constraint callbacks are left
  alone.
- When several constants share the value, only one named like the SCREAMING_SNAKE_CASE
  form of the relation is trusted; otherwise the string stays.
- Nested relations convert level by level, in both forms: `'comments.author'` becomes
  `Post::COMMENTS . '.' . Comment::AUTHOR`, and `['comments' => ['author']]` becomes
  `[Post::COMMENTS => [Comment::AUTHOR]]`. Each segment resolves against the model the
  previous relation points to, found by reading that relation method's body for its
  Eloquent factory call.
- Conversion is all-or-nothing per path. If any segment's model or constant cannot be
  resolved, including polymorphic `morphTo` relations, the whole string is left untouched
  rather than half-converted.
