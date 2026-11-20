# One argument per line

`MultilineCallArgumentsRector` sits outside every set and is a no-op until registered.

It puts each argument of a single-line call with at least `min_arguments` arguments on
its own line. It covers function, method, nullsafe, static and constructor (`new`) calls,
vendor calls included, since it changes layout only. PHP built-ins are left alone: see
[Scope](#scope).

```diff
-return $this->formatName(first: $first, middle: $middle, last: $last);
+return $this->formatName(
+    first: $first,
+    middle: $middle,
+    last: $last,
+);
```

```php
->withConfiguredRule(MultilineCallArgumentsRector::class, [
    'min_arguments' => 3,
])
```

| Key | Default | Effect |
|---|---|---|
| `min_arguments` | `3` | The fewest arguments a call needs before it is wrapped |

## Run Pint after Rector

Rector's printer only breaks an argument list over several lines when an argument has a
comment, so the rule gives the first argument an empty one. On its own, Rector leaves a
blank line after the opening parenthesis and no trailing comma:

```php
return $this->formatName(

    first: $first,
    middle: $middle,
    last: $last
);
```

Pint removes the blank line and adds the comma with these two rules in `pint.json`. The
`no_extra_blank_lines` tokens repeat the Laravel preset's and add `parenthesis_brace_block`:

```json
"no_extra_blank_lines": {
    "tokens": ["extra", "throw", "use", "parenthesis_brace_block"]
},
"trailing_comma_in_multiline": {
    "elements": ["arrays", "arguments", "parameters"]
}
```

Run `vendor/bin/rector process` first, then `vendor/bin/pint`. Pint also re-indents a
wrapped call inside a method chain.

Both rules apply to the whole codebase, not only to the calls this rule wraps:
`trailing_comma_in_multiline` adds a comma to every existing multi-line call and
signature, and `no_extra_blank_lines` removes blank lines right after an opening
parenthesis or brace. Expect a one-time formatting diff when you enable them.

## Scope

- Only a call whose arguments all sit on one line is wrapped. A call with several
  arguments on one line is wrapped even when its parentheses are on other lines; a call
  with an argument that spans lines, such as a closure or a heredoc, is left alone.
- A call is skipped if any of its arguments has a comment.
- A call is skipped if a `@phpstan-ignore` comment sits on the line above it or on its
  own line. The ignore covers one line, and once the arguments are wrapped PHPStan reports
  an error on an argument on that argument's line instead.
- In a method chain, a call on its own line is wrapped only when the link before it is
  also a call (`->orderBy('id')` then `->join(...)`). The first link off a
  variable or property (`$query` then `->where(...)`), and a nullsafe call on its own
  line, are skipped: Rector cannot reprint them without joining them to the line above.
- PHP built-ins are skipped: internal functions such as `strspn()`, and methods or
  constructors declared on internal classes such as `DateTime`. Their arguments are
  mostly positional and well known, so one argument per line only makes them longer.
- A `where*` or `orWhere*` call, such as `->where('status', '!=', $value)`, reads as one
  condition and is skipped unless one of its arguments is a closure. The match is on the
  method name, so a `whereActive()` method of your own counts too.
- Nested calls that each meet the threshold are each wrapped.
- A dereferenced `new` (`new Report($a, $b, $c)->render()`, `->total`, `::class`, `[0]`) is
  skipped, along with a call made on it. Rector prints PHP 7.4 syntax, so reprinting
  either side would add parentheses around the `new`.
- First-class callables (`strlen(...)`) and anonymous classes (`new class ($a, $b, $c) {}`)
  are skipped.
