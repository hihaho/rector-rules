<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Testing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\TestCase as FoundationTestCase;
use Illuminate\Support\Str;
use PhpParser\Node;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Scalar\String_;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ReflectionProvider;
use PHPUnit\Framework\TestCase;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Testing\AssertDatabaseTableToModelClassRector\AssertDatabaseTableToModelClassRectorTest
 */
final class AssertDatabaseTableToModelClassRector extends AbstractRector implements ConfigurableRectorInterface
{
    public const string MODEL_NAMESPACE = 'model_namespace';

    public const string TABLE_TO_MODEL = 'table_to_model';

    private const string DEFAULT_MODEL_NAMESPACE = 'App\\Models';

    private const string MODEL_CLASS = Model::class;

    private const string TEST_CASE_CLASS = TestCase::class;

    /**
     * Classes Laravel's database assertions are actually defined on (the trait, and
     * the Foundation test case that flattens it). The matched assertion must resolve
     * to one of these — a userland method of the same name, anywhere in the chain, is
     * a different method and must not be rewritten.
     *
     * @var list<string>
     */
    private const array FRAMEWORK_ASSERTION_PROVIDERS = [
        FoundationTestCase::class,
        InteractsWithDatabase::class,
    ];

    /**
     * Instance helpers the database assertions dispatch to when resolving the
     * table/connection. A userland override of any of them could make the model-class
     * form diverge from the original string form, so an override forces a skip.
     *
     * @var list<string>
     */
    private const array DATABASE_HELPER_METHODS = [
        'getTable',
        'getConnection',
        'getTableConnection',
        'newModelFor',
    ];

    /**
     * Only assertions whose model form resolves nothing beyond table + connection.
     * `assertSoftDeleted`/`assertNotSoftDeleted` are deliberately excluded: with a
     * model they also resolve the deleted-at column via `getDeletedAtColumn()` (and
     * fail on a non-soft-deletable model), so a table+connection match does not prove
     * behaviour is preserved.
     *
     * Lowercased — PHP method names are case-insensitive, so the gate compares
     * the lowercased call name (mirroring what isNames() did via strcasecmp).
     *
     * @var list<string>
     */
    private const array ASSERTION_METHODS = [
        'assertdatabasehas',
        'assertdatabasemissing',
        'assertdatabasecount',
    ];

    private string $modelNamespace = self::DEFAULT_MODEL_NAMESPACE;

    /** @var array<string, string> */
    private array $tableToModel = [];

    /**
     * Memoised `isInTestContext()` verdicts keyed by "class|method". The check
     * depends only on the enclosing class and assertion name, so it is constant
     * across every assertion in the same test class.
     *
     * @var array<string, bool>
     */
    private array $testContextCache = [];

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function configure(array $configuration): void
    {
        $namespace = $configuration[self::MODEL_NAMESPACE] ?? self::DEFAULT_MODEL_NAMESPACE;
        Assert::stringNotEmpty($namespace);
        $this->modelNamespace = $namespace;

        // The map only *selects* a candidate model; it never bypasses the §3
        // verification below — a stale entry whose model owns a different table is
        // still skipped, not trusted.
        $map = $configuration[self::TABLE_TO_MODEL] ?? [];
        Assert::isMap($map);
        Assert::allStringNotEmpty(array_keys($map));
        Assert::allStringNotEmpty($map);
        $this->tableToModel = $map;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            "Replace a database-assertion table-name string with the matching Eloquent model class, when the model's table provably equals the string",
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$this->assertDatabaseHas('users', ['email' => $email]);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$this->assertDatabaseHas(\App\Models\User::class, ['email' => $email]);
CODE_SAMPLE,
                    [self::MODEL_NAMESPACE => 'App\\Models'],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [MethodCall::class, StaticCall::class];
    }

