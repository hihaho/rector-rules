# Routing

`HihahoSetList::ROUTING`

Applies only to files under a `routes/` directory, and skips anything under `/vendor/`.

| Rule | Effect |
|---|---|
| `NormalizeRoutePathRector` | Strips leading and trailing slashes, collapses consecutive ones |
| `RouteGroupArrayToMethodsRector` | Converts an array-based route group to fluent method chaining |

```diff
-Route::get('/about', fn () => 'about');
+Route::get('about', fn () => 'about');
```

```diff
-Route::group(['middleware' => 'web', 'prefix' => 'admin', 'name' => 'admin.'], function (): void {
+Route::middleware('web')
+    ->prefix('admin')
+    ->name('admin.')
+    ->group(function (): void {
     Route::get('dashboard', fn () => 'dashboard');
 });
```

Path normalization prevents duplicate routes from `/foo` against `foo/`.

## Scope

- `NormalizeRoutePathRector` rewrites `Route::get|post|put|patch|delete|any|head` only.
  `Route::match`, `Route::redirect`, `Route::view` and custom verbs are left untouched.
- `RouteGroupArrayToMethodsRector` rewrites a group only when every array key is
  supported: `middleware`, `prefix`, `name`/`as`, `namespace`, `domain`, `where`,
  `excluded_middleware`, `scope_bindings`. Unknown keys, positional arrays and empty
  arrays are left as-is, so no configuration is dropped silently.

Also available, opt-in:
[`MiddlewareStringToClassRector`](12-middleware-string-to-class.md).
