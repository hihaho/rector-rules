<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use InvalidArgumentException;
use JsonException;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\PhpParser\Node\FileNode;
use Rector\Rector\AbstractRector;
use Rector\ValueObject\PhpVersion;
use Rector\VersionBonding\Contract\MinPhpVersionInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * Apply named arguments from a manifest produced by an external analyser.
 *
 * {@see FirstPartyFlagArgumentToNamedRector} names flag arguments using Rector's
 * own (bare-PHPStan) type resolution, so it cannot name a flag whose receiver type
 * only resolves under a framework extension such as larastan (a generic-inherited
 * property, a model `@property` chain). This rule closes that gap without any type
 * resolution of its own: it reads a manifest — the structured findings a
 * larastan-powered PHPStan rule emits, each `{file, line, method, argIndex,
 * paramName}` — and names the argument by matching the call site by location.
 * Generate the manifest and run this rule against the same, unmodified tree.
 *
 * `method` is the called method name for a method/static call (never namespaced),
 * and the resolved class FQCN for a `new` expression — both the PHPStan producer
 * and Rector run name resolution, so the FQCN is the stable key there. A record
 * keys on `file + line + method`, which is unambiguous for one call per line — the
 * norm in PSR-12 / Pint-formatted code this package targets. The only residual
 * ambiguity is two calls of the *same method name on the same physical line* whose
 * receivers are *different types with different parameter names* at the same index;
 * both would be named with the last matching record. Keep one call per line
 * (formatters already do) to avoid it.
 *
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\NamedArgumentFromManifestRector\NamedArgumentFromManifestRectorTest
 *
 * @phpstan-type ManifestRecord array{file: string, line: int, method: string, argIndex: int, paramName: string, value?: string}
 */
final class NamedArgumentFromManifestRector extends AbstractRector implements ConfigurableRectorInterface, MinPhpVersionInterface
{
    public const string MANIFEST = 'manifest';

    /**
     * Manifest records grouped by the basename of their `file`, so the per-node
     * lookup is a single hash hit; the full path is verified by suffix afterwards.
     *
     * @var array<string, list<array{file: string, line: int, method: string, argIndex: int, paramName: string, value?: string}>>
     */
    private array $recordsByBasename = [];

    /**
     * Resolved once per file in the {@see FileNode} branch of {@see refactor()}, so the
     * path normalisation and basename lookup happen once per file — not once per call
     * node — and the per-node hot path is a single bool check.
     */
    private string $currentFilePath = '';

    /** @var list<array{file: string, line: int, method: string, argIndex: int, paramName: string, value?: string}> */
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
     * Validate one decoded manifest record before it is trusted by the matching
     * logic. A structurally-invalid record (missing key, wrong scalar type, or an
     * empty required string) is skipped — an empty `paramName` would otherwise
     * become `new Identifier('')` in {@see refactor()} and emit invalid PHP.
     *
     * @phpstan-assert-if-true array{file: non-empty-string, line: int, method: non-empty-string, argIndex: int, paramName: non-empty-string, value?: string} $record
     */
    private function isValidRecord(mixed $record): bool
    {
        return is_array($record)
            && isset($record['file'], $record['line'], $record['method'], $record['argIndex'], $record['paramName'])
            && is_string($record['file']) && $record['file'] !== ''
            && is_int($record['line'])
            && is_string($record['method']) && $record['method'] !== ''
            && is_int($record['argIndex'])
            && is_string($record['paramName']) && $record['paramName'] !== ''
            && (! array_key_exists('value', $record) || is_string($record['value']));
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Name arguments from an external analyser manifest, matching the call site by file/line/method — covers sites whose receiver type only resolves under a PHPStan extension',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$container->service_tokens->getToken($platform, false);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$container->service_tokens->getToken($platform, inherit: false);
CODE_SAMPLE,
                    [self::MANIFEST => '/abs/path/to/named-arguments-manifest.json'],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        // FileNode is the per-file root, visited before the call nodes — it replaces a
        // (now-deprecated) beforeTraverse() override for the once-per-file record setup.
        return [FileNode::class, MethodCall::class, StaticCall::class, New_::class];
    }

