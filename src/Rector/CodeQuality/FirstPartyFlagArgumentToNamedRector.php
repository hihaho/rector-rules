<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use Hihaho\RectorRules\Rector\CodeQuality\Concerns\NamesFlagArguments;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\ParameterReflection;
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
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\FirstPartyFlagArgumentToNamedRectorTest
 */
final class FirstPartyFlagArgumentToNamedRector extends AbstractRector implements ConfigurableRectorInterface, MinPhpVersionInterface
{
    use NamesFlagArguments;

    public const string FIRST_PARTY_NAMESPACES = 'first_party_namespaces';

    public const string CASCADE_TRAILING_ARGS = 'cascade_trailing_args';

    public const string NAME_PRECEDING_POSITIONALS = 'name_preceding_positionals';

    /**
     * Naming an argument couples the call site to the callee's *parameter name*.
     * That is safe only for code whose signatures you control — never for vendor
     * methods, whose parameter names can change under semver without notice.
     * Defaults to the conventional Laravel application root.
     *
     * @var list<string>
     */
    private const array DEFAULT_FIRST_PARTY_NAMESPACES = ['App\\'];

    /** @var list<string> */
    private array $firstPartyNamespaces = self::DEFAULT_FIRST_PARTY_NAMESPACES;

    /**
     * When enabled, a bare flag that is not the last argument is still named by
     * also naming the positional arguments that follow it (PHP forbids a positional
     * argument after a named one). Off by default: it produces broader diffs — the
     * trailing non-flag arguments get named purely to satisfy that ordering rule.
     */
    private bool $cascadeTrailingArgs = false;

    /**
     * When enabled, a call that already carries at least one named argument has its
     * leading positional arguments named too (they all precede the first named one in
     * valid PHP). Off by default and first-party only — it names non-flag positionals
     * purely for readability, which broadens diffs.
     */
    private bool $namePrecedingPositionals = false;

    public function __construct(
        private readonly ReflectionResolver $reflectionResolver,
    ) {}

