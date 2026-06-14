<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Routing\Concerns;

use Hihaho\RectorRules\Rector\Support\DirectoryContextCache;
use Illuminate\Support\Facades\Route;
use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;

trait ChecksRouteContext
{
    abstract protected function getName(Node $node): ?string;

    private function isInRoutesDirectory(): bool
    {
        return DirectoryContextCache::isInRoutesDirectory($this->getFile());
    }

    private function isRouteStaticCall(StaticCall $node, string $method): bool
    {
        // Cheapest gate first: the method-name Identifier check bails the bulk of
        // static calls before the class name has to be resolved.
        if (! $node->name instanceof Identifier || strcasecmp($node->name->toString(), $method) !== 0) {
            return false;
        }

        return $this->isRouteClass($node);
    }

    /**
     * @param list<string> $methods
     */
    private function isRouteStaticCallForMethods(StaticCall $node, array $methods): bool
    {
        if (! $node->name instanceof Identifier || ! in_array(strtolower($node->name->toString()), $methods, true)) {
            return false;
        }

        return $this->isRouteClass($node);
    }

    private function isRouteClass(StaticCall $node): bool
    {
        if (! $node->class instanceof Name) {
            return false;
        }

        // Resolve the class name once and compare, rather than running the
        // name-resolver twice (once per accepted spelling) via isName(). Compare
        // case-insensitively, as isName() did — PHP class names are case-insensitive.
        $className = $this->getName($node->class);

        return $className !== null
            && (strcasecmp($className, Route::class) === 0 || strcasecmp($className, 'Route') === 0);
    }
}
