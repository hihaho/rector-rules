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
| `Context` | `context()` |
| `Log` | `logger()` |
| `Redirect` | `redirect()` |
| `Request` | `request()` |
| `Response` | `response()` |
| `Session` | `session()` |
| `URL` | `url()` |
| `View` | `view()` |

Each helper, called without arguments, resolves the same container binding as its facade,
so a mock set with `Cache::shouldReceive()` or `Log::spy()` in a test still applies to
`cache()` and `logger()`: `Facade::swap()` also puts the mock in the container.

One difference remains. A facade keeps the instance it resolved first, until `swap()` or
the end of the test, while the helper asks the container every time. After
`$this->app->instance('cache', $other)` without `swap()`, `Cache::get()` still reaches the old
instance and `cache()->get()` reaches `$other`.

## Scope

- Only the facades in the table are converted, through their `Illuminate\Support\Facades`
  class or a root alias such as `\Cache`. Facades without an equivalent helper, such as
  `DB`, `Storage` and `Route`, are left alone, and so are `Event`, `Broadcast` and `Lang`,
  whose helpers do something else or read worse. `Validator` and `Cookie` are left out too:
  `validator()` is typed with the contract, which has no `passes()`, and `cookie()` has a
  stricter signature than the facade's docblock, so static analysis fails on the result.
- A method the facade class declares itself is skipped: `shouldReceive()`, `spy()`,
  `fake()`, `swap()` and the like exist only on the facade, as does `Auth::routes()`. So
  are the Mockery assertions a test calls on a spied facade, such as
  `Log::shouldHaveReceived()`.
- A first-class callable (`Log::info(...)`) is skipped: it resolves the facade on every
  call, while `logger()->info(...)` would resolve the service once.
- A call is skipped when its namespace declares a function with the helper's name, which
  an unqualified `cache()` there would call instead.
- The rule always keeps the method call: `Config::get('app.name')` becomes
  `config()->get('app.name')`, not `config('app.name')`.
- The facade's `use` import stays behind once its last call is converted. Pint's
  `no_unused_imports` or Rector's `removeUnusedImports()` removes it.
- With `MultilineCallArgumentsRector` also registered, expect it to wrap some converted
  calls that it left alone as facade calls, such as `cache()->put($key, $value, $ttl)`.
