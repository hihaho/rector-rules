## Performance benchmarks

Every rule under `src/Rector/` runs **per-AST-node** during Rector traversal, so
the hot path is the rule pipeline itself — the `refactor()` / `getNodeTypes()`
gates and the shared `Concerns/` helpers (e.g. `ChecksRouteContext`). The
`rector-rule-authoring` guideline's "Gate cheaply, resolve names once" section
is the per-rule cost model; this file covers how to *measure* it.

Performance work goes through the **autoresearch** loop, not a Pest group — a
timed assertion in the suite is flaky and tells you nothing about the
distribution. Benchmark scripts live in `autoresearch/` (create the dir on first
use) and run this package's rules against a synthetic consumer corpus, measuring
wall-clock via `hrtime()`. Keep the corpus synthetic per
`anonymize-public-examples.md` — never benchmark against real consumer code.

Benchmark when touching the rule pipeline or a shared `Concerns/` helper:
capture a baseline, make one change, re-run, and keep it only if the metric
improves. The `autoresearch` skill drives the full measure → change →
keep-or-revert loop — activate it for any sustained optimization work.
