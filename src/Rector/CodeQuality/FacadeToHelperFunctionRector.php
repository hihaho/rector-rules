<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ReflectionProvider;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\FacadeToHelperFunctionRector\FacadeToHelperFunctionRectorTest
 */
final class FacadeToHelperFunctionRector extends AbstractRector
{
    /**
     * Facades whose helper, called without arguments, returns the same service the
     * facade forwards to. Keyed by lowercased facade class. Validator and Cookie are
     * left out: their helpers are typed with a contract or a stricter signature than
     * the facade's docblock, so the converted call fails static analysis.
     */
    private const array FACADE_HELPERS = [
        'illuminate\support\facades\app' => 'app',
        'illuminate\support\facades\auth' => 'auth',
        'illuminate\support\facades\cache' => 'cache',
        'illuminate\support\facades\config' => 'config',
        'illuminate\support\facades\context' => 'context',
        'illuminate\support\facades\log' => 'logger',
        'illuminate\support\facades\redirect' => 'redirect',
        'illuminate\support\facades\request' => 'request',
        'illuminate\support\facades\response' => 'response',
        'illuminate\support\facades\session' => 'session',
        'illuminate\support\facades\url' => 'url',
        'illuminate\support\facades\view' => 'view',
    ];

    private const string FACADE_NAMESPACE = 'illuminate\support\facades\\';

    /**
     * Mockery methods a test calls on a faked facade, reached through
     * `__callStatic` on the mock. The service the helper returns has none of them.
     */
    private const array MOCK_METHODS = [
        'allows',
        'shouldhavebeencalled',
        'shouldhavereceived',
        'shouldnothavebeencalled',
        'shouldnothavereceived',
    ];

    public function __construct(
        private readonly ReflectionProvider $reflectionProvider,
    ) {}

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace a static facade call with the matching helper function',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
$value = Cache::get('key');
$name = Config::get('app.name');
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$value = cache()->get('key');
$name = config()->get('app.name');
CODE_SAMPLE,
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [StaticCall::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof StaticCall || ! $node->class instanceof Name || ! $node->name instanceof Identifier) {
            return null;
        }

        // `Log::info(...)` resolves the facade on every call, while `logger()->info(...)`
        // would resolve the service once, when the closure is created.
        if ($node->isFirstClassCallable()) {
            return null;
        }

        $facade = $this->resolveFacadeClass($node->class);
        if ($facade === null) {
            return null;
        }

        // A method declared on the facade itself, such as fake(), shouldReceive() or
        // spy(), exists only there and must stay a static call.
        $methodName = $node->name->toString();
        if (in_array(strtolower($methodName), self::MOCK_METHODS, strict: true)) {
            return null;
        }

        if ($this->reflectionProvider->hasClass($facade) && $this->reflectionProvider->getClass($facade)->hasNativeMethod($methodName)) {
            return null;
        }

        $helper = self::FACADE_HELPERS[strtolower($facade)];
        if ($this->isShadowedInNamespace($node, $helper)) {
            return null;
        }

        return new MethodCall(new FuncCall(new Name($helper)), $node->name, $node->args);
    }

    /**
     * An unqualified `cache()` inside `namespace App` calls `App\\cache()` when that
     * function exists.
     */
    private function isShadowedInNamespace(StaticCall $node, string $helper): bool
    {
        $scope = $node->getAttribute(AttributeKey::SCOPE);
        $namespace = $scope instanceof Scope ? $scope->getNamespace() : null;

        return $namespace !== null && $this->reflectionProvider->hasFunction(new FullyQualified($namespace . '\\' . $helper), null);
    }

    /**
     * The facade class a static call names, or null when it names none of the
     * mapped facades. The root aliases (`\Cache`, `\Config`) count too.
     */
    private function resolveFacadeClass(Name $class): ?string
    {
        $name = $this->getName($class);
        if ($name === null) {
            return null;
        }

        $lowerName = strtolower($name);
        if (isset(self::FACADE_HELPERS[$lowerName])) {
            return $name;
        }

        if (! str_contains($name, '\\') && isset(self::FACADE_HELPERS[self::FACADE_NAMESPACE . $lowerName])) {
            return 'Illuminate\Support\Facades\\' . $name;
        }

        return null;
    }
}
