<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use Hihaho\RectorRules\Rector\CodeQuality\Concerns\NamesPositionalArguments;
use Hihaho\RectorRules\Rector\CodeQuality\Concerns\ResolvesNativeFirstPartyCallee;
use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\NullsafeMethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ExtendedMethodReflection;
use PHPStan\Reflection\ReflectionProvider;
use PHPStan\TrinaryLogic;
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
 * Names the arguments of a long call to a vendor method. Unlike first-party code,
 * the project's own PHPStan run does not see every vendor class that implements an
 * interface, so a method without a body (an interface or abstract method) is
 * skipped: the class that runs is chosen at runtime, often from configuration.
 *
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\VendorMinArgumentsToNamedRector\VendorMinArgumentsToNamedRectorTest
 */
final class VendorMinArgumentsToNamedRector extends AbstractRector implements ConfigurableRectorInterface, MinPhpVersionInterface
{
    use NamesPositionalArguments;
    use ResolvesNativeFirstPartyCallee;

    public const string VENDOR_NAMESPACES = 'vendor_namespaces';

    public const string MIN_ARGUMENTS = 'min_arguments';

    public const string SKIP_QUERY_CONDITIONS = 'skip_query_conditions';

    /**
     * where…, orWhere…, having… and …join: their column / operator / value order is
     * familiar enough that names only lengthen the line.
     */
    private const string QUERY_CONDITION_PATTERN = '/^(?:or)?(?:where|having)|^(?:left|right|cross)?join/i';

    /** @var list<string> */
    private const array DEFAULT_VENDOR_NAMESPACES = ['Illuminate\\'];

    private const int DEFAULT_MIN_ARGUMENTS = 3;

    /** @var list<string> */
    private array $vendorNamespaces = self::DEFAULT_VENDOR_NAMESPACES;

    private int $minArguments = self::DEFAULT_MIN_ARGUMENTS;

    private bool $skipQueryConditions = true;

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function configure(array $configuration): void
    {
        $namespaces = $configuration[self::VENDOR_NAMESPACES] ?? self::DEFAULT_VENDOR_NAMESPACES;
        Assert::isArray($namespaces);
        Assert::allStringNotEmpty($namespaces);
        $this->vendorNamespaces = array_values($namespaces);

        $minArguments = $configuration[self::MIN_ARGUMENTS] ?? self::DEFAULT_MIN_ARGUMENTS;
        Assert::integer($minArguments);
        Assert::greaterThanEq($minArguments, 1);
        $this->minArguments = $minArguments;

        $skipQueryConditions = $configuration[self::SKIP_QUERY_CONDITIONS] ?? true;
        Assert::boolean($skipQueryConditions);
        $this->skipQueryConditions = $skipQueryConditions;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Name every argument of a vendor method, static, or constructor call that passes 3 or more arguments',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$excerpt = Str::limit($body, 100, '...');
Arr::set($settings, 'mail.driver', $driver);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$excerpt = Str::limit(value: $body, limit: 100, end: '...');
Arr::set(array: $settings, key: 'mail.driver', value: $driver);
CODE_SAMPLE,
                    [self::VENDOR_NAMESPACES => ['Illuminate\\'], self::MIN_ARGUMENTS => 3],
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

        if ($this->skipQueryConditions && ! $node instanceof New_ && $node->name instanceof Identifier
            && preg_match(self::QUERY_CONDITION_PATTERN, $node->name->toString()) === 1) {
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

        if (! $this->isDeclaredInNamespaces($methodReflection, $this->vendorNamespaces) || $this->hasNoBody($methodReflection)) {
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

    private function hasNoBody(ExtendedMethodReflection $methodReflection): bool
    {
        $isAbstract = $methodReflection->isAbstract();

        return $isAbstract === true || ($isAbstract instanceof TrinaryLogic && ! $isAbstract->no());
    }
}
