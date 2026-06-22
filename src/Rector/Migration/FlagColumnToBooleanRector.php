<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Migration;

use Hihaho\RectorRules\Rector\Migration\Concerns\ChecksMigrationContext;
use Illuminate\Database\Schema\Blueprint;
use PhpParser\Node;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Expression;
use PHPStan\Type\ObjectType;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\PhpParser\Node\Value\ValueResolver;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Migration\FlagColumnToBooleanRector\FlagColumnToBooleanRectorTest
 */
final class FlagColumnToBooleanRector extends AbstractRector implements ConfigurableRectorInterface
{
    use ChecksMigrationContext;

    /**
     * Must be set to true to enable the rule. `tinyInteger`↔`boolean` is only
     * storage-identical on MySQL/MariaDB; on PostgreSQL it is an incompatible type
     * change. Rector cannot introspect the DB driver, so adoption is an explicit
     * opt-in. Off by default — the rule is a no-op until set.
     */
    public const string CONFIRM_MYSQL_COMPATIBLE = 'confirm_mysql_compatible';

    public const string NAME_PREFIXES = 'name_prefixes';

    public const string NAME_SUFFIXES = 'name_suffixes';

    /** @var list<string> */
    private const array DEFAULT_NAME_PREFIXES = [
        'is_', 'has_', 'should_', 'can_', 'are_',
        'allow_', 'allows_', 'enable_', 'enables_',
        'require_', 'requires_', 'disable_', 'disables_',
    ];

    /** @var list<string> */
    private const array DEFAULT_NAME_SUFFIXES = ['_enabled', '_disabled', '_required'];

    /**
     * Only signed `tinyInteger` (`tinyint`) is converted. `unsignedTinyInteger`
     * (0-255) is intentionally excluded: a misclassified flag-named multi-valued
     * unsigned column would lose its 128-255 range when narrowed to a signed
     * `tinyint(1)`, whereas signed `tinyInteger`→`boolean` is storage-identical.
     *
     * @var list<string>
     */
    private const array TYPE_METHODS = ['tinyinteger'];

    private bool $confirmMysqlCompatible = false;

    /** @var list<string> */
    private array $namePrefixes = self::DEFAULT_NAME_PREFIXES;

    /** @var list<string> */
    private array $nameSuffixes = self::DEFAULT_NAME_SUFFIXES;

    public function __construct(
        private readonly ValueResolver $valueResolver,
    ) {}

    public function configure(array $configuration): void
    {
        // Strict opt-in: only a literal `true` enables the rule. Casting would let
        // 'false'/'postgres'/any truthy string silently enable a non-MySQL rewrite.
        $confirm = $configuration[self::CONFIRM_MYSQL_COMPATIBLE] ?? false;
        Assert::boolean($confirm);
        $this->confirmMysqlCompatible = $confirm;

        // Non-empty: an empty prefix/suffix would match every column name and
        // disable the flag-name safety gate.
        $prefixes = $configuration[self::NAME_PREFIXES] ?? self::DEFAULT_NAME_PREFIXES;
        Assert::isArray($prefixes);
        Assert::allStringNotEmpty($prefixes);
        $this->namePrefixes = array_values($prefixes);

        $suffixes = $configuration[self::NAME_SUFFIXES] ?? self::DEFAULT_NAME_SUFFIXES;
        Assert::isArray($suffixes);
        Assert::allStringNotEmpty($suffixes);
        $this->nameSuffixes = array_values($suffixes);
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Convert flag-style tinyInteger migration columns to boolean (MySQL only, opt-in)',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$table->tinyInteger('is_published')->default(1);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$table->boolean('is_published')->default(true);
CODE_SAMPLE,
                    [self::CONFIRM_MYSQL_COMPATIBLE => true],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [Expression::class];
    }

