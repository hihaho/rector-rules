<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\UnaryMinus;
use PhpParser\Node\Expr\UnaryPlus;
use PhpParser\Node\Identifier;
use PhpParser\Node\Scalar;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\ParameterReflection;
use PHPStan\Type\Type;
use PHPStan\Type\TypeCombinator;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\NodeTypeResolver\PHPStan\ParametersAcceptorSelectorVariantsWrapper;
use Rector\Rector\AbstractRector;
use Rector\Reflection\ReflectionResolver;
use Rector\ValueObject\PhpVersion;
use Rector\VersionBonding\Contract\MinPhpVersionInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveDefaultValuedArgumentRector\RemoveDefaultValuedArgumentRectorTest
 */
final class RemoveDefaultValuedArgumentRector extends AbstractRector implements ConfigurableRectorInterface, MinPhpVersionInterface
{
    public const string FIRST_PARTY_NAMESPACES = 'first_party_namespaces';

    public const string CASCADE_DROP = 'cascade_drop';

    public const string EXCLUDE_CALLS = 'exclude_calls';

    /**
     * Gates the *cascade* drop only: renaming the arguments after a dropped
     * mid-positional default couples to the callee's parameter names, which is safe
     * only for signatures you control. A *pure* drop (a named default, or a trailing
     * positional default) couples only to the default value and fires on any callee.
     *
     * @var list<string>
     */
    private const array DEFAULT_FIRST_PARTY_NAMESPACES = ['App\\'];

    /** @var list<string> */
    private array $firstPartyNamespaces = self::DEFAULT_FIRST_PARTY_NAMESPACES;

    /**
     * When enabled, a mid-positional default (one followed by a positional argument)
     * is dropped by naming the arguments that follow it. Off by default and first-party
     * only: it produces broader diffs and depends on parameter names.
     */
    private bool $cascadeDrop = false;

    /**
     * Calls the rule must never touch, keyed by class FQN → method names. For methods
     * whose return value is serialized in an argument-count-sensitive way — e.g. a
     * middleware factory whose result is stringified into a route signature
     * (`ThrottleRequests::with(60, 1)` → the signature `throttle:60,1`) — dropping a
     * default that equals its parameter default still changes the serialized string.
     * The parser cannot detect that coupling, so this is an explicit opt-out. Matched
     * against the resolved method's declaring class (and its subclasses); method names
     * are compared case-insensitively.
     *
     * @var array<string, list<string>>  method names stored lowercased
     */
    private array $excludedCalls = [];

    public function __construct(
        private readonly ReflectionResolver $reflectionResolver,
    ) {}

    public function configure(array $configuration): void
    {
        $namespaces = $configuration[self::FIRST_PARTY_NAMESPACES] ?? self::DEFAULT_FIRST_PARTY_NAMESPACES;
        Assert::isArray($namespaces);
        Assert::allStringNotEmpty($namespaces);
        $this->firstPartyNamespaces = array_values($namespaces);

        $cascade = $configuration[self::CASCADE_DROP] ?? false;
        Assert::boolean($cascade);
        $this->cascadeDrop = $cascade;

        $excluded = $configuration[self::EXCLUDE_CALLS] ?? [];
        Assert::isArray($excluded);
        $normalized = [];
        foreach ($excluded as $class => $methods) {
            Assert::stringNotEmpty($class);
            Assert::isArray($methods);
            Assert::allStringNotEmpty($methods);
            $normalized[ltrim($class, '\\')] = array_map(strtolower(...), array_values($methods));
        }

        $this->excludedCalls = $normalized;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Drop an argument whose value equals the callee parameter default, naming following positionals when needed',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$user->factory()->withPosts(callback: null, times: 2);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$user->factory()->withPosts(times: 2);
CODE_SAMPLE,
                    [self::FIRST_PARTY_NAMESPACES => ['App\\']],
                ),
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$factory->attach($user, [], $relationship);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$factory->attach($user, relationship: $relationship);
CODE_SAMPLE,
                    [self::FIRST_PARTY_NAMESPACES => ['App\\'], self::CASCADE_DROP => true],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [MethodCall::class, StaticCall::class, New_::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof MethodCall && ! $node instanceof StaticCall && ! $node instanceof New_) {
            return null;
        }

