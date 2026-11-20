# Named arguments on long calls

`FirstPartyMinArgumentsToNamedRector` sits outside every set and is a no-op until registered.

Past a couple of arguments, a positional call stops saying which value is which. This rule
names every positional argument of a first-party method, static, nullsafe or constructor
(`new`) call that passes at least `min_arguments` arguments, named ones included.
Arguments that are already named stay as they are.

```diff
-$order = new Order($customer, 3, false);
-$order->ship($address, $carrier, express: true);
+$order = new Order(customer: $customer, quantity: 3, gift: false);
+$order->ship(address: $address, carrier: $carrier, express: true);
```

```php
->withConfiguredRule(FirstPartyMinArgumentsToNamedRector::class, [
    'first_party_namespaces' => ['App\\', 'Database\\Factories\\', 'Tests\\'],
    'min_arguments' => 3,
])
```

| Key | Default | Effect |
|---|---|---|
| `first_party_namespaces` | `['App\\']` | Only methods declared in these namespaces are named |
| `min_arguments` | `3` | The fewest arguments a call needs before it is named |

## Which calls get named

A named argument binds the call to the parameter name of the method that actually runs.
A call is named only when it reaches exactly one native method:

- The method is declared in one of `first_party_namespaces`. For vendor and framework
  methods, see [Vendor calls](#vendor-calls).
- The receiver is a single class. A nullable receiver counts; any other union or
  intersection is skipped.
- The class declares the method natively and the call can reach it from where it is made.
  A `@method` or `@mixin` docblock method, a macro, a protected method called from outside,
  and anything else forwarded through `__call` / `__callStatic` is skipped. Those receive
  their arguments as a positional array, so a named argument either throws or quietly
  lands on the wrong value.
- The class is not a facade. Facade static calls go through `__callStatic`, so even a
  facade's own static methods are left alone.
- The method accepts named arguments (no `@no-named-arguments`).
- A static call uses a literal class name, `self::` or `parent::`. A `static::` call and
  `new static` are late bound, so a subclass with renamed parameters would break them.
- Inside a trait, `$this->method()` and `self::method()` are named only when the trait
  declares the method as private and not abstract. Rector reads a trait without the class
  that uses it. That class replaces a trait method by declaring one with the same name,
  whatever its visibility, and the rule does not check for that. A protected or public
  method is often meant to be replaced, so those stay positional; a private helper rarely
  is, but if a using class does replace it with other parameter names, the named call
  throws at runtime. This needs Rector 2.7.0 or later, which analyses code
  inside a trait.

`FirstPartyFlagArgumentToNamedRector` applies the same checks.

## Scope

- The whole call is skipped if any argument is unpacked (`...$args`) or lands on a
  variadic parameter, positionally or by name. A positional argument after a named one is
  a PHP fatal, so a call is named in full or not at all.
- First-class callables, dynamic method or class names and `new class` are skipped.
- An instance call is named against the receiver's declared type, which may be an
  interface or a parent class. If an implementation renames a parameter, the named call
  throws at runtime. PHPStan reports that case (`argument.parameterRenamedInSubtype`) for
  the subtypes it analyses.

## Vendor calls

`VendorMinArgumentsToNamedRector` names the same long calls when the method is declared
in a vendor namespace. It sits outside every set as well.

```diff
-$excerpt = Str::limit($body, 100, '...');
+$excerpt = Str::limit(value: $body, limit: 100, end: '...');
```

```php
->withConfiguredRule(VendorMinArgumentsToNamedRector::class, [
    'vendor_namespaces' => ['Illuminate\\'],
    'min_arguments' => 3,
])
```

| Key | Default | Effect |
|---|---|---|
| `vendor_namespaces` | `['Illuminate\\']` | Only methods declared in these namespaces are named |
| `min_arguments` | `3` | The fewest arguments a call needs before it is named |

It applies every check above, plus one: a method without a body, declared on an
interface or as abstract, is skipped. The class that runs is then chosen at runtime, often
by configuration, and your PHPStan run does not check that its parameter names match.
`ResponseFactory::view()` stays positional; `Model::hasMany()`, a concrete method on an
abstract class, is named.

Laravel keeps parameter names out of its BC promise, so an upgrade can rename one. PHPStan
then reports the call as an unknown named parameter. A fake that a test swaps in
(`Queue::fake()`) can also use other names; the test that runs the call fails.

## Test doubles

A typed mock or a PHPUnit double keeps the parameter names, but an untyped
`Mockery::mock()` expectation (`->with(...)`) matches positionally, and a fake can differ
from the real signature. Both are vendor-declared, so the rule does not name calls on
them; keep it in mind when writing first-party fakes.
