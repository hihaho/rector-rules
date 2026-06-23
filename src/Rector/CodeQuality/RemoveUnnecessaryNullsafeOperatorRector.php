<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\NullsafeMethodCall;
use PhpParser\Node\Expr\NullsafePropertyFetch;
use PhpParser\Node\Expr\PropertyFetch;
use PHPStan\Analyser\Scope;
use PHPStan\Type\TypeCombinator;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Rector\ValueObject\PhpVersionFeature;
use Rector\VersionBonding\Contract\MinPhpVersionInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\RemoveUnnecessaryNullsafeOperatorRector\RemoveUnnecessaryNullsafeOperatorRectorTest
 */
final class RemoveUnnecessaryNullsafeOperatorRector extends AbstractRector implements ConfigurableRectorInterface, MinPhpVersionInterface
{
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

    /**
     * @param NullsafePropertyFetch|NullsafeMethodCall $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $node instanceof NullsafePropertyFetch && ! $node instanceof NullsafeMethodCall) {
            return null;
        }

        $scope = $node->getAttribute(AttributeKey::SCOPE);
        if (! $scope instanceof Scope) {
            return null;
        }

        // Resolve the receiver type from the PHPStan Scope directly. The raw Scope
        // methods preserve nullability correctly; Rector's getType()/getNativeType()
        // wrappers both drop `null` from `?Foo` in some cases, which would strip a
        // load-bearing `?->` and cause a runtime null error. getNativeType (default)
        // ignores phpdoc — so a phpdoc-only / stale `@property` resolves to `mixed`
        // and is left alone. trust_phpdoc_types opts into the phpdoc-aware getType.
        $receiverType = $this->trustPhpDocTypes
            ? $scope->getType($node->var)
            : $scope->getNativeType($node->var);

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

        $this->mirrorComments($replacement, $node);

        return $replacement;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersionFeature::NULLSAFE_OPERATOR;
    }
}