        // A first-class callable ($obj->m(...), C::m(...), new C(...)) carries no
        // argument to drop, and CallLike::getArgs() asserts against being called on
        // one — bail before it fatals.
        if ($node->isFirstClassCallable()) {
            return null;
        }

        $args = $node->getArgs();

        // Cheap pre-gate: only a named argument or a literal positional argument can
        // ever equal a constant default, so a call of pure variable arguments is bailed
        // before the expensive callee reflection.
        if (! $this->hasDroppableCandidate($args)) {
            return null;
        }

        $methodReflection = $this->resolveCalleeReflection($node);
        if (! $methodReflection instanceof MethodReflection) {
            return null;
        }

        if ($this->excludedCalls !== [] && $this->isExcludedCall($methodReflection)) {
            return null;
        }

        $scope = $node->getAttribute(AttributeKey::SCOPE);
        if (! $scope instanceof Scope) {
            return null;
        }

        $parameters = ParametersAcceptorSelectorVariantsWrapper::select($methodReflection, $node, $scope)->getParameters();

        [$removeIndexes, $renames] = $this->resolveDrops($args, $parameters, $this->isFirstParty($methodReflection));
        if ($removeIndexes === []) {
            return null;
        }

        foreach ($renames as $index => $parameterName) {
            $args[$index]->name = new Identifier($parameterName);
        }

        $remove = array_fill_keys($removeIndexes, true);
        $node->args = array_values(array_filter(
            $args,
            static fn (int $index): bool => ! isset($remove[$index]),
            ARRAY_FILTER_USE_KEY,
        ));

