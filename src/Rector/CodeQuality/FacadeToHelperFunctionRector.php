<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PHPStan\Reflection\ReflectionProvider;
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
     * facade forwards to. Keyed by lowercased facade class.
     */
    private const array FACADE_HELPERS = [
        'illuminate\support\facades\app' => 'app',
        'illuminate\support\facades\auth' => 'auth',
        'illuminate\support\facades\cache' => 'cache',
        'illuminate\support\facades\config' => 'config',
        'illuminate\support\facades\cookie' => 'cookie',
        'illuminate\support\facades\log' => 'logger',
        'illuminate\support\facades\redirect' => 'redirect',
        'illuminate\support\facades\request' => 'request',
        'illuminate\support\facades\response' => 'response',
        'illuminate\support\facades\session' => 'session',
        'illuminate\support\facades\url' => 'url',
        'illuminate\support\facades\validator' => 'validator',
        'illuminate\support\facades\view' => 'view',
    ];

    private const string FACADE_NAMESPACE = 'illuminate\support\facades\\';

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

        $facade = $this->resolveFacadeClass($node->class);
        if ($facade === null) {
            return null;
        }

        // A method declared on the facade itself, such as fake(), shouldReceive() or
        // spy(), exists only there and must stay a static call.
        $methodName = $node->name->toString();
        if ($this->reflectionProvider->hasClass($facade) && $this->reflectionProvider->getClass($facade)->hasNativeMethod($methodName)) {
            return null;
        }

        $helper = self::FACADE_HELPERS[strtolower($facade)];

        return new MethodCall(new FuncCall(new Name($helper)), $node->name, $node->args);
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
