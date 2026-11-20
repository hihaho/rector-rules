<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use PhpParser\Comment;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ArrayDimFetch;
use PhpParser\Node\Expr\ArrowFunction;
use PhpParser\Node\Expr\CallLike;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\Closure;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\NullsafeMethodCall;
use PhpParser\Node\Expr\NullsafePropertyFetch;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\StaticPropertyFetch;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Reflection\FunctionReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\TypeCombinator;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Rector\Reflection\ReflectionResolver;
use Rector\ValueObject\Application\File;
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

    private ?File $ignoredLinesFile = null;

    /** @var array<int, true> */
    private array $ignoredLines = [];

    public function __construct(
        private readonly ReflectionResolver $reflectionResolver,
    ) {}

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

        if ($this->isQueryCondition($node, $args)) {
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

        // A PHPStan ignore comment covers one line. Once the call is wrapped, an error
        // on an argument is reported on that argument's own line, outside the ignore.
        if ($this->hasPhpstanIgnore($node)) {
            return null;
        }

        // A built-in such as `strspn()` takes mostly positional, well-known
        // arguments, so wrapping it adds lines without making it any clearer.
        if ($this->callsBuiltIn($node)) {
            return null;
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

    /**
     * `->where('status', '!=', $value)` reads as one condition, so a where, having
     * or join call stays on one line unless one of its arguments is a closure.
     *
     * @param array<Arg> $args
     */
    private function isQueryCondition(CallLike $call, array $args): bool
    {
        if (! ($call instanceof MethodCall || $call instanceof NullsafeMethodCall || $call instanceof StaticCall)
            || ! $call->name instanceof Identifier
            || preg_match('/^(?:or)?(?:where|having)|^(?:left|right|cross)?join/i', $call->name->toString()) !== 1) {
            return false;
        }

        foreach ($args as $arg) {
            if ($arg->value instanceof Closure || $arg->value instanceof ArrowFunction) {
                return false;
            }
        }

        return true;
    }

    private function hasPhpstanIgnore(CallLike $call): bool
    {
        $ignoredLines = $this->resolveIgnoredLines();
        for ($line = $call->getStartLine() - 1; $line <= $call->getEndLine(); $line++) {
            if (isset($ignoredLines[$line])) {
                return true;
            }
        }

        return false;
    }

    /**
     * The lines of the current file that end a PHPStan ignore comment.
     *
     * @return array<int, true>
     */
    private function resolveIgnoredLines(): array
    {
        $file = $this->getFile();
        if ($this->ignoredLinesFile === $file) {
            return $this->ignoredLines;
        }

        $this->ignoredLinesFile = $file;
        $this->ignoredLines = [];
        foreach ($file->getOldTokens() as $token) {
            if ($token->is([T_COMMENT, T_DOC_COMMENT]) && str_contains($token->text, '@phpstan-ignore')) {
                $this->ignoredLines[$token->line + substr_count($token->text, "\n")] = true;
            }
        }

        return $this->ignoredLines;
    }

    private function callsBuiltIn(CallLike $call): bool
    {
        $reflection = $call instanceof NullsafeMethodCall
            ? $this->resolveNullsafeMethodReflection($call)
            : $this->reflectionResolver->resolveFunctionLikeReflectionFromCall($call);

        return match (true) {
            $reflection instanceof FunctionReflection => $reflection->isBuiltin(),
            $reflection instanceof MethodReflection => $reflection->getDeclaringClass()->isBuiltin(),
            default => false,
        };
    }

    /**
     * ReflectionResolver does not cover nullsafe calls, so resolve the receiver here.
     */
    private function resolveNullsafeMethodReflection(NullsafeMethodCall $call): ?MethodReflection
    {
        $methodName = $this->getName($call->name);
        $classReflections = TypeCombinator::removeNull($this->getType($call->var))->getObjectClassReflections();
        if ($methodName === null || count($classReflections) !== 1 || ! $classReflections[0]->hasNativeMethod($methodName)) {
            return null;
        }

        return $classReflections[0]->getNativeMethod($methodName);
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
