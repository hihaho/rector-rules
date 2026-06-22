<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Testing;

use InvalidArgumentException;
use JsonException;
use PhpParser\Node;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Scalar\String_;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\PhpParser\Node\FileNode;
use Rector\Rector\AbstractRector;
use Rector\ValueObject\PhpVersion;
use Rector\VersionBonding\Contract\MinPhpVersionInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * Align a test's field-name array keys with the endpoint's FormRequest constants,
 * in whichever direction the endpoint requires, driven entirely by a manifest an
 * external analyser produced.
 *
 * The motivating risk is **asymmetric**: in a test that exercises an *internal*
 * endpoint, a literal field name (`'id'`, `'player_url'`) is a refactor hazard — a
 * field rename silently desyncs the test from the request. But in a test that
 * exercises a *public API surface*, that same literal **is the wire contract**, and
 * a constant there lets a value-rename pass the test while breaking the public API.
 * So the safe move differs by endpoint, and the rule is **bidirectional**:
 *
 * - `to_const` (internal endpoint) — a string-literal key becomes the FormRequest's
 *   matching constant (`['id' => …]` → `[StoreOrderRequest::ID => …]`).
 * - `to_literal` (public endpoint) — a constant key is inlined back to its literal
 *   string (`[StoreOrderRequest::ID => …]` → `['id' => …]`), restoring the wire
 *   contract.
 *
 * Neither the endpoint classification nor the field→constant mapping is reachable
 * from the test file's AST. This rule therefore does **no resolution of its own** —
 * exactly like {@see \Hihaho\RectorRules\Rector\CodeQuality\NamedArgumentFromManifestRector},
 * it applies the findings a consumer-side analyser computed. The producer emits one
 * record per *proven-safe* site `{file, line, operation, value, constFqcn}`; the
 * absence of a record means "leave the key", so an unknown, dynamic, or
 * unclassified site is never touched (default-safe). For `to_literal` the producer
 * also resolves the constant's string value into `value`, so the rule writes it
 * verbatim and never reflects a constant.
 *
 * Two consequences of doing no resolution, both inherited from the manifest contract
 * (as with {@see NamedArgumentFromManifestRector}). First, the rule is
 * target-class-**agnostic**: it writes whatever `Class::CONST` the producer emits and
 * trusts the producer's choice of source (a FormRequest, here) rather than verifying
 * the class — "FormRequest" describes where the producer reads constants, not a rule
 * invariant. Second, `to_literal` trusts that the producer-resolved `value` is
 * *current*: it drift-guards on the constant token still being present, but not on
 * the token's *value* having changed since generation (which would need reflection).
 * So the manifest must be generated against the same tree Rector then processes — a
 * stale manifest whose constant changed value is an operator concern, not caught here.
 *
 * The rule is method-name-agnostic but position-aware: it rewrites a matching key
 * only where it is an **array key** — a request-payload key
 * (`->postJson($url, ['id' => $x])`) or an assertion key (`->assertJson(['id' => $x])`),
 * regardless of the enclosing call. The array-key gate is load-bearing: a field
 * name in *value* position (`['type' => 'id']`) is never a field reference, and a
 * public-wire literal in value position on the same line as a real key must not be
 * swapped — visiting `Array_` and touching only `ArrayItem::$key` makes that
 * structurally impossible, rather than relying on the producer to never emit it.
 *
 * @see \Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\TestFieldStringToConstantRectorTest
 *
 * @phpstan-type ManifestRecord array{file: string, line: int, operation: string, value: string, constFqcn: string, enclosingMethod?: string}
 */
final class TestFieldStringToConstantRector extends AbstractRector implements ConfigurableRectorInterface, MinPhpVersionInterface
{
    public const string MANIFEST = 'manifest';

    /** Convert a string-literal array key into the manifest's class constant. */
    private const string OP_TO_CONST = 'to_const';

    /** Inline a class-constant array key back to its literal string value. */
    private const string OP_TO_LITERAL = 'to_literal';

    /**
     * Manifest records grouped by the basename of their `file`, so the per-node
     * lookup is a single hash hit; the full path is verified by suffix afterwards.
     *
     * @var array<string, list<array{file: string, line: int, operation: string, value: string, constFqcn: string, enclosingMethod?: string}>>
     */
    private array $recordsByBasename = [];

    /**
     * Resolved once per file in the {@see FileNode} branch of {@see refactor()}, so the
     * path normalisation and basename lookup happen once per file — not once per
     * literal node — and the per-node hot path stays a single bool check.
     */
    private string $currentFilePath = '';

    /** @var list<array{file: string, line: int, operation: string, value: string, constFqcn: string, enclosingMethod?: string}> */
    private array $currentFileRecords = [];

    private bool $currentFileHasNoRecords = true;