    /**
     * @param MethodCall|StaticCall $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof MethodCall && ! $node instanceof StaticCall) {
            return null;
        }

        // Literal method names are always Identifier nodes; gating on that
        // directly avoids the generic name-resolver machinery isNames()/getName()
        // run on every visited call. Match case-insensitively (as isNames() did)
        // since PHP method names are case-insensitive; the resolved name is reused
        // below (reflection lookups are themselves case-insensitive).
        if (! $node->name instanceof Identifier) {
            return null;
        }

        $methodName = $node->name->toString();
        if (! in_array(strtolower($methodName), self::ASSERTION_METHODS, true)) {
            return null;
        }

        if (! $this->isOnTestCaseReceiver($node)) {
            return null;
        }

        if (! $this->isInTestContext($node, $methodName)) {
            return null;
        }

        $args = $node->getArgs();
        if (! isset($args[0])) {
            return null;
        }

        $tableArg = $args[0]->value;
        if (! $tableArg instanceof String_) {
            return null;
        }

        $modelFqcn = $this->resolveModel($tableArg->value);
        if ($modelFqcn === null) {
            return null;
        }

        $args[0]->value = new ClassConstFetch(new FullyQualified($modelFqcn), 'class');

        return $node;
    }

    /**
     * Only the `$this->assert…()` instance form and the `self::`/`static::` static
     * form are accepted — both resolve to the enclosing class, whose test context is
     * verified separately. A bare `assertDatabaseHas(...)` function call (e.g. a
     * speculative Pest global) is intentionally not matched: there is no static test
     * context to gate it, so it could be any same-named function.
     */
    private function isOnTestCaseReceiver(MethodCall|StaticCall $node): bool
    {
        if ($node instanceof MethodCall) {
            return $node->var instanceof Variable && $this->isName($node->var, 'this');
        }

        return $node->class instanceof Name
            && in_array(strtolower($node->class->toString()), ['self', 'static'], true);
    }

    /**
     * Without confirming the enclosing class is a real test context, an unrelated
     * helper exposing its own `assertDatabaseHas(string, …)` would be rewritten.
     * Every real test carrying these assertions extends a PHPUnit TestCase (Laravel's
     * own test case included), so subclass-of-TestCase is the gate. A TestCase that
     * declares its *own* same-named assertion is calling that method, not Laravel's
     * database assertion, so it is skipped too.
     */
    private function isInTestContext(MethodCall|StaticCall $node, string $methodName): bool
    {
        $scope = $node->getAttribute(AttributeKey::SCOPE);
        if (! $scope instanceof Scope) {
            return false;
        }

        $classReflection = $scope->getClassReflection();
        if (! $classReflection instanceof ClassReflection) {
            return false;
        }

        // Every assertion in a test class resolves to the same enclosing class, so
        // the class-level reflection below is identical across them. Memoise on
        // (class, method) — a single test class with many database assertions then
        // runs the reflection once instead of once per assertion.
        $cacheKey = $classReflection->getName() . '|' . $methodName;

        return $this->testContextCache[$cacheKey] ?? $this->testContextCache[$cacheKey] = $this->computeTestContext($classReflection, $methodName);
    }