        return $node;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersion::PHP_80;
    }

    /**
     * Decide which argument indexes to drop and which to rename to keep the call valid.
     *
     * @param  Arg[]  $args
     * @param  array<int, ParameterReflection>  $parameters
     * @return array{0: list<int>, 1: array<int, string>} [indexes to remove, index => name to assign]
     */
    private function resolveDrops(array $args, array $parameters, bool $firstParty): array
    {
        $remove = [];

        // An unpacked argument (...$x) makes positions unknowable — never touch the call.
        foreach ($args as $arg) {
            if ($arg->unpack) {
                return [[], []];
            }
        }

        // Positional arguments precede named ones in valid PHP, so a positional at
        // arg index i targets parameter i.
        $positionalIndexes = [];
        foreach ($args as $index => $arg) {
            if (! $arg->name instanceof Identifier) {
                $positionalIndexes[] = $index;
            }
        }

        // Step A — an already-named argument equal to its default is always droppable
        // (named arguments are order-independent), on any callee including vendor.
        foreach ($args as $index => $arg) {
            if (! $arg->name instanceof Identifier) {
                continue;
            }

            $parameter = $this->parameterByName($parameters, $arg->name->toString());
            if ($parameter instanceof ParameterReflection && $this->argEqualsDefault($arg, $parameter)) {
                $remove[$index] = true;
            }
        }

        $droppablePositional = $this->resolveDroppablePositional($args, $positionalIndexes, $parameters);

        if ($firstParty && $this->cascadeDrop) {
            return $this->resolveCascadeDrops($remove, $positionalIndexes, $droppablePositional, $parameters);
        }

        // Step B (default) — drop the trailing positional defaults, right to left, until
        // the first non-droppable positional. Safe on any callee: only named arguments
        // can follow a positional, so removing the last positional never reorders.
        for ($position = count($positionalIndexes) - 1; $position >= 0; --$position) {
            $argIndex = $positionalIndexes[$position];
            if (! $droppablePositional[$argIndex]) {
                break;
            }

            $remove[$argIndex] = true;
        }

        return [array_keys($remove), []];
    }

    /**
     * Map each positional arg index to whether its default is droppable.
     *
     * A default is load-bearing once an *earlier optional positional* argument was
     * overridden (passed a non-default value): dropping it strands that override —
     * e.g. has($relation, '=', 1), where '=' overrides the '>=' default, so the trailing
     * default 1 reads as the operator's operand and dropping it leaves '=' dangling.
     * Required arguments never count as overrides (no default to deviate from). Both the
     * trailing and cascade paths consume this map, so the guard covers both; the
     * named-argument path is unaffected (named args are order-independent, never stranded).
     *
     * @param  Arg[]  $args
     * @param  list<int>  $positionalIndexes
     * @param  array<int, ParameterReflection>  $parameters
     * @return array<int, bool>  keyed by arg index
     */
    private function resolveDroppablePositional(array $args, array $positionalIndexes, array $parameters): array
    {
        $droppablePositional = [];
        $sawOverride = false;
        foreach ($positionalIndexes as $position => $argIndex) {
            $parameter = $parameters[$position] ?? null;
            $resolvable = $parameter instanceof ParameterReflection && ! $parameter->isVariadic();
            $isDroppable = $resolvable && $this->argEqualsDefault($args[$argIndex], $parameter);

            $droppablePositional[$argIndex] = $isDroppable && ! $sawOverride;

            if ($resolvable && $parameter->isOptional() && ! $isDroppable) {
                $sawOverride = true;
            }
        }

        return $droppablePositional;
    }

    /**
     * Cascade: drop every droppable positional default and name the positional
     * arguments kept after the first removal (PHP forbids a positional after a named
     * one). Aborts the whole call unchanged if a kept follower cannot be named.
     *
     * @param  array<true>  $remove  removals already collected (named-arg drops), keyed by arg index
     * @param  list<int>  $positionalIndexes
     * @param  array<bool>  $droppablePositional  keyed by arg index
     * @param  array<int, ParameterReflection>  $parameters
     * @return array{0: list<int>, 1: array<int, string>}
     */
    private function resolveCascadeDrops(array $remove, array $positionalIndexes, array $droppablePositional, array $parameters): array
    {
        $removedPositions = [];
        foreach ($positionalIndexes as $argIndex) {
            if ($droppablePositional[$argIndex]) {
                $remove[$argIndex] = true;
                $removedPositions[] = $argIndex;
            }
        }

        if ($removedPositions === []) {
            return [array_keys($remove), []];
        }

        $firstRemoved = min($removedPositions);
        $renames = [];
        foreach ($positionalIndexes as $position => $argIndex) {
            if ($argIndex <= $firstRemoved) {
                continue;
            }

            if (isset($remove[$argIndex])) {
                continue;
            }

            $parameter = $parameters[$position] ?? null;
            if (! $parameter instanceof ParameterReflection || $parameter->isVariadic()) {
                // A kept positional that cannot be named would be left after a named
                // argument — abort rather than emit invalid PHP.
                return [[], []];
            }

            $renames[$argIndex] = $parameter->getName();
        }

        return [array_keys($remove), $renames];
    }

    private function argEqualsDefault(Arg $arg, ParameterReflection $parameter): bool
    {
        // Only a constant literal is droppable. Comparing the argument's *type* alone
        // would also drop a call/variable that merely resolves to the default value
        // (e.g. `cache(ttl: sideEffect())` inferred as `null`), silently removing the
        // expression's evaluation and any side effect. A literal has no side effect.
        if (! $this->isConstantLiteralValue($arg->value)) {
            return false;
        }

        $default = $parameter->getDefaultValue();
        if (! $default instanceof Type || ! $this->isComparableConstantDefault($default)) {
            return false;
        }

        // Type equality is strict on both value and kind: ConstantBooleanType(false)
        // never equals ConstantIntegerType(0), so 0 is not dropped against a `false`
        // default.
        return $default->equals($this->getType($arg->value));
    }

    /**
     * True for a side-effect-free constant literal: a bool/null `ConstFetch`, a scalar,
     * a class constant, an empty array, or one of those behind a single unary `-`/`+`
     * (`-1` parses as `UnaryMinus` wrapping a scalar, not a bare scalar).
     */
    private function isConstantLiteralValue(Expr $value): bool
    {
        if ($value instanceof UnaryMinus || $value instanceof UnaryPlus) {
            $value = $value->expr;
        }

        return $value instanceof ConstFetch
            || $value instanceof Scalar
            || $value instanceof ClassConstFetch
            || ($value instanceof Array_ && $value->items === []);
    }

    /**
     * A default droppable only when it is a single, statically-known constant: null, a
     * scalar literal (a class constant resolving to a scalar counts, e.g. `= self::LIMIT`),
     * or an empty array. A computed-expression default — and an enum-case object default,
     * which PHPStan does not reflect back as a comparable constant — is never droppable.
     */
    private function isComparableConstantDefault(Type $type): bool
    {
        if ($type->isNull()->yes() || $type->isConstantScalarValue()->yes()) {
            return true;
        }

        foreach ($type->getConstantArrays() as $constantArray) {
            if ($constantArray->getKeyTypes() === []) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param  Arg[]  $args
     */
    private function hasDroppableCandidate(array $args): bool
    {
        foreach ($args as $arg) {
            if ($arg->unpack) {
                continue;
            }

            // A named argument or a constant-literal positional may equal a default; a
            // call of pure variable/expression positionals never does, so it is bailed
            // before the expensive callee reflection.
            if ($arg->name instanceof Identifier || $this->isConstantLiteralValue($arg->value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param  array<int, ParameterReflection>  $parameters
     */
    private function parameterByName(array $parameters, string $name): ?ParameterReflection
    {
        foreach ($parameters as $parameter) {
            if ($parameter->getName() === $name) {
                return $parameter;
            }
        }

        return null;
    }

    /**
     * Resolve the called method / constructor. For an instance call the receiver type
     * has its null stripped first, so a nullable receiver still resolves to a single
     * class. Mirrors FirstPartyFlagArgumentToNamedRector's resolver.
     *
     * @param  MethodCall|StaticCall|New_  $node
     */
    private function resolveCalleeReflection(Node $node): ?MethodReflection
    {
        if ($node instanceof New_) {
            return $this->reflectionResolver->resolveMethodReflectionFromNew($node);
        }

        if ($node instanceof StaticCall) {
            return $this->reflectionResolver->resolveMethodReflectionFromStaticCall($node);
        }

        $callerType = TypeCombinator::removeNull($this->getType($node->var));
        $classReflections = $callerType->getObjectClassReflections();
        if (count($classReflections) !== 1) {
            return null;
        }

        $methodName = $this->getName($node->name);
        if ($methodName === null) {
            return null;
        }

        $scope = $node->getAttribute(AttributeKey::SCOPE);
        if (! $scope instanceof Scope) {
            return null;
        }

        $classReflection = $classReflections[0];

        return $classReflection->hasMethod($methodName) ? $classReflection->getMethod($methodName, $scope) : null;
    }

    private function isExcludedCall(MethodReflection $methodReflection): bool
    {
        $methodName = strtolower($methodReflection->getName());
        $declaringClass = $methodReflection->getDeclaringClass();

        foreach ($this->excludedCalls as $class => $methods) {
            if (! in_array($methodName, $methods, true)) {
                continue;
            }

            // is-a match: the configured class is the declaring class, an ancestor, or
            // an implemented interface — so excluding a base covers its subclasses.
            if ($declaringClass->is($class)) {
                return true;
            }
        }

        return false;
    }

    private function isFirstParty(MethodReflection $methodReflection): bool
    {
        $declaringClass = $methodReflection->getDeclaringClass()->getName();

        foreach ($this->firstPartyNamespaces as $namespace) {
            if (str_starts_with($declaringClass, $namespace)) {
                return true;
            }
        }

        return false;
    }
}