    public function configure(array $configuration): void
    {
        $path = $configuration[self::MANIFEST] ?? null;
        Assert::stringNotEmpty($path);

        $this->recordsByBasename = [];
        if (! is_file($path)) {
            return;
        }

        try {
            $records = json_decode((string) file_get_contents($path), true, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException $jsonException) {
            throw new InvalidArgumentException(
                sprintf('Manifest at "%s" is not valid JSON: %s', $path, $jsonException->getMessage()),
                $jsonException->getCode(),
                previous: $jsonException,
            );
        }

        if (! is_array($records) || ! array_is_list($records)) {
            throw new InvalidArgumentException(sprintf('Manifest at "%s" must be a JSON array of records.', $path));
        }

        foreach ($records as $record) {
            if (! $this->isValidRecord($record)) {
                continue;
            }

            $this->recordsByBasename[basename($record['file'])][] = $record;
        }
    }

    /**
     * Validate one decoded manifest record before the matching logic trusts it. A
     * structurally-invalid record is skipped rather than fatalling the run: a
     * `constFqcn` without a `Class::CONST` shape would otherwise build a malformed
     * {@see ClassConstFetch} and emit invalid PHP.
     *
     * @phpstan-assert-if-true array{file: non-empty-string, line: int, operation: non-empty-string, value: non-empty-string, constFqcn: non-empty-string, enclosingMethod?: string} $record
     */
    private function isValidRecord(mixed $record): bool
    {
        if (! is_array($record)
            || ! isset($record['file'], $record['line'], $record['operation'], $record['value'], $record['constFqcn'])
            || ! is_string($record['file']) || $record['file'] === ''
            || ! is_int($record['line'])
            || ! in_array($record['operation'], [self::OP_TO_CONST, self::OP_TO_LITERAL], true)
            || ! is_string($record['value']) || $record['value'] === ''
            || ! is_string($record['constFqcn']) || $record['constFqcn'] === ''
            || (array_key_exists('enclosingMethod', $record) && ! is_string($record['enclosingMethod']))) {
            return false;
        }

        // constFqcn must be exactly a `Class::CONST` pair. No explode limit here on
        // purpose: a name with more than one `::` splits into 3+ parts and is rejected,
        // so refactor()'s limit-2 split only ever sees a record this method proved
        // well-formed. Both halves must also be syntactically legal — a `Class::CONST`
        // with both parts non-empty can still hold an illegal token (`Order::bad-name`,
        // `Bad Segment::ID`) that would build a ClassConstFetch printing invalid PHP, so
        // a malformed manifest is dropped here rather than corrupting source downstream.
        $parts = explode('::', $record['constFqcn']);
        if (count($parts) !== 2 || ! $this->isClassName($parts[0]) || ! $this->isIdentifier($parts[1])) {
            return false;
        }

        // `Order::class` is a legal label but the magic class-name pseudo-constant, not
        // a field constant — it would always resolve and silently rewrite a field key
        // into a class-string. The rule targets real field constants only, so reject it.
        return strcasecmp($parts[1], 'class') !== 0;
    }

    /**
     * A single PHP label — a constant name, or one namespace segment. ASCII-only is
     * deliberate: the analyser emits real model/const names, which are ASCII in
     * practice, and a tight pattern is the point (reject `bad-name`, `2foo`, `a b`).
     */
    private function isIdentifier(string $value): bool
    {
        return preg_match('/^[A-Za-z_]\w*$/', $value) === 1;
    }

    /**
     * A namespaced class name: `\`-separated {@see isIdentifier()} segments, optional
     * leading `\`. The reserved pseudo-class keywords (`self`, `static`, `parent`) are
     * rejected only as the **terminal** segment — PHP forbids them as a class short
     * name (`class Parent {}` is a fatal error) but permits them mid-namespace
     * (`Foo\Parent\Bar` is a valid class). Checking the terminal segment alone both
     * drops an impossible target (`Foo\Parent::ID`, bare `self::ID`) and keeps a
     * legitimately-namespaced model.
     */
    private function isClassName(string $value): bool
    {
        $value = ltrim($value, '\\');

        if ($value === '') {
            return false;
        }

        $segments = explode('\\', $value);
        foreach ($segments as $segment) {
            if (! $this->isIdentifier($segment)) {
                return false;
            }
        }

        $terminal = strtolower($segments[count($segments) - 1]);

        return ! in_array($terminal, ['self', 'static', 'parent'], true);
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            "Align a test's field-name array keys with the endpoint's FormRequest constants, in the direction an external analyser manifest dictates per site (internal endpoint → constant, public endpoint → literal) — applies only to sites the producer proved safe",
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$this->postJson($url, ['id' => $order->id]);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$this->postJson($url, [\App\Http\Requests\StoreOrderRequest::ID => $order->id]);
CODE_SAMPLE,
                    [self::MANIFEST => '/abs/path/to/test-field-manifest.json'],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        // Array_ (not String_/ClassConstFetch) is the node type: the rule only ever
        // rewrites an array *key*, so visiting arrays and touching ArrayItem::$key keeps
        // a value-position node structurally untouchable (see the class docblock).
        // FileNode is the per-file root, visited first for the once-per-file record setup.
        return [FileNode::class, Array_::class];
    }

    /**
     * @param FileNode|Array_ $node
     */
    public function refactor(Node $node): ?Node
    {
        // FileNode fires first for each file (Rector wraps every file's stmts in one).
        // Resolve the file's manifest records here so the per-node hot path is cheap.
        // getFile() is used (not the @internal CurrentFileProvider) — it is the
        // accessor AbstractRector exposes and does not trip this package's PHPStan.
        if ($node instanceof FileNode) {
            $this->currentFilePath = str_replace('\\', '/', $this->getFile()->getFilePath());
            $this->currentFileRecords = $this->recordsByBasename[basename($this->currentFilePath)] ?? [];
            $this->currentFileHasNoRecords = $this->currentFileRecords === [];

            return null;
        }

        if ($this->currentFileHasNoRecords || ! $node instanceof Array_) {
            return null;
        }

        $changed = false;
        foreach ($node->items as $item) {
            if (! $item instanceof ArrayItem) {
                continue;
            }

            if (! $item->key instanceof Expr) {
                continue;
            }

            $replacement = $this->replacementForKey($item->key);
            if ($replacement instanceof Expr) {
                $item->key = $replacement;
                $changed = true;
            }
        }

        return $changed ? $node : null;
    }

    /**
     * The rewritten array key for a matching manifest record, or null when none
     * matches. The direction is per-record: `to_const` turns a string-literal key into
     * the manifest's constant; `to_literal` inlines a class-constant key back to its
     * literal string. Each direction matches on the token that is *currently in source*
     * — the string `value` for `to_const`, the `constFqcn` for `to_literal` — so a
     * stale manifest whose site has since changed simply does not match and the key is
     * left alone (drift guard), exactly as {@see NamedArgumentFromManifestRector} does.
     *
     * Site identity is `file + line` plus that source token, unambiguous for one such
     * key per physical line — the norm in PSR-12 / Pint-formatted code. The residual
     * ambiguity is two identical source keys on one line (e.g. nested inline arrays):
     * one record then matches both, so the producer emits a record only when the site
     * is unique on its line. Keep one such key per line (formatters already do).
     */
    private function replacementForKey(Expr $key): ?Expr
    {
        $line = $key->getStartLine();
        foreach ($this->currentFileRecords as $record) {
            if ($record['line'] !== $line) {
                continue;
            }

            if (! $this->pathMatches($this->currentFilePath, $record['file'])) {
                continue;
            }

            if ($record['operation'] === self::OP_TO_CONST) {
                if ($key instanceof String_ && $key->value === $record['value']) {
                    [$class, $const] = explode('::', $record['constFqcn'], 2);

                    return new ClassConstFetch(new FullyQualified($class), new Identifier($const));
                }

                continue;
            }

            // OP_TO_LITERAL — inline a class-constant key back to the wire-contract
            // string. `value` is the literal the producer already resolved from the
            // constant; the rule writes it verbatim, never reflecting the constant.
            if ($key instanceof ClassConstFetch && $this->classConstFetchMatches($key, $record['constFqcn'])) {
                return new String_($record['value']);
            }
        }

        return null;
    }

    /**
     * Whether a class-constant key node is the `Class::CONST` the record names. The
     * class half is compared case-insensitively (PHP class names are), the constant
     * name exactly (constant names are case-sensitive). A dynamic class
     * (`$x::FOO`), a `::class` fetch, or an unresolved name never matches.
     */
    private function classConstFetchMatches(ClassConstFetch $key, string $constFqcn): bool
    {
        if (! $key->class instanceof Name || ! $key->name instanceof Identifier) {
            return false;
        }

        $resolvedClass = $this->getName($key->class);
        if ($resolvedClass === null) {
            return false;
        }

        [$class, $const] = explode('::', $constFqcn, 2);

        return strcasecmp(ltrim($resolvedClass, '\\'), ltrim($class, '\\')) === 0
            && $key->name->toString() === $const;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersion::PHP_80;
    }

    /**
     * The manifest stores a project-relative path; the file under traversal is
     * absolute. Match on a path-segment boundary so `Foo.php` never matches
     * `BarFoo.php`. The producer emits root-relative paths so the suffix is specific;
     * a stray suffix collision would also have to coincide on line and value to
     * misfire.
     */
    private function pathMatches(string $filePath, string $manifestFile): bool
    {
        $manifestFile = str_replace('\\', '/', $manifestFile);

        return $filePath === $manifestFile || str_ends_with($filePath, '/' . $manifestFile);
    }
}