    private function computeTestContext(ClassReflection $classReflection, string $methodName): bool
    {
        if (! $this->reflectionProvider->hasClass(self::TEST_CASE_CLASS)) {
            return false;
        }

        if (! $classReflection->isSubclassOfClass($this->reflectionProvider->getClass(self::TEST_CASE_CLASS))) {
            return false;
        }

        $nativeReflection = $classReflection->getNativeReflection();

        // The matched assertion must *resolve* to Laravel's own implementation. If it
        // is absent (e.g. magic `__call` dispatch) or declared in userland, it is not
        // the framework database assertion — its first argument may be a plain string
        // it treats literally, so converting it could change behaviour. Skip.
        if (! $nativeReflection->hasMethod($methodName)
            || ! in_array($nativeReflection->getMethod($methodName)->getDeclaringClass()->getName(), self::FRAMEWORK_ASSERTION_PROVIDERS, true)
        ) {
            return false;
        }

        // The table/connection helpers it dispatches to must likewise be Laravel's; a
        // userland override of any present one could make the model-class form and the
        // original string form diverge at runtime.
        foreach (self::DATABASE_HELPER_METHODS as $helper) {
            if ($nativeReflection->hasMethod($helper)
                && ! in_array($nativeReflection->getMethod($helper)->getDeclaringClass()->getName(), self::FRAMEWORK_ASSERTION_PROVIDERS, true)
            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * Resolve the literal table name to a model FQCN, or null to leave the string
     * untouched. Verify-or-skip: only return a model whose own resolved table
     * provably equals the literal — every uncertainty becomes a missed conversion,
     * never a wrong one. The configured map only selects the candidate; the same
     * verification still applies.
     */
    private function resolveModel(string $table): ?string
    {
        $candidate = $this->tableToModel[$table]
            ?? rtrim($this->modelNamespace, '\\') . '\\' . Str::studly(Str::singular($table));
        $candidate = ltrim($candidate, '\\');

        if (! $this->reflectionProvider->hasClass($candidate)) {
            return null;
        }

        if (! $this->reflectionProvider->hasClass(self::MODEL_CLASS)) {
            return null;
        }

        $classReflection = $this->reflectionProvider->getClass($candidate);
        if (! $classReflection->isSubclassOfClass($this->reflectionProvider->getClass(self::MODEL_CLASS))) {
            return null;
        }

        if (! $this->tableMatches($classReflection, $candidate, $table)) {
            return null;
        }

        // Passing a model also selects its connection when the assertion's own
        // connection argument is null; a model with a non-default connection would
        // move the assertion to a different connection. Only convert when the model's
        // connection is provably the default.
        if (! $this->hasDefaultConnection($classReflection)) {
            return null;
        }

        // Laravel instantiates the model before reading its table/connection, so a
        // constructor or trait initializer could mutate either without touching the
        // statically-checked defaults/overrides. Skip any model that could.
        if (! $this->hasInertConstruction($classReflection)) {
            return null;
        }

        return $candidate;
    }

    /**
     * Mirror Eloquent's Model::getTable() —
     * `$this->table ?? Str::snake(Str::pluralStudly(class_basename($this)))` — and
     * confirm it equals the literal. Skip when getTable() is overridden (incl. via a
     * trait, which PHP flattens onto the model) because the runtime table is then
     * not statically knowable.
     */
    private function tableMatches(ClassReflection $classReflection, string $fqcn, string $table): bool
    {
        $nativeReflection = $classReflection->getNativeReflection();

        if (! $nativeReflection->hasMethod('getTable')
            || $nativeReflection->getMethod('getTable')->getDeclaringClass()->getName() !== self::MODEL_CLASS
        ) {
            return false;
        }

        $declared = $nativeReflection->hasProperty('table')
            ? $nativeReflection->getProperty('table')->getDefaultValue()
            : null;

        // Mirror Model::getTable() exactly: `$this->table ?? convention`. Any string
        // default — including '' — is the real table; only null falls to convention.
        $resolved = is_string($declared)
            ? $declared
            : Str::snake(Str::pluralStudly($this->classBasename($fqcn)));

        return $resolved === $table;
    }

    /**
     * The connection must be provably the default (null) and not dynamically
     * overridden — otherwise the model would carry its own connection into the
     * assertion, which the original table-string form did not.
     */
    private function hasDefaultConnection(ClassReflection $classReflection): bool
    {
        $nativeReflection = $classReflection->getNativeReflection();

        if ($nativeReflection->hasMethod('getConnectionName')
            && $nativeReflection->getMethod('getConnectionName')->getDeclaringClass()->getName() !== self::MODEL_CLASS
        ) {
            return false;
        }

        $connection = $nativeReflection->hasProperty('connection')
            ? $nativeReflection->getProperty('connection')->getDefaultValue()
            : null;

        return $connection === null;
    }

    /**
     * Eloquent's `newModelFor()` constructs the model before resolving its table or
     * connection, running the user constructor and every `initialize{Trait}()` hook.
     * Such a hook can call `setTable()`/`setConnection()` while leaving `getTable()`,
     * `getConnectionName()`, and the `$table`/`$connection` defaults untouched — past
     * every static check above. So skip any model that declares its own constructor
     * or carries an `initialize*` trait initializer; their construction is not inert.
     */
    private function hasInertConstruction(ClassReflection $classReflection): bool
    {
        $nativeReflection = $classReflection->getNativeReflection();

        if ($nativeReflection->hasMethod('__construct')
            && $nativeReflection->getMethod('__construct')->getDeclaringClass()->getName() !== self::MODEL_CLASS
        ) {
            return false;
        }

        foreach ($nativeReflection->getMethods() as $method) {
            if ($method->getDeclaringClass()->getName() === self::MODEL_CLASS) {
                continue;
            }

            if (str_starts_with(strtolower($method->getName()), 'initialize')) {
                return false;
            }
        }

        return true;
    }

    private function classBasename(string $fqcn): string
    {
        $position = strrpos($fqcn, '\\');

        return $position === false ? $fqcn : substr($fqcn, $position + 1);
    }
}
