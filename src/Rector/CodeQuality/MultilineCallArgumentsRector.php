<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use PhpParser\Comment;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ArrayDimFetch;
use PhpParser\Node\Expr\CallLike;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\NullsafeMethodCall;
use PhpParser\Node\Expr\NullsafePropertyFetch;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\StaticPropertyFetch;
use PhpParser\Node\Stmt\Class_;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * Puts each argument of a call with many arguments on its own line.
 *
 * php-parser prints an argument list over several lines only when an argument has
 * a comment, so the rule gives the first argument an empty one and forces a
 * reprint. The leftover blank line and the missing trailing comma are left to
 * Pint; see docs/15-multiline-call-arguments.md.
 *
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\MultilineCallArgumentsRector\MultilineCallArgumentsRectorTest
 */
final class MultilineCallArgumentsRector extends AbstractRector implements ConfigurableRectorInterface
{
    public const string MIN_ARGUMENTS = 'min_arguments';

    private const int DEFAULT_MIN_ARGUMENTS = 3;

    private const string DEREFERENCED_NEW = 'hihaho_multiline_call_arguments_dereferenced_new';

    private int $minArguments = self::DEFAULT_MIN_ARGUMENTS;

    public function configure(array $configuration): void
    {
        $minArguments = $configuration[self::MIN_ARGUMENTS] ?? self::DEFAULT_MIN_ARGUMENTS;
        Assert::integer($minArguments);
        Assert::greaterThanEq($minArguments, 1);
        $this->minArguments = $minArguments;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Put each argument of a single-line call with 3 or more arguments on its own line',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$this->formatName(first: $first, middle: $middle, last: $last);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$this->formatName(
    first: $first,
    middle: $middle,
    last: $last,
);
CODE_SAMPLE,
                    [self::MIN_ARGUMENTS => 3],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [
            FuncCall::class,
            MethodCall::class,
            NullsafeMethodCall::class,
            StaticCall::class,
            New_::class,
            // Visited only to spot a dereferenced `new`.
            PropertyFetch::class,
            NullsafePropertyFetch::class,
            ArrayDimFetch::class,
            ClassConstFetch::class,
            StaticPropertyFetch::class,
        ];
    }

    public function refactor(Node $node): ?Node
    {
        // Rector prints with PHP 7.4 syntax, so reprinting either side of a
        // `new Foo(...)->bar` dereference adds parentheses around the `new`.
        // The dereference is visited before its `new`, so mark the `new` here.
        $dereferencedNew = $this->resolveDereferencedNew($node);
        if ($dereferencedNew instanceof New_) {
            $dereferencedNew->setAttribute(self::DEREFERENCED_NEW, true);

            return null;
        }

        if (! $node instanceof CallLike || $node->getAttribute(self::DEREFERENCED_NEW) === true) {
            return null;
        }

        // CallLike::getArgs() asserts against a first-class callable.
        if ($node->isFirstClassCallable()) {
            return null;
        }

        // Reprinting `new class (...) { ... }` would move the class body's brace.
        if ($node instanceof New_ && $node->class instanceof Class_) {
            return null;
        }

        $args = $node->getArgs();
        if (count($args) < $this->minArguments || ! $this->isSingleLine($args)) {
            return null;
        }

        // Skip a call whose arguments carry a comment: the placeholder would be
        // printed next to it. This also skips a call this rule already wrapped,
        // which keeps its original line numbers until the file is reparsed.
        foreach ($args as $arg) {
            if ($arg->getComments() !== []) {
                return null;
            }
        }

        // Reprinting a call drops the line break before its `->` when it sits on
        // its own line in a chain. Rector can restore that break only for a
        // method call on another call (`->a()\n->b(...)`); any other chained
        // call on its own line is left alone.
        if (($node instanceof MethodCall || $node instanceof NullsafeMethodCall) && $this->isOnOwnLine($node)) {
            if (! $node instanceof MethodCall || ! $node->var instanceof CallLike) {
                return null;
            }

            $node->setAttribute(AttributeKey::NEWLINE_ON_FLUENT_CALL, true);
        }

        $args[0]->setAttribute(AttributeKey::COMMENTS, [new Comment('')]);
        // Without this the format-preserving printer keeps the original layout.
        $node->setAttribute(AttributeKey::ORIGINAL_NODE, null);

        return $node;
    }

    private function resolveDereferencedNew(Node $node): ?New_
    {
        $dereferenced = match (true) {
            $node instanceof MethodCall,
            $node instanceof NullsafeMethodCall,
            $node instanceof PropertyFetch,
            $node instanceof NullsafePropertyFetch,
            $node instanceof ArrayDimFetch => $node->var,
            $node instanceof StaticCall,
            $node instanceof ClassConstFetch,
            $node instanceof StaticPropertyFetch => $node->class,
            default => null,
        };

        return $dereferenced instanceof New_ ? $dereferenced : null;
    }

    /**
     * A call's start line is its receiver's, so compare the name token.
     */
    private function isOnOwnLine(MethodCall|NullsafeMethodCall $call): bool
    {
        return $call->name->getStartLine() > $call->var->getEndLine();
    }

    /**
     * Only the arguments are checked: `foo(\n$a, $b, $c\n)` is still wrapped, while
     * an argument that spans lines (a closure, a heredoc) skips the call.
     *
     * @param array<Arg> $args
     */
    private function isSingleLine(array $args): bool
    {
        if ($args === []) {
            return false;
        }

        $startLine = $args[array_key_first($args)]->getStartLine();
        $endLine = $args[array_key_last($args)]->getEndLine();

        return $startLine > 0 && $startLine === $endLine;
    }
}
