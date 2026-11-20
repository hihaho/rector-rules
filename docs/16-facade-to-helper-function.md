# Facades to helper functions

`FacadeToHelperFunctionRector` sits outside every set and is a no-op until registered.

It replaces a static facade call with the helper function that returns the same service,
and calls the method on that.

```diff
-$value = Cache::get('key');
-Log::info('Order shipped', ['id' => $order->id]);
+$value = cache()->get('key');
+logger()->info('Order shipped', ['id' => $order->id]);
```

```php
->withRules([FacadeToHelperFunctionRector::class])
```

| Facade | Helper |
|---|---|
| `App` | `app()` |
| `Auth` | `auth()` |
| `Cache` | `cache()` |
| `Config` | `config()` |
| `Cookie` | `cookie()` |
| `Log` | `logger()` |
| `Redirect` | `redirect()` |
| `Request` | `request()` |
| `Response` | `response()` |
| `Session` | `session()` |
| `URL` | `url()` |
| `Validator` | `validator()` |
| `View` | `view()` |

Each helper, called without arguments, resolves the same container binding as its facade,
so a mock set with `Cache::shouldReceive()` in a test still applies to `cache()`.

## Scope

- Only the facades in the table are converted, through their `Illuminate\Support\Facades`
  class or a root alias such as `\Cache`. Facades without an equivalent helper, such as
  `DB`, `Storage` and `Route`, are left alone.
- A method the facade class declares itself is skipped: `shouldReceive()`, `spy()`,
  `fake()`, `swap()` and the like exist only on the facade, as does `Auth::routes()`.
- The rule always keeps the method call: `Config::get('app.name')` becomes
  `config()->get('app.name')`, not `config('app.name')`.
- The facade's `use` import stays behind once its last call is converted. Pint's
  `no_unused_imports` or Rector's `removeUnusedImports()` removes it.
