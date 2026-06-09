<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use Hihaho\RectorRules\Rector\CodeQuality\Concerns\NamesFlagArguments;
use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
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

    public function __construct(
        private readonly ReflectionResolver $reflectionResolver,
    ) {}

    public function configure(array $configuration): void
    {
        $namespaces = $configuration[self::FIRST_PARTY_NAMESPACES] ?? self::DEFAULT_FIRST_PARTY_NAMESPACES;
        Assert::isArray($namespaces);
        Assert::allStringNotEmpty($namespaces);
        $this->firstPartyNamespaces = array_values($namespaces);
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Name an opaque trailing bool/null flag argument on a first-party method call',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$token = $store->resolve($platform, false);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$token = $store->resolve($platform, inherit: false);
CODE_SAMPLE,
                    [self::FIRST_PARTY_NAMESPACES => ['App\\']],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [MethodCall::class, StaticCall::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof MethodCall && ! $node instanceof StaticCall) {
            return null;
        }

        // A first-class callable ($obj->m(...), C::m(...)) carries no trailing
        // flag argument to name, and CallLike::getArgs() asserts against being
        // called on one — bail before it fatals.
        if ($node->isFirstClassCallable()) {
            return null;
        }

        $args = $node->getArgs();
        $lastIndex = count($args) - 1;
        if ($lastIndex < 0) {
            return null;
        }

        // Cheap pre-gate: only the final argument is ever named, and it must be a
        // bare bool/null literal. This bails the overwhelming majority of calls
        // before any (expensive) reflection runs.
        if (! $this->isBareBoolOrNullFlag($args[$lastIndex])) {
            return null;
        }

        $methodReflection = $node instanceof MethodCall
            ? $this->reflectionResolver->resolveMethodReflectionFromMethodCall($node)
            : $this->reflectionResolver->resolveMethodReflectionFromStaticCall($node);

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

        $parametersAcceptor = ParametersAcceptorSelectorVariantsWrapper::select($methodReflection, $node, $scope);
        $parameters = $parametersAcceptor->getParameters();

        // No declared parameter at this position means the call lands on a
        // variadic tail (or the signature is unknown); naming it is unsafe.
        $parameter = $parameters[$lastIndex] ?? null;
        if ($parameter === null || $parameter->isVariadic()) {
            return null;
        }

        if (! $this->nameTrailingFlagArgument($args, $lastIndex, $parameter->getName())) {
            return null;
        }

        return $node;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersion::PHP_80;
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
