<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality\Concerns;

use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use Rector\NodeTypeResolver\Node\AttributeKey;

/**
 * Shared helper for rules that rebuild or mutate a {@see MethodCall}: rewriting a
 * node makes Rector reprint it, which drops the original line break when the call
 * sat on its own line in a fluent chain. Re-stamp the fluent-newline flag, but only
 * when the call genuinely was on its own line so inline calls stay inline.
 */
trait PreservesFluentNewline
{
    /**
     * MethodCall->startLine tracks the receiver (var->startLine), so "was on its own
     * line" must be detected via the name token's line being past the receiver's end
     * line rather than comparing the call's own start line.
     */
    private function preserveFluentNewline(MethodCall $call): void
    {
        if (! $call->name instanceof Identifier) {
            return;
        }

        $nameStartLine = $call->name->getAttribute('startLine');
        $varEndLine = $call->var->getAttribute('endLine');

        if (is_int($nameStartLine) && is_int($varEndLine) && $nameStartLine > $varEndLine) {
            $call->setAttribute(AttributeKey::NEWLINE_ON_FLUENT_CALL, true);
        }
    }
}
