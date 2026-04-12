<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Routing;

use Hihaho\RectorRules\Rector\Routing\Concerns\ChecksRouteContext;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Scalar\String_;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\Routing\NormalizeRoutePathRector\NormalizeRoutePathRectorTest
 */
final class NormalizeRoutePathRector extends AbstractRector
{
    use ChecksRouteContext;

    /** @var list<string> */
    private const array ROUTE_METHODS = ['get', 'post', 'put', 'patch', 'delete', 'any', 'head'];

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Normalize route paths: use "/" for root, remove leading/trailing slashes',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
Route::get('', fn () => 'root');
Route::get('/about', fn () => 'about');
Route::post('users/', fn () => 'users');
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
Route::get('/', fn () => 'root');
Route::get('about', fn () => 'about');
Route::post('users', fn () => 'users');
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
        if (! $node instanceof StaticCall) {
            return null;
        }

        if (! $this->isInRoutesDirectory()) {
            return null;
        }

        if (! $this->isRouteStaticCallForMethods($node, self::ROUTE_METHODS)) {
            return null;
        }

        if ($node->args === []) {
            return null;
        }

        $firstArg = $node->args[0];

        if (! $firstArg instanceof Arg) {
            return null;
        }

        if (! $firstArg->value instanceof String_) {
            return null;
        }

        $path = $firstArg->value->value;

        if ($path === '') {
            $firstArg->value = new String_('/');

            return $node;
        }

        // Collapse consecutive slashes, then strip leading/trailing ones.
        $normalized = trim((string) preg_replace('#/+#', '/', $path), '/');

        if ($normalized === '') {
            // Path was all slashes (e.g. "/", "//", "///") — keep root form.
            if ($path === '/') {
                return null;
            }

            $firstArg->value = new String_('/');

            return $node;
        }

        if ($normalized === $path) {
            return null;
        }

        $firstArg->value = new String_($normalized);

        return $node;
    }
}
