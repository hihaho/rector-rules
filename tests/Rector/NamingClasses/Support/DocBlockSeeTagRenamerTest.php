<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\Support;

use Hihaho\RectorRules\Rector\NamingClasses\Support\DocBlockSeeTagRenamer;
use PHPUnit\Framework\TestCase;

/**
 * The name-resolution rules the renamer follows are the fiddly part — short vs qualified,
 * imported vs same-namespace, aliased, ambiguous. Pinned here rather than through a
 * fixture, so each rule fails on its own when it breaks.
 */
final class DocBlockSeeTagRenamerTest extends TestCase
{
    private const array RENAMES = [
        'App\Notifications\OrderShipped' => 'App\Notifications\OrderShippedNotification',
    ];

    public function test_rewrites_a_short_reference_in_the_same_namespace_to_a_short_name(): void
    {
        $result = $this->rename('/** @see OrderShipped */', 'App\Notifications', []);

        $this->assertSame('/** @see OrderShippedNotification */', $result);
    }

    public function test_rewrites_a_fully_qualified_reference_fully_qualified(): void
    {
        $result = $this->rename('/** @see \App\Notifications\OrderShipped */', 'App\Other', []);

        $this->assertSame('/** @see \App\Notifications\OrderShippedNotification */', $result);
    }

    public function test_qualifies_a_short_reference_that_only_resolved_through_an_import(): void
    {
        // The import may be removed as unused once the tag no longer needs it, so the tag
        // must not depend on it.
        $result = $this->rename(
            '/** @see OrderShipped */',
            'App\Docs',
            ['ordershipped' => 'App\Notifications\OrderShipped'],
        );

        $this->assertSame('/** @see \App\Notifications\OrderShippedNotification */', $result);
    }

    public function test_rewrites_an_inline_tag(): void
    {
        $result = $this->rename('/** Behaves like {@see OrderShipped} does. */', 'App\Notifications', []);

        $this->assertSame('/** Behaves like {@see OrderShippedNotification} does. */', $result);
    }

    public function test_preserves_a_member_suffix(): void
    {
        $result = $this->rename('/** @see OrderShipped::toMail() */', 'App\Notifications', []);

        $this->assertSame('/** @see OrderShippedNotification::toMail() */', $result);
    }

    public function test_rewrites_link_and_uses_tags(): void
    {
        $result = $this->rename("/**\n * @link OrderShipped\n * @uses OrderShipped\n */", 'App\Notifications', []);

        $this->assertSame("/**\n * @link OrderShippedNotification\n * @uses OrderShippedNotification\n */", $result);
    }

    public function test_leaves_an_explicitly_aliased_reference_alone(): void
    {
        // `use App\Notifications\OrderShipped as Legacy;` keeps the alias when the import
        // is rewritten, so `{@see Legacy}` is already correct.
        $result = $this->rename(
            '/** @see Legacy */',
            'App\Docs',
            ['legacy' => 'App\Notifications\OrderShipped'],
        );

        $this->assertNull($result);
    }

    public function test_leaves_an_unrelated_reference_alone(): void
    {
        $this->assertNull($this->rename('/** @see SomethingElse */', 'App\Notifications', []));
    }

    public function test_leaves_a_type_tag_alone(): void
    {
        // Rector's own docblock renamer owns type positions; touching them here would
        // fight it.
        $this->assertNull($this->rename('/** @param OrderShipped $x */', 'App\Notifications', []));
    }

    public function test_refuses_to_guess_between_two_classes_sharing_a_short_name(): void
    {
        $renames = [
            'App\Notifications\OrderShipped' => 'App\Notifications\OrderShippedNotification',
            'App\Mail\OrderShipped' => 'App\Mail\OrderShippedMail',
        ];

        // Namespace and imports give nothing to go on, and the short name matches two
        // renamed classes — guessing would rewrite half of them wrongly.
        $result = (new DocBlockSeeTagRenamer())->rename('/** @see OrderShipped */', $renames, 'App\Docs', []);

        $this->assertNull($result);
    }

    public function test_returns_null_when_there_are_no_renames(): void
    {
        $this->assertNull((new DocBlockSeeTagRenamer())->rename('/** @see OrderShipped */', [], 'App\Notifications', []));
    }

    /**
     * @param  array<string, string>  $aliases
     */
    private function rename(string $docBlock, ?string $namespace, array $aliases): ?string
    {
        return (new DocBlockSeeTagRenamer())->rename($docBlock, self::RENAMES, $namespace, $aliases);
    }
}
