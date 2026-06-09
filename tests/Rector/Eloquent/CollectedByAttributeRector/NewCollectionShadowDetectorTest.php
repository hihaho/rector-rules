<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector;

use Hihaho\RectorRules\Rector\Eloquent\Support\NewCollectionShadowDetector;
use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow\EloquentModelOnly;
use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow\NotShadowedByPlainAncestor;
use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow\ShadowedByAliasedTrait;
use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow\ShadowedByAncestor;
use Hihaho\RectorRules\Tests\Rector\Eloquent\CollectedByAttributeRector\Source\Shadow\ShadowedByTrait;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

/**
 * Exercises the shadow detection directly against real, autoloadable classes.
 *
 * The fixture-driven test cannot reach this logic: Rector's test source locator
 * only reflects the first fixture processed in a run, so a fixture-defined model
 * resolves as "unknown" and the rule bails at the isEloquentModel() gate before
 * reaching shadow detection (see issue #11). Autoloadable classes always reflect,
 * so the detector is verified here instead.
 *
 * The detector inspects a class's traits and ancestors for a newCollection()
 * method; that is independent of whether the class extends Model, so the
 * trait/ancestor subjects are plain classes (a real Model is used only where the
 * framework's own Illuminate\HasCollection trait must be proven harmless).
 */
final class NewCollectionShadowDetectorTest extends AbstractRectorTestCase
{
    private NewCollectionShadowDetector $detector;

    protected function setUp(): void
    {
        parent::setUp();

        $this->detector = new NewCollectionShadowDetector($this->make(ReflectionProvider::class));
    }

    public function test_trait_supplied_new_collection_is_a_shadow(): void
    {
        $this->assertTrue($this->detector->isShadowed(ShadowedByTrait::class));
    }

    public function test_aliased_trait_new_collection_is_a_shadow(): void
    {
        $this->assertTrue($this->detector->isShadowed(ShadowedByAliasedTrait::class));
    }

    public function test_ancestor_supplied_new_collection_is_a_shadow(): void
    {
        $this->assertTrue($this->detector->isShadowed(ShadowedByAncestor::class));
    }

    public function test_framework_collection_trait_is_not_a_shadow(): void
    {
        $this->assertFalse($this->detector->isShadowed(EloquentModelOnly::class));
    }

    public function test_ancestor_without_new_collection_is_not_a_shadow(): void
    {
        $this->assertFalse($this->detector->isShadowed(NotShadowedByPlainAncestor::class));
    }

    public function test_unknown_class_is_not_a_shadow(): void
    {
        $this->assertFalse($this->detector->isShadowed('App\\Models\\DoesNotExist'));
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
