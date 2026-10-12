# Test payload field names

`TestFieldStringToConstantRector` sits outside every set and is a no-op until configured.

In a test exercising an *internal* endpoint, a hard-coded field-name string is a refactor
hazard: a field rename silently desyncs the test from its FormRequest. In a test
exercising a *public API surface*, that same literal is the wire contract, and a constant
there lets a value rename pass the test while breaking the public API.

So the rule runs both ways. It converts a literal to the FormRequest constant on internal
endpoints, and inlines a constant back to its literal on public ones.

```diff
 // internal endpoint: a field rename would silently desync the test
-$this->postJson(route('orders.store'), ['id' => $order->id]);
+$this->postJson(route('orders.store'), [StoreOrderRequest::ID => $order->id]);

 // public API endpoint: the literal is the wire contract, so keep it a string
-$this->postJson(route('api.orders.store'), [StoreOrderRequest::ID => 1]);
+$this->postJson(route('api.orders.store'), ['id' => 1]);
```

## How it decides

The rule resolves everything statically from your route files. No manifest, no generator,
no application boot. For each `route('name')` it reads the route file to find the
controller action, reflects the action's first `FormRequest` parameter (whose first-party
`string` constants name the fields), and classifies the route internal or public by
whether a configured internal-middleware token appears in its statically accumulated
middleware stack. A route it cannot prove is left untouched, whether the name is unknown,
the middleware unparseable, or the FormRequest absent.

## Configuration

```php
->withConfiguredRule(TestFieldStringToConstantRector::class, [
    TestFieldStringToConstantRector::ROUTE_FILES => [
        __DIR__ . '/routes/web.php',
        __DIR__ . '/routes/api.php',
    ],
    TestFieldStringToConstantRector::INTERNAL_MIDDLEWARE => [
        \App\Http\Middleware\Authenticate::class,
    ],
    TestFieldStringToConstantRector::FIRST_PARTY_PREFIX => 'App\\',
])
```

- `ROUTE_FILES` takes absolute paths to the route files parsed for the route-to-request
  map.
- `INTERNAL_MIDDLEWARE` takes the tokens marking a route internal: middleware FQCNs
  (matched as `Foo::class`) and string aliases (matched as `'auth'`). List every token
  that marks an endpoint internal. A token you leave out is treated as public, which
  would inline a constant back to a literal and drop the refactor safety, so cover the
  auth boundary for every internal area.
- `FIRST_PARTY_PREFIX` is the namespace prefix of constants eligible for rewriting, so
  only your own request constants are written.

## Cache correctness

The rule derives its rewrites from your route files and the reflected request constants,
but Rector keys its per-file cache on the *test* file's content and the config
*parameters*, not the route files. With caching on, a route change (a new route, a moved
middleware, a renamed constant) over unchanged test files is served stale.

Run the rule's pass with `rector process --no-cache` (or `--clear-cache`) after changing
a route file. The manifest rule carries
[the same constraint](11-named-argument-manifest.md#the-manifest-is-invisible-to-the-rector-cache).

## Correlation is same-call-site

The rule rewrites a payload only where the verb call names its route directly, as in
`$this->postJson(route('orders.store'), ['id' => …])`. The route name is read from a
literal `route('name', …)` in argument position 0, and the payload is the first array
argument of the verb call. That follows Laravel's `$uri, $data, $headers` signature, so a
trailing headers array is never mistaken for the payload and `route()`'s own params array
stays inside the `route()` call. A variable URL, a raw-string URL, or a non-literal route
name is skipped.

## Boundary and coverage caveats

- The internal boundary must appear as a direct token in the route files, inline or on an
  enclosing group. Middleware pulled in by a group expansion, such as the `web` group
  adding it via the HTTP kernel, is invisible to the static parse. Those routes look
  public and must be excluded from the rule's scope.
- A `Foo::using(...)` static call is treated as public, since it is not the bare `::class`
  token, exactly as the booted middleware stack would see it. A dynamic middleware
  argument (a variable, concatenation or call) makes the stack unknowable, so the route is
  skipped rather than guessed.
- Route actions resolve only when written as `Controller::class` (invokable) or
  `[Controller::class, 'method']`. A string action inside a
  `Route::controller(Controller::class)->group(...)` block is not resolved, because the
  enclosing controller is not carried into the nested route, so those endpoints are a
  no-op. Use the array-callable form for tests you want covered.

## Scope and safety

The rule rewrites only in array-key position, touching `ArrayItem::$key` alone, which
makes a value-position field name structurally untouchable. Literal-to-constant matches
the literal currently in source. Constant-to-literal reads the constant's value fresh by
reflection and inlines only a first-party `string` constant of that route's request, so a
constant that is no longer a string field is left alone.

Assertion arrays such as `assertJson([...])` are out of scope. They check the *response*,
whose keys are resource keys rather than FormRequest constants, so rewriting them would
be unsound.

## Scope the rule to your tests

It matches a test idiom: `post`, `put` or `patch` (with or without `Json`) carrying a
`route('name')` URL and a payload array. That shape appears in application code too, an
HTTP-client call for instance, and the rule does not gate on filename. Restrict its
Rector paths to your test suite by registering it in a config whose `->withPaths([...])`
covers `tests/` only.