    /**
     * @param Expression $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $this->confirmMysqlCompatible) {
            return null;
        }

        if (! $this->isInMigrationsDirectory()) {
            return null;
        }

        if (! $node->expr instanceof MethodCall) {
            return null;
        }

        // Walk down the fluent chain (outermost → innermost). The innermost call,
        // whose receiver is the $table Blueprint, is the column-type call.
        $calls = [];
        $cursor = $node->expr;
        while ($cursor instanceof MethodCall) {
            $calls[] = $cursor;
            $cursor = $cursor->var;
        }

        $typeCall = $calls[count($calls) - 1];

        if (! $this->isFlagColumnTypeCall($typeCall)) {
            return null;
        }

        $defaultCall = $this->resolveConvertibleDefaultCall($calls);
        if (! $defaultCall instanceof MethodCall) {
            return null;
        }

        $typeCall->name = new Identifier('boolean');
        $this->normaliseDefaultLiteral($defaultCall);

        return $node;
    }

    private function isFlagColumnTypeCall(MethodCall $typeCall): bool
    {
        if (! $typeCall->name instanceof Identifier || ! in_array(strtolower($typeCall->name->toString()), self::TYPE_METHODS, true)) {
            return false;
        }

        if (! $this->isObjectType($typeCall->var, new ObjectType(Blueprint::class))) {
            return false;
        }

        $args = $typeCall->getArgs();

        // `boolean()` accepts only the column name. A 2nd argument on the
        // tinyInteger call is Laravel's `$autoIncrement` flag (an auto-increment
        // column is never a boolean) or `$unsigned`; keeping it would emit an
        // argument `boolean()` does not declare. Require exactly one argument —
        // this also skips every auto-increment form (`true`, `1`, named, falsy).
        if (count($args) !== 1) {
            return false;
        }

        $columnNameExpr = $args[0]->value ?? null;

        // Accept a string literal or a class constant (e.g. SomeModel::ENABLE_X)
        // resolving to a string. Anything else (variable, method call) is too
        // dynamic to gate on safely and is skipped.
        if ($columnNameExpr instanceof String_) {
            $columnName = $columnNameExpr->value;
        } elseif ($columnNameExpr instanceof ClassConstFetch) {
            $columnName = $this->valueResolver->getValue($columnNameExpr);
        } else {
            return false;
        }

        if (! is_string($columnName)) {
            return false;
        }

        return $this->matchesFlagPattern($columnName);
    }

    /**
     * The chain must contain a `->default()` with a 0/1/true/false literal, and no
     * `->change()` or `->autoIncrement()`. Returns that default call, or null to skip.
     *
     * @param list<MethodCall> $calls
     */
    private function resolveConvertibleDefaultCall(array $calls): ?MethodCall
    {
        $defaultCalls = [];

        foreach ($calls as $call) {
            if (! $call->name instanceof Identifier) {
                continue;
            }

            $name = strtolower($call->name->toString());

            if ($name === 'change' || $name === 'autoincrement') {
                return null;
            }

            if ($name === 'default') {
                $defaultCalls[] = $call;
            }
        }

        // Exactly one default required: zero is defaultless (too weak); more than
        // one is ambiguous (a later default could be the non-boolean effective one,
        // e.g. ->default(1)->default(2)) — skip rather than guess.
        if (count($defaultCalls) !== 1) {
            return null;
        }

        $defaultCall = $defaultCalls[0];

        $defaultValue = $defaultCall->getArgs()[0]->value ?? null;
        if ($defaultValue === null) {
            return null;
        }

        $isBooleanish = ($defaultValue instanceof Int_ && in_array($defaultValue->value, [0, 1], true))
            || $this->isBoolConst($defaultValue, true)
            || $this->isBoolConst($defaultValue, false);

        return $isBooleanish ? $defaultCall : null;
    }

    private function normaliseDefaultLiteral(MethodCall $defaultCall): void
    {
        $arg = $defaultCall->getArgs()[0] ?? null;

        // Only an integer 0/1 needs rewriting; a `true`/`false` default is already
        // in the target form and is left as-is.
        if ($arg === null || ! $arg->value instanceof Int_) {
            return;
        }

        $arg->value = new ConstFetch(new Name($arg->value->value === 1 ? 'true' : 'false'));
    }

    private function isBoolConst(Node $node, bool $expected): bool
    {
        return $node instanceof ConstFetch
            && $node->name->toLowerString() === ($expected ? 'true' : 'false');
    }

    private function matchesFlagPattern(string $columnName): bool
    {
        foreach ($this->namePrefixes as $prefix) {
            if (str_starts_with($columnName, $prefix)) {
                return true;
            }
        }

        foreach ($this->nameSuffixes as $suffix) {
            if (str_ends_with($columnName, $suffix)) {
                return true;
            }
        }

        return false;
    }
}