    public function refactor(Node $node): ?Node
    {
        // FileNode fires first for each file (Rector wraps every file's stmts in one).
        // Resolve the file's manifest records once here, exactly as the former
        // beforeTraverse() override did, so the per-node hot path stays a single bool
        // check. getFile() is used (not the @internal CurrentFileProvider) — it is the
        // accessor AbstractRector exposes and does not trip this package's PHPStan.
        if ($node instanceof FileNode) {
            $this->currentFilePath = str_replace('\\', '/', $this->getFile()->getFilePath());
            $this->currentFileRecords = $this->recordsByBasename[basename($this->currentFilePath)] ?? [];
            $this->currentFileHasNoRecords = $this->currentFileRecords === [];

            return null;
        }

        if ($this->currentFileHasNoRecords) {
            return null;
        }

        if (! $node instanceof MethodCall && ! $node instanceof StaticCall && ! $node instanceof New_) {
            return null;
        }

        // A first-class callable ($obj->m(...), C::m(...), new C(...)) carries no
        // argument to name, and CallLike::getArgs() asserts against being called
        // on one — bail before it fatals.
        if ($node->isFirstClassCallable()) {
            return null;
        }

        $callName = $this->resolveCallName($node);
        if ($callName === null) {
            return null;
        }

        $args = $node->getArgs();
        $toName = $this->collectNamesToApply($args, $callName, $node->getStartLine());
        if ($toName === []) {
            return null;
        }

        if (! $this->wouldStayValidPhp($args, $toName)) {
            return null;
        }

        foreach ($toName as $index => $paramName) {
            $args[$index]->name = new Identifier($paramName);
        }

        return $node;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersion::PHP_80;
    }

    /**
     * The records that name an argument of this call, as `argIndex => paramName`.
     * An argument is skipped when it is missing, already named, unpacked, or — when
     * the record pins a literal flag value — no longer holds that value (drift
     * guard: a stale manifest line never mis-names a since-changed argument).
     *
     * @param  Arg[]  $args
     * @return array<int, string>
     */
    private function collectNamesToApply(array $args, string $callName, int $line): array
    {
        $toName = [];
        foreach ($this->currentFileRecords as $record) {
            if ($record['line'] !== $line) {
                continue;
            }

            if (strcasecmp($record['method'], $callName) !== 0) {
                continue;
            }

            if (! $this->pathMatches($this->currentFilePath, $record['file'])) {
                continue;
            }

            $arg = $args[$record['argIndex']] ?? null;
            if (! $arg instanceof Arg) {
                continue;
            }

            if ($arg->name instanceof Identifier) {
                continue;
            }

            if ($arg->unpack) {
                continue;
            }

            if (isset($record['value']) && ! $this->valueMatches($arg->value, $record['value'])) {
                continue;
            }

            $toName[$record['argIndex']] = $record['paramName'];
        }

        return $toName;
    }

    /**
     * PHP forbids a positional argument after a named one. Naming an argument that
     * still has a positional (or spread) argument after it — because the manifest
     * named only the flag and not the trailing args — would emit invalid PHP. The
     * rename is safe only when every argument from the first named index onward
     * ends up named (here or already in source).
     *
     * @param  Arg[]  $args
     * @param  array<int, string>  $toName
     */
    private function wouldStayValidPhp(array $args, array $toName): bool
    {
        $named = $toName;
        foreach ($args as $index => $arg) {
            if ($arg->name instanceof Identifier) {
                $named[$index] = true;
            }
        }

        $indices = array_keys($named);
        if ($indices === []) {
            return true;
        }

        for ($index = (int) min($indices), $count = count($args); $index < $count; ++$index) {
            if (! isset($named[$index])) {
                return false;
            }
        }

        return true;
    }

    private function resolveCallName(Node $node): ?string
    {
        if ($node instanceof MethodCall || $node instanceof StaticCall) {
            return $node->name instanceof Identifier ? $node->name->toString() : null;
        }

        if ($node instanceof New_) {
            // Constructor records match the resolved class name: both the manifest
            // producer (PHPStan) and Rector run name resolution, so the FQCN is the
            // stable key here — unlike a method name, which is never namespaced.
            return $node->class instanceof Name ? $this->getName($node->class) : null;
        }

        return null;
    }

    /**
     * The manifest stores a project-relative path; the file under traversal is
     * absolute. Match on a path-segment boundary so `Foo.php` never matches
     * `BarFoo.php`. A short relative path can still suffix-match a deeper file
     * that repeats the same trailing segments (`a/Foo.php` also matches
     * `x/a/Foo.php`) — the manifest producer emits *root-relative* paths so the
     * suffix is specific enough, and a stray match would also have to coincide
     * on line, method, argIndex, and the optional value guard to misfire.
     */
    private function pathMatches(string $filePath, string $manifestFile): bool
    {
        $manifestFile = str_replace('\\', '/', $manifestFile);

        return $filePath === $manifestFile || str_ends_with($filePath, '/' . $manifestFile);
    }

    private function valueMatches(Node $value, string $expected): bool
    {
        if (! $value instanceof ConstFetch) {
            return false;
        }

        return strcasecmp($value->name->toString(), $expected) === 0;
    }
}
