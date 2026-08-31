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
 * The suffix rules rename declarations; `RenameClassRector` and `RenameDocBlockSeeTagRector`
 * rewrite the references those renames invalidate. That wiring used to ride along on
 * `RelatedConfigInterface::getConfigFile()`, which Rector 2.6.5 removed — silently taking
 * the propagation with it. These tests pin both of its replacement entry points.
 */
final class RenamePropagationRegistrationTest extends AbstractLazyTestCase
{
    /** @var array<mixed> */
    private array $registeredRectorRules = [];

    protected function setUp(): void
    {
        parent::setUp();

        // Rector records registrations in process-wide static state, so this test both
        // clears it to read back only its own config file and restores it afterwards.
        $this->registeredRectorRules = SimpleParameterProvider::provideArrayParameter(
            Option::REGISTERED_RECTOR_RULES,
        );

        SimpleParameterProvider::setParameter(Option::REGISTERED_RECTOR_RULES, []);
    }

    protected function tearDown(): void
    {
        SimpleParameterProvider::setParameter(Option::REGISTERED_RECTOR_RULES, $this->registeredRectorRules);

        parent::tearDown();
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

    /**
     * A consumer on `rector/extension-installer` gets the config auto-included *and*
     * imported again by the set. Registering a rule twice would run it twice on every
     * node and list it twice in the report.
     */
    public function test_loading_the_config_through_both_entry_points_registers_each_rule_once(): void
    {
        $rectorConfig = new RectorConfig();
        $rectorConfig->import(__DIR__ . '/../../config/config.php');
        $rectorConfig->import(__DIR__ . '/../../config/sets/naming.php');

        $registeredRules = SimpleParameterProvider::provideArrayParameter(Option::REGISTERED_RECTOR_RULES);

        $this->assertCount(1, array_keys($registeredRules, RenameClassRector::class, true));
        $this->assertCount(1, array_keys($registeredRules, RenameDocBlockSeeTagRector::class, true));
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
