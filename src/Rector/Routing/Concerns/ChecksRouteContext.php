<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Routing\Concerns;

use Illuminate\Support\Facades\Route;
use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;

trait ChecksRouteContext
{
    abstract protected function isName(Node $node, string $name): bool;

    private function isInRoutesDirectory(): bool
    {
        $filePath = $this->getFile()->getFilePath();

        if (str_contains($filePath, '/vendor/')) {
            return false;
        }

        return str_contains($filePath, '/routes/');
    }

    private function isRouteStaticCall(StaticCall $node, string $method): bool
    {
        if (! $node->class instanceof Name) {
            return false;
        }

        if (! $this->isName($node->class, Route::class) && ! $this->isName($node->class, 'Route')) {
            return false;
        }

        if (! $node->name instanceof Identifier) {
            return false;
        }

        return $node->name->toString() === $method;
    }

    /**
     * @param list<string> $methods
     */
    private function isRouteStaticCallForMethods(StaticCall $node, array $methods): bool
    {
        if (! $node->class instanceof Name) {
            return false;
        }

        if (! $this->isName($node->class, Route::class) && ! $this->isName($node->class, 'Route')) {
            return false;
        }

        if (! $node->name instanceof Identifier) {
            return false;
        }

        return in_array($node->name->toString(), $methods, true);
    }
}
