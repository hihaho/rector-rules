<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\CodeQuality;

use Hihaho\RectorRules\Rector\CodeQuality\Concerns\NamesFlagArguments;
use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Name;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Rector\AbstractRector;
use Rector\ValueObject\PhpVersion;
use Rector\VersionBonding\Contract\MinPhpVersionInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\CodeQuality\NativeFunctionFlagArgumentToNamedRector\NativeFunctionFlagArgumentToNamedRectorTest
 */
final class NativeFunctionFlagArgumentToNamedRector extends AbstractRector implements ConfigurableRectorInterface, MinPhpVersionInterface
{
    use NamesFlagArguments;

    public const string FUNCTION_FLAG_ARGUMENTS = 'function_flag_arguments';

    /**
     * Curated default: native functions whose trailing flag parameter is a bare
     * bool a call site routinely passes positionally. Each entry maps the
     * positional index to the parameter name PHP declares for it. Consumers
     * extend or override via configuration.
     *
     * @var array<string, array<int, string>>
     */
    private const array DEFAULT_FUNCTION_FLAG_ARGUMENTS = [
        'in_array' => [2 => 'strict'],
        'array_search' => [2 => 'strict'],
        'json_decode' => [1 => 'associative'],
    ];

    /** @var array<string, array<int, string>> */
    private array $functionFlagArguments = self::DEFAULT_FUNCTION_FLAG_ARGUMENTS;

    public function configure(array $configuration): void
    {
        $map = $configuration[self::FUNCTION_FLAG_ARGUMENTS] ?? self::DEFAULT_FUNCTION_FLAG_ARGUMENTS;
        Assert::isArray($map);

        $normalised = [];
        foreach ($map as $function => $positions) {
            Assert::stringNotEmpty($function);
            Assert::isArray($positions);

            foreach ($positions as $index => $paramName) {
                Assert::natural($index);
                Assert::stringNotEmpty($paramName);
            }

            // Lowercase the key: PHP function names are case-insensitive, and the
            // lookup in refactor() resolves against a lowercased name.
            $normalised[strtolower($function)] = $positions;
        }

        $this->functionFlagArguments = $normalised;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Name the opaque trailing bool/null flag argument of well-known native functions',
            [
                new ConfiguredCodeSample(
                    <<<'CODE_SAMPLE'
$found = in_array($needle, $haystack, true);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$found = in_array($needle, $haystack, strict: true);
CODE_SAMPLE,
                    [self::FUNCTION_FLAG_ARGUMENTS => ['in_array' => [2 => 'strict']]],
                ),
            ],
        );
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [FuncCall::class];
    }

    public function refactor(Node $node): ?Node
    {
        // Cheap gate: bail on dynamic calls before resolving the name.
        if (! $node instanceof FuncCall || ! $node->name instanceof Name) {
            return null;
        }

        // Resolve the called name once (handles the global fallback in namespaced
        // files), then a single map lookup — no per-spelling isName() loop.
        $functionName = $this->getName($node);
        if ($functionName === null) {
            return null;
        }

        $positions = $this->functionFlagArguments[strtolower($functionName)] ?? null;
        if ($positions === null) {
            return null;
        }

        $args = $node->getArgs();
        $changed = false;
        foreach ($positions as $index => $paramName) {
            if ($this->nameTrailingFlagArgument($args, $index, $paramName)) {
                $changed = true;
            }
        }

        return $changed ? $node : null;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersion::PHP_80;
    }
}