    public function configure(array $configuration): void
    {
        $namespaces = $configuration[self::FIRST_PARTY_NAMESPACES] ?? self::DEFAULT_FIRST_PARTY_NAMESPACES;
        Assert::isArray($namespaces);
        Assert::allStringNotEmpty($namespaces);
        $this->firstPartyNamespaces = array_values($namespaces);

        $cascade = $configuration[self::CASCADE_TRAILING_ARGS] ?? false;
        Assert::boolean($cascade);
        $this->cascadeTrailingArgs = $cascade;

        $namePreceding = $configuration[self::NAME_PRECEDING_POSITIONALS] ?? false;
        Assert::boolean($namePreceding);
        $this->namePrecedingPositionals = $namePreceding;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Name opaque bool/null flag arguments on a first-party method, static, or constructor call',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$store->configure($platform, false, isBoolean: true);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$store->configure($platform, setDefaultNullValue: false, isBoolean: true);
CODE_SAMPLE,
                    [self::FIRST_PARTY_NAMESPACES => ['App\\']],
                ),
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$store->loadCount(true, $start, $end);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$store->loadCount(hasStarted: true, start: $start, end: $end);
CODE_SAMPLE,
                    [self::FIRST_PARTY_NAMESPACES => ['App\\'], self::CASCADE_TRAILING_ARGS => true],
                ),
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$store->paginate(1, perPage: 50);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$store->paginate(page: 1, perPage: 50);
CODE_SAMPLE,
                    [self::FIRST_PARTY_NAMESPACES => ['App\\'], self::NAME_PRECEDING_POSITIONALS => true],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [MethodCall::class, StaticCall::class, New_::class];
    }

    /**
     * @param MethodCall|StaticCall|New_ $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof MethodCall && ! $node instanceof StaticCall && ! $node instanceof New_) {
            return null;
        }

        // A first-class callable ($obj->m(...), C::m(...)) carries no flag
        // argument to name, and CallLike::getArgs() asserts against being called
        // on one — bail before it fatals.
        if ($node->isFirstClassCallable()) {
            return null;
        }

        $args = $node->getArgs();

        // Cheap pre-gate: bail unless there is a trailing flag to rename, or — when the
        // preceding-positionals knob is on — a named argument with a positional before
        // it. This keeps the expensive callee reflection off the hot path for the common
        // shapes (a call with no flag and nothing to name).
        $hasFlagWork = $this->hasFlagInTrailingRun($args, $this->cascadeTrailingArgs);
        $hasPrecedingWork = $this->namePrecedingPositionals && $this->hasPrecedingPositional($args);
        if (! $hasFlagWork && ! $hasPrecedingWork) {
            return null;
        }

        $methodReflection = $this->resolveCalleeReflection($node);

        // Unresolved callee (dynamic name, closure, __call magic, unknown type):
        // skip rather than guess at a parameter name.
        if (! $methodReflection instanceof MethodReflection) {
            return null;
        }

        if (! $this->isFirstParty($methodReflection)) {
            return null;
        }

        $scope = $node->getAttribute(AttributeKey::SCOPE);
        if (! $scope instanceof Scope) {
            return null;
        }

        $parameters = ParametersAcceptorSelectorVariantsWrapper::select($methodReflection, $node, $scope)->getParameters();

        $changed = false;
        if ($hasFlagWork) {
            $changed = $this->nameFlagArguments($args, $parameters, $this->cascadeTrailingArgs);
        }

        // Gate on $hasPrecedingWork (computed on the *original* args), not the post
        // flag-naming state: a call that was fully positional and only became "mixed"
        // because this rule just named its trailing flag is a flag call, not a
        // mixed call — naming its leading positionals too would over-broaden the knob.
        if ($hasPrecedingWork) {
            $changed = $this->namePrecedingPositionalArguments($args, $parameters) || $changed;
        }

        return $changed ? $node : null;
    }

    /**
     * Cheap pre-gate for {@see namePrecedingPositionalArguments()}: true only when the
     * call has at least one named argument and at least one positional argument (which
     * must precede it). Avoids the reflection cost for all-positional / all-named calls.
     *
     * @param  array<Arg>  $args
     */
    private function hasPrecedingPositional(array $args): bool
    {
        $hasNamed = false;
        $hasPositional = false;
        foreach ($args as $arg) {
            if ($arg->name instanceof Identifier) {
                $hasNamed = true;
            } elseif (! $arg->unpack) {
                $hasPositional = true;
            }
        }

        return $hasNamed && $hasPositional;
    }

    /**
     * Name the positional arguments that precede the first named one (in valid PHP, all
     * of them). A no-op unless the call already carries a named argument, so an
     * all-positional call is never touched. The whole call is left alone if any
     * argument is unpacked — naming a positional before a `...$spread` would leave a
     * positional spread after a named argument, a PHP fatal. A variadic/unknown target
     * parameter is skipped.
     *
     * @param  array<Arg>  $args
     * @param  array<int, ParameterReflection>  $parameters
     */
    private function namePrecedingPositionalArguments(array $args, array $parameters): bool
    {
        $hasNamed = false;
        foreach ($args as $arg) {
            if ($arg->unpack) {
                return false;
            }

            if ($arg->name instanceof Identifier) {
                $hasNamed = true;
            }
        }

        if (! $hasNamed) {
            return false;
        }

        $changed = false;
        foreach ($args as $index => $arg) {
            if ($arg->name instanceof Identifier) {
                continue;
            }

            $parameter = $parameters[$index] ?? null;
            if (! $parameter instanceof ParameterReflection) {
                continue;
            }

            if ($parameter->isVariadic()) {
                continue;
            }

            $arg->name = new Identifier($parameter->getName());
            $changed = true;
        }

        return $changed;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersion::PHP_80;
    }

    /**
     * Resolve the called method / constructor. For an instance call the receiver
     * type has its null stripped first: a nullable receiver (`Foo|null`, the
     * common shape of a docblock-typed property or a nullable return) otherwise
     * resolves to no single class and the call is silently skipped.
     *
     * @param MethodCall|StaticCall|New_ $node
     */
    private function resolveCalleeReflection(Node $node): ?MethodReflection
    {
        if ($node instanceof New_) {
            return $this->reflectionResolver->resolveMethodReflectionFromNew($node);
        }

        if ($node instanceof StaticCall) {
            return $this->reflectionResolver->resolveMethodReflectionFromStaticCall($node);
        }

        // Strip null before resolving the receiver class: a nullable receiver
        // resolves to more than one type member, so the single-class lookup below
        // would otherwise return nothing and the call would be skipped.
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
