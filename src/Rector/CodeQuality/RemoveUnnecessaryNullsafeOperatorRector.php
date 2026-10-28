<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use Hihaho\RectorRules\Rector\CodeQuality\Concerns\PreservesFluentNewline;
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\CallLike;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\NullsafeMethodCall;
use PhpParser\Node\Expr\NullsafePropertyFetch;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ExtendedParametersAcceptor;
use PHPStan\Reflection\ParametersAcceptorSelector;
use PHPStan\Type\Type;
use PHPStan\Type\TypeCombinator;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Rector\ValueObject\PhpVersion;
use Rector\VersionBonding\Contract\MinPhpVersionInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\RemoveUnnecessaryNullsafeOperatorRectorTest
 */
final class RemoveUnnecessaryNullsafeOperatorRector extends AbstractRector implements ConfigurableRectorInterface, MinPhpVersionInterface
{
    use PreservesFluentNewline;

    /**
     * Opt in to trusting phpdoc-derived non-nullability (e.g. Eloquent `@property`).
     * Off by default: a stale `@property` would let the rule strip a load-bearing
     * `?->` and PHPStan would not catch it (it trusts the same annotation).
     */
    public const string TRUST_PHPDOC_TYPES = 'trust_phpdoc_types';

    private bool $trustPhpDocTypes = false;

    public function configure(array $configuration): void
    {
        // Strict opt-in: only a literal `true` enables phpdoc trust. Casting would let
        // a truthy string like 'false' silently turn it on, and trusting stale phpdoc
        // can strip a load-bearing `?->` and introduce a runtime null dereference.
        $trust = $configuration[self::TRUST_PHPDOC_TYPES] ?? false;
        Assert::boolean($trust);
        $this->trustPhpDocTypes = $trust;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Remove the nullsafe operator when the receiver can never be null',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
return $this->resource->poster?->original;
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
return $this->resource->poster->original;
CODE_SAMPLE,
                    [self::TRUST_PHPDOC_TYPES => false],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [NullsafePropertyFetch::class, NullsafeMethodCall::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof NullsafePropertyFetch && ! $node instanceof NullsafeMethodCall) {
            return null;
        }

        $scope = $node->getAttribute(AttributeKey::SCOPE);
        if (! $scope instanceof Scope) {
            return null;
        }

        $receiverType = $this->resolveReceiverType($node->var, $scope);
        if (! $receiverType instanceof Type) {
            return null;
        }

        // Only act when the receiver is definitely a non-null object access.
        // containsNull() guards union-with-null (the operator is load-bearing);
        // isObject()->yes() guards mixed / error / never / scalar receivers.
        if (TypeCombinator::containsNull($receiverType)) {
            return null;
        }

        if (! $receiverType->isObject()->yes()) {
            return null;
        }

        $replacement = $node instanceof NullsafePropertyFetch
            ? new PropertyFetch($node->var, $node->name)
            : new MethodCall($node->var, $node->name, $node->args);

        if ($replacement instanceof MethodCall) {
            $this->preserveFluentNewline($replacement);
        }

        $this->mirrorComments($replacement, $node);

        return $replacement;
    }

    /**
     * Types come from the raw Scope methods: Rector's getType()/getNativeType() wrappers
     * drop `null` from `?Foo` in some cases, which would strip a load-bearing `?->`.
     * getNativeType (default) ignores phpdoc, so a stale `@property` resolves to `mixed`
     * and is left alone; trust_phpdoc_types opts into the phpdoc-aware getType.
     *
     * A call receiver is resolved from the called method's declared return type, not from
     * the scope: PHPStan does not promise which callback's scope Rector stores on the
     * nullsafe node, and on PHPStan 2.3.0 an assigned `$this->find()?->name` carries a scope
     * that already narrows `$this->find()` to non-null.
     */
    private function resolveReceiverType(Expr $receiver, Scope $scope): ?Type
    {
        if (! $receiver instanceof CallLike) {
            return $this->trustPhpDocTypes
                ? $scope->getType($receiver)
                : $scope->getNativeType($receiver);
        }

        if ($receiver instanceof MethodCall) {
            $callerType = $this->trustPhpDocTypes
                ? $scope->getType($receiver->var)
                : $scope->getNativeType($receiver->var);
        } elseif ($receiver instanceof NullsafeMethodCall) {
            // A chain on a nullable root keeps every `?->`, so the inner receiver must resolve non-null too.
            $callerType = $this->resolveReceiverType($receiver->var, $scope);
            if (! $callerType instanceof Type || TypeCombinator::containsNull($callerType)) {
                return null;
            }
        } elseif ($receiver instanceof StaticCall && $receiver->class instanceof Name) {
            $callerType = $scope->resolveTypeByName($receiver->class);
        } else {
            return null;
        }

        if (! $receiver->name instanceof Identifier) {
            return null;
        }

        $methodName = $receiver->name->toString();
        if (! $callerType->hasMethod($methodName)->yes()) {
            return null;
        }

        $variant = ParametersAcceptorSelector::selectFromArgs(
            $scope,
            $receiver->getArgs(),
            $callerType->getMethod($methodName, $scope)->getVariants(),
        );

        if ($this->trustPhpDocTypes) {
            return $variant->getReturnType();
        }

        return $variant instanceof ExtendedParametersAcceptor ? $variant->getNativeReturnType() : null;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersion::PHP_80;
    }
}
