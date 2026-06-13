<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use Hihaho\RectorRules\Rector\CodeQuality\Concerns\NamesFlagArguments;
use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
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

        // A first-class callable ($obj->m(...), C::m(...)) carries no flag
        // argument to name, and CallLike::getArgs() asserts against being called
        // on one — bail before it fatals.
        if ($node->isFirstClassCallable()) {
            return null;
        }

        $args = $node->getArgs();

        // Cheap pre-gate: bail unless the trailing namable run actually holds a bare
        // flag to rename. This keeps the expensive callee reflection off the hot path
        // for the common shapes — a call with no flag, or one ending in an
        // already-named argument with no flag before it.
        if (! $this->hasFlagInTrailingRun($args)) {
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

        $parametersAcceptor = ParametersAcceptorSelectorVariantsWrapper::select($methodReflection, $node, $scope);

        return $this->nameFlagArgumentsInTrailingRun($args, $parametersAcceptor->getParameters()) ? $node : null;
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
