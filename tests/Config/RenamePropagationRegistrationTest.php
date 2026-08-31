<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Config;

use Hihaho\RectorRules\Rector\NamingClasses\RenameDocBlockSeeTagRector;
use Hihaho\RectorRules\Rector\NamingClasses\Support\SuffixRenameMap;
use Rector\Config\RectorConfig;
use Rector\Configuration\Option;
use Rector\Configuration\Parameter\SimpleParameterProvider;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Testing\PHPUnit\AbstractLazyTestCase;

/**
 * The suffix rules rename declarations; `RenameClassRector` and
 * `RenameDocBlockSeeTagRector` are what rewrite the references those renames invalidate.
 *
 * That wiring used to ride along on `RelatedConfigInterface::getConfigFile()`, which
 * Rector removed in 2.6.5 — silently taking the propagation with it. It now lives in
 * `config/config.php`, reached both by `extra.rector.includes` and by an explicit import
 * in the naming set. These tests pin both entry points so it cannot go missing again.
 */
final class RenamePropagationRegistrationTest extends AbstractLazyTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        SimpleParameterProvider::setParameter(Option::REGISTERED_RECTOR_RULES, []);
    }

    public function test_package_config_registers_the_reference_rewriters(): void
    {
        $rectorConfig = new RectorConfig();
        $rectorConfig->import(__DIR__ . '/../../config/config.php');

        $registeredRules = SimpleParameterProvider::provideArrayParameter(Option::REGISTERED_RECTOR_RULES);

        $this->assertContains(RenameClassRector::class, $registeredRules);
        $this->assertContains(RenameDocBlockSeeTagRector::class, $registeredRules);
        // One shared instance across every suffix rule; without the binding each rule
        // would get its own map and cross-file renames would go missing.
        $this->assertTrue($rectorConfig->bound(SuffixRenameMap::class));
    }

    public function test_naming_set_registers_the_reference_rewriters(): void
    {
        $rectorConfig = new RectorConfig();
        $rectorConfig->import(__DIR__ . '/../../config/sets/naming.php');

        $registeredRules = SimpleParameterProvider::provideArrayParameter(Option::REGISTERED_RECTOR_RULES);

        $this->assertContains(RenameClassRector::class, $registeredRules);
        $this->assertContains(RenameDocBlockSeeTagRector::class, $registeredRules);
    }

    public function test_composer_declares_the_package_config_as_an_auto_included_extension_config(): void
    {
        $composer = json_decode(
            (string) file_get_contents(__DIR__ . '/../../composer.json'),
            true,
            512,
            JSON_THROW_ON_ERROR,
        );

        $this->assertIsArray($composer);
        $this->assertSame('rector-extension', $composer['type'] ?? null);

        $extra = $composer['extra'] ?? null;
        $this->assertIsArray($extra);

        $rectorExtra = $extra['rector'] ?? null;
        $this->assertIsArray($rectorExtra);

        $includes = $rectorExtra['includes'] ?? null;
        $this->assertIsArray($includes);
        $this->assertContains('config/config.php', $includes);

        // The auto-include only happens when the installer plugin generates its config.
        $require = $composer['require'] ?? null;
        $this->assertIsArray($require);
        $this->assertArrayHasKey('rector/extension-installer', $require);
    }
}
