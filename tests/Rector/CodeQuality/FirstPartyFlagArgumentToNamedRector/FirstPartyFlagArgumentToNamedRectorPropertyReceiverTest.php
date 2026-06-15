<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector;

use Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyFlagArgumentToNamedRector\Source\Magic\Registry;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Process\Process;

/**
 * Proves the in-engine path: when a `PropertiesClassReflectionExtension` is loaded
 * into Rector via `phpstanConfig()`, `FirstPartyFlagArgumentToNamedRector` resolves
 * an otherwise-unresolvable dynamic-property receiver and names the flag argument.
 *
 * This drives the real `vendor/bin/rector` CLI in a child process rather than
 * extending `AbstractRectorTestCase`. The reason is load-bearing: the test base
 * builds the PHPStan-backed services once, as a per-process singleton, before the
 * test config's `phpstanConfig()` parameter is read — so an in-process test can
 * never load the extension, and the with/without-extension contrast would be
 * order-dependent (`PHPSTAN_FOR_RECTOR_PATHS` only accumulates). A fresh CLI
 * process per case boots its own container and honours the config exactly as a
 * consumer's `rector.php` would, which is also the behaviour being documented.
 */
final class FirstPartyFlagArgumentToNamedRectorPropertyReceiverTest extends TestCase
{
    private const string CONFIG_DIR = __DIR__ . '/config';

    #[DataProvider('provideCases')]
    public function test(string $configFile, string $inputCall, string $expectedCall): void
    {
        if (PHP_OS_FAMILY === 'Windows') {
            self::markTestSkipped('Subprocess Rector invocation is not exercised on the Windows CI leg.');
        }

        $processedSource = $this->runRector($inputCall, $configFile);

        // Compare the exact whole call expression — a convert case names the flag, a
        // skip case leaves the call byte-for-byte unchanged. Asserting the full
        // expression (not a loose substring) rejects any partial/wrong rewrite, so
        // the proof-by-contrast genuinely proves the skip path did nothing.
        $this->assertStringContainsString('return ' . $expectedCall . ';', $processedSource);
    }

    /**
     * Each case: [config, input call expression, expected call expression after
     * Rector]. A skip case expects the input unchanged.
     *
     * @return Iterator<string, array{string, string, string}>
     */
    public static function provideCases(): Iterator
    {
        $withExtension = self::CONFIG_DIR . '/property_receiver_rule.php';
        // The no-extension contrast reuses the standard config (no phpstanConfig()).
        $withoutExtension = self::CONFIG_DIR . '/configured_rule.php';

        // Single first-party class supplied only by the extension → flag is named.
        yield 'extension resolves first-party receiver' => [
            $withExtension,
            '$registry->tokens->resolve($platform, false)',
            '$registry->tokens->resolve($platform, inherit: false)',
        ];

        // Same source, extension NOT loaded → receiver is unresolved, call untouched.
        // This is the load-bearing contrast: it proves the extension does the work.
        yield 'without extension the receiver is unresolved' => [
            $withoutExtension,
            '$registry->tokens->resolve($platform, false)',
            '$registry->tokens->resolve($platform, false)',
        ];

        // Nullable extension type → removeNull() strips it to one class → named.
        yield 'nullable extension type still resolves' => [
            $withExtension,
            '$registry->nullableTokens->resolve($platform, false)',
            '$registry->nullableTokens->resolve($platform, inherit: false)',
        ];

        // Extension type is a vendor class → declaring-class gate rejects it.
        yield 'vendor receiver is skipped' => [
            $withExtension,
            '$registry->client->send($platform, false)',
            '$registry->client->send($platform, false)',
        ];

        // Extension type is a union of two classes → not a single receiver → skip.
        yield 'union receiver is skipped' => [
            $withExtension,
            '$registry->ambiguous->resolve($platform, false)',
            '$registry->ambiguous->resolve($platform, false)',
        ];
    }

    private function runRector(string $callExpression, string $configFile): string
    {
        $root = dirname(__DIR__, 4);
        $sourceFile = tempnam(sys_get_temp_dir(), 'inengine_') . '.php';
        file_put_contents($sourceFile, $this->buildSource($callExpression));

        $process = new Process(
            [PHP_BINARY, $root . '/vendor/bin/rector', 'process', $sourceFile, '--config', $configFile, '--clear-cache'],
            $root,
            ['PAO_DISABLE' => '1'],
            timeout: 180,
        );
        $process->run();

        $processedSource = (string) file_get_contents($sourceFile);
        unlink($sourceFile);

        $this->assertTrue(
            $process->isSuccessful(),
            'Rector CLI failed: ' . $process->getOutput() . $process->getErrorOutput(),
        );

        return $processedSource;
    }

    private function buildSource(string $callExpression): string
    {
        $registry = Registry::class;

        return <<<PHP
            <?php

            namespace App;

            use {$registry};

            function run(Registry \$registry, string \$platform): mixed
            {
                return {$callExpression};
            }
            PHP;
    }
}
