<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use Hihaho\RectorRules\Rector\CodeQuality\Concerns\ResolvesNativeFirstPartyCallee;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\NullsafeMethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ExtendedMethodReflection;
use PHPStan\Reflection\ParameterReflection;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\NodeTypeResolver\PHPStan\ParametersAcceptorSelectorVariantsWrapper;
use Rector\Rector\AbstractRector;
use Rector\ValueObject\PhpVersion;
use Rector\VersionBonding\Contract\MinPhpVersionInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\FirstPartyMinArgumentsToNamedRectorTest
 */
final class FirstPartyMinArgumentsToNamedRector extends AbstractRector implements ConfigurableRectorInterface, MinPhpVersionInterface
{
    use ResolvesNativeFirstPartyCallee;

    public const string FIRST_PARTY_NAMESPACES = 'first_party_namespaces';

    public const string MIN_ARGUMENTS = 'min_arguments';

    /** @var list<string> */
    private const array DEFAULT_FIRST_PARTY_NAMESPACES = ['App\\'];

    private const int DEFAULT_MIN_ARGUMENTS = 3;

    /** @var list<string> */
    private array $firstPartyNamespaces = self::DEFAULT_FIRST_PARTY_NAMESPACES;

    private int $minArguments = self::DEFAULT_MIN_ARGUMENTS;

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function configure(array $configuration): void
    {
        $namespaces = $configuration[self::FIRST_PARTY_NAMESPACES] ?? self::DEFAULT_FIRST_PARTY_NAMESPACES;
        Assert::isArray($namespaces);
        Assert::allStringNotEmpty($namespaces);
        $this->firstPartyNamespaces = array_values($namespaces);

        $minArguments = $configuration[self::MIN_ARGUMENTS] ?? self::DEFAULT_MIN_ARGUMENTS;
        Assert::integer($minArguments);
        Assert::greaterThanEq($minArguments, 1);
        $this->minArguments = $minArguments;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Name every argument of a first-party method, static, or constructor call that passes 3 or more arguments',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$order = new Order($customer, 3, false);
$order->ship($address, $carrier, express: true);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$order = new Order(customer: $customer, quantity: 3, gift: false);
$order->ship(address: $address, carrier: $carrier, express: true);
CODE_SAMPLE,
                    [self::FIRST_PARTY_NAMESPACES => ['App\\'], self::MIN_ARGUMENTS => 3],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [MethodCall::class, NullsafeMethodCall::class, StaticCall::class, New_::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof MethodCall && ! $node instanceof NullsafeMethodCall && ! $node instanceof StaticCall && ! $node instanceof New_) {
            return null;
        }

        // CallLike::getArgs() asserts against a first-class callable.
        if ($node->isFirstClassCallable()) {
            return null;
        }

        $args = $node->getArgs();

        // Cheap gates before any reflection: enough arguments, at least one
        // positional to name, and no `...$spread` (a positional spread cannot
        // follow a named argument, and a named spread is not expressible).
        if (count($args) < $this->minArguments || ! $this->hasOnlyPlainArguments($args)) {
            return null;
        }

        $scope = $node->getAttribute(AttributeKey::SCOPE);
        if (! $scope instanceof Scope) {
            return null;
        }

        $methodReflection = $this->resolveNativeCallee($node, $scope);
        if (! $methodReflection instanceof ExtendedMethodReflection) {
            return null;
        }

        if (! $this->isDeclaredInNamespaces($methodReflection, $this->firstPartyNamespaces)) {
            return null;
        }

        $parameters = ParametersAcceptorSelectorVariantsWrapper::select($methodReflection, $node, $scope)->getParameters();

        $names = $this->resolveArgumentNames($args, $parameters);
        if ($names === null) {
            return null;
        }

        foreach ($names as $index => $name) {
            $args[$index]->name = new Identifier($name);
        }

        return $node;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersion::PHP_80;
    }

    /**
     * True when no argument is unpacked and at least one is positional. A call
     * whose arguments are all named has nothing left to name, which is also what
     * makes a re-run on an already-converted call a no-op.
     *
     * @param array<Arg> $args
     */
    private function hasOnlyPlainArguments(array $args): bool
    {
        $hasPositional = false;
        foreach ($args as $arg) {
            if ($arg->unpack) {
                return false;
            }

            if (! $arg->name instanceof Identifier) {
                $hasPositional = true;
            }
        }

        return $hasPositional;
    }

    /**
     * Map each positional argument's index to its parameter name. Returns null —
     * skip the whole call — when any argument lands on a variadic parameter
     * (positionally, or as a named argument the variadic would collect) or
     * beyond the parameter list. Naming only part of such a call would leave a
     * positional argument after a named one.
     *
     * @param array<Arg> $args
     * @param array<int, ParameterReflection> $parameters
     * @return array<string>|null
     */
    private function resolveArgumentNames(array $args, array $parameters): ?array
    {
        $parameterNames = [];
        foreach ($parameters as $parameter) {
            if (! $parameter->isVariadic()) {
                $parameterNames[$parameter->getName()] = true;
            }
        }

        $names = [];
        foreach ($args as $index => $arg) {
            if ($arg->name instanceof Identifier) {
                if (! isset($parameterNames[$arg->name->toString()])) {
                    return null;
                }

                continue;
            }

            $parameter = $parameters[$index] ?? null;
            if (! $parameter instanceof ParameterReflection || $parameter->isVariadic()) {
                return null;
            }

            $names[$index] = $parameter->getName();
        }

        return $names;
    }
}
