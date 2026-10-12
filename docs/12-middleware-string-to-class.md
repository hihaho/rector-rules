# Middleware strings to classes

`MiddlewareStringToClassRector` sits outside every set.

Rewrites string route-middleware references to the class-based fluent form Laravel
10.9+ provides (`Authenticate::using()`, `Authorize::using()`,
`ValidateSignature::relative()`), so references become refactor-safe and IDE-navigable
instead of magic strings:

```diff
-Route::middleware('auth:sanctum')->group(function () {
-    Route::get('/posts', [PostController::class, 'index'])->middleware('can:viewAny,post');
-});
+Route::middleware(\Illuminate\Auth\Middleware\Authenticate::using('sanctum'))->group(function () {
+    Route::get('/posts', [PostController::class, 'index'])->middleware(\Illuminate\Auth\Middleware\Authorize::using('viewAny', 'post'));
+});
```

Each helper returns the same resolver string the alias would produce, so the rewrite
preserves behaviour. Laravel does not document this form as a recommended convention,
which is why the rule is opt-in. Register it by FQN:

```php
->withConfiguredRule(MiddlewareStringToClassRector::class, [
    MiddlewareStringToClassRector::CONVERT_BARE_ALIASES => true,
])
```

## Scope

Rewrites string and array-of-string middleware references across the surfaces where
they appear:

- `->middleware()`, `Route::middleware()` and `withoutMiddleware()` on a receiver
  resolving to an Illuminate routing type, so an unrelated `->middleware()` method is
  never touched. Every argument is considered.
- The `bootstrap/app.php` middleware configurator: `$middleware->group($name, [...])`
  (the middleware, not the name), `append(...)` and `prepend(...)`.
- Laravel 11+ controller `new Middleware('auth:sanctum')` value objects, the
  `HasMiddleware::middleware()` return shape.

Group names (`web`, `api`), custom and package aliases (`fortify.*`, `role:`),
variables, and already-class-form references are left untouched. The `can:` model
arguments stay string literals; upgrading them to `::class` would change the
authorisation target.

## The default convert-set excludes `auth` and `guest`

Converting an alias to its hardcoded *framework* class preserves behaviour only when
the app leaves that alias at the framework default. `auth` and `guest` are the aliases
apps most often remap to a custom subclass carrying real logic, so they are not
converted by default. List them in `aliases` to opt in, after confirming they are
unremapped. The default set is `auth.basic`, `can`, `password.confirm`, `signed`,
`verified`.

## Configuration

| Key | Default | Purpose |
|---|---|---|
| `aliases` | the five behaviour-safe aliases | Narrow or extend which aliases are converted |
| `convert_bare_aliases` | `true` | Also rewrite no-param forms (`'signed'` → `ValidateSignature::class`). Set `false` for `alias:param` forms only |
| `include_throttle` | `false` | Opt into `throttle` conversion (see below) |
| `throttle_class` | unset | Required when `include_throttle` is on |

## Throttle caveat

`throttle` is excluded by default. Its target class (`ThrottleRequests`,
`ThrottleRequestsWithRedis`, or a custom subclass) depends on app-global config
(`->throttleWithRedis()`, or an overridden alias) that is invisible at the call site, so
the rule will not guess it. Converting blindly would silently switch a Redis-throttling
app to the database limiter.

To enable it, set `include_throttle` to `true` **and** the explicit `throttle_class`
matching your app. Then `'throttle:api'` becomes `{class}::using('api')` and
`'throttle:60,1'` becomes `{class}::with(60, 1)`.
