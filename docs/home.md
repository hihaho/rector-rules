---
layout: home

hero:
  name: Hihaho Rector Rules
  text: Stop reviewing the same convention twice
  tagline: >-
    Rector rules that rewrite Laravel convention breaches instead of reporting them:
    naming, routing, migration safety, Eloquent relations and named arguments.
  actions:
    - theme: brand
      text: Why these rules?
      link: /why-rector-rules
    - theme: alt
      text: Installation
      link: /installation
    - theme: alt
      text: Getting started
      link: /getting-started

features:
  - title: Verify, then rewrite
    details: A table string becomes a model class only when the resolved model's own table provably equals it. A model with a mismatched $table or an overridden getTable() is left alone.
    link: /testing
  - title: Seven sets, enable what you want
    details: Code quality, Eloquent, naming, routing, migrations, imports and testing. Take all of them with one constant, or pick per set.
    link: /code-quality
  - title: Never invents a symbol
    details: Relation strings become constants that already exist and are public. A nested path converts all or nothing, so an unresolvable segment leaves the whole string as it was.
    link: /eloquent
  - title: Migration safety
    details: Strips column positioning that can disable MySQL's INSTANT DDL, and inlines the class constants that make a migration depend on code that will move.
    link: /migrations
  - title: Four rules stay opt-in
    details: Where the safe answer depends on your database engine, your middleware aliases or your auth boundary, the rule is a no-op until you say so.
    link: /named-argument-manifest
  - title: Pairs with PHPStan
    details: hihaho/phpstan-rules reports what needs a human decision. These rules fix what does not.
    link: https://github.com/hihaho/phpstan-rules
---

## What a run looks like

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

Install it as a dev dependency, enable a set, and dry-run before you apply.

```bash
composer require hihaho/rector-rules --dev
vendor/bin/rector process --dry-run
```

## Where to next

<HomeNextSteps />
