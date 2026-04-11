<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\Routing\Concerns;

use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;

trait ChecksRouteContext
{
    private function isInRoutesDirectory(): bool
    {
        return str_contains($this->file->getFilePath(), '/routes/');
    }

    private function isRouteStaticCall(StaticCall $node, string $method): bool
    {
        if (! $node->class instanceof Name) {
            return false;
        }

        if (! $this->isName($node->class, 'Illuminate\Support\Facades\Route') && ! $this->isName($node->class, 'Route')) {
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

        if (! $this->isName($node->class, 'Illuminate\Support\Facades\Route') && ! $this->isName($node->class, 'Route')) {
            return false;
        }

        if (! $node->name instanceof Identifier) {
            return false;
        }

        return in_array($node->name->toString(), $methods, true);
    }
}
