<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\RenamePropagation;

/**
 * @see \Hihaho\RectorRules\Rector\NamingClasses\AddNotificationSuffixRector
 */
final class NotificationRenamePropagationTest extends AbstractRenamePropagationTestCase
{
    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/notification_rule.php';
    }

    public function test_rewrites_a_reference_in_a_file_processed_before_the_declaration(): void
    {
        $this->processCorpus();

        $caller = $this->corpusContents('Actions/DispatchOrderShipped.php');

        $this->assertStringContainsString('OrderShippedNotification', $caller);
        $this->assertStringNotContainsString('new OrderShipped(', $caller);
        $this->assertStringNotContainsString('OrderShipped::class', $caller);
    }

    public function test_rewrites_a_docblock_reference(): void
    {
        $this->processCorpus();

        $this->assertStringContainsString(
            'OrderShippedNotification|null',
            $this->corpusContents('Actions/DispatchOrderShipped.php'),
        );
    }

    public function test_rewrites_a_see_tag_that_is_the_only_reference(): void
    {
        $this->processCorpus();

        $reference = $this->corpusContents('Docs/OrderShippedReference.php');

        // Fully qualified, because the tag only resolved through an import — the tag now
        // stands on its own rather than depending on one.
        $this->assertStringContainsString('{@see \\App\\Notifications\\OrderShippedNotification}', $reference);
        $this->assertStringContainsString('@see \\App\\Notifications\\OrderShippedNotification', $reference);
        $this->assertStringNotContainsString('{@see OrderShipped}', $reference);
    }

    public function test_does_not_leave_a_dangling_import_behind_a_see_tag(): void
    {
        $this->processCorpus();

        $reference = $this->corpusContents('Docs/OrderShippedReference.php');

        // The old import names a class that no longer exists; nothing in a normal
        // quality gate would report it.
        $this->assertStringNotContainsString('use App\\Notifications\\OrderShipped;', $reference);
    }

    public function test_renames_the_declaration_and_its_file(): void
    {
        $this->processCorpus();

        $this->assertFileExists($this->corpusPath('Notifications/OrderShippedNotification.php'));
        $this->assertFileDoesNotExist($this->corpusPath('Notifications/OrderShipped.php'));
        $this->assertStringContainsString(
            'class OrderShippedNotification',
            $this->corpusContents('Notifications/OrderShippedNotification.php'),
        );
    }

    public function test_leaves_an_already_suffixed_class_and_its_file_alone(): void
    {
        $this->processCorpus();

        $this->assertFileExists($this->corpusPath('Notifications/InvoicePaidNotification.php'));
        $this->assertStringContainsString(
            'class InvoicePaidNotification',
            $this->corpusContents('Notifications/InvoicePaidNotification.php'),
        );
    }

    public function test_skips_a_class_whose_destination_name_is_already_taken(): void
    {
        $this->processCorpus();

        // `ReceiptSent` cannot become `ReceiptSentNotification` — that class already
        // exists elsewhere in the corpus, and renaming would merge two types.
        $this->assertFileExists($this->corpusPath('Notifications/ReceiptSent.php'));
        $this->assertStringContainsString(
            'class ReceiptSent extends',
            $this->corpusContents('Notifications/ReceiptSent.php'),
        );
    }

    public function test_leaves_a_file_whose_basename_never_matched_the_class_alone(): void
    {
        $this->processCorpus();

        // The class is still renamed; only the file is left where it is, because PSR-4
        // was never relying on its name.
        $this->assertFileExists($this->corpusPath('Notifications/oddly_named.php'));
        $this->assertStringContainsString(
            'class PaymentFailedNotification',
            $this->corpusContents('Notifications/oddly_named.php'),
        );
    }

    /**
     * @return array<string, string>
     */
    protected static function corpusFiles(): array
    {
        return [
            // Actions/ sorts before Notifications/, so the reference is processed first.
            'Actions/DispatchOrderShipped.php' => <<<'PHP'
                <?php

                namespace App\Actions;

                use App\Notifications\OrderShipped;

                class DispatchOrderShipped
                {
                    /** @var OrderShipped|null */
                    private $lastSent;

                    public function handle($customer, $order): void
                    {
                        $customer->notify(new OrderShipped($order));

                        $name = OrderShipped::class;
                    }
                }

                PHP,
            // Imports OrderShipped and mentions it ONLY from a docblock tag — the shape
            // where a stale tag also leaves the import pointing at a class that is gone.
            'Docs/OrderShippedReference.php' => <<<'PHP'
                <?php

                namespace App\Docs;

                use App\Notifications\OrderShipped;

                /**
                 * Delivered the same way {@see OrderShipped} is.
                 *
                 * @see OrderShipped
                 */
                class OrderShippedReference
                {
                }

                PHP,
            'Notifications/OrderShipped.php' => self::notification('OrderShipped'),
            'Notifications/InvoicePaidNotification.php' => self::notification('InvoicePaidNotification'),
            'Notifications/ReceiptSent.php' => self::notification('ReceiptSent'),
            'Notifications/ReceiptSentNotification.php' => self::notification('ReceiptSentNotification'),
            'Notifications/oddly_named.php' => self::notification('PaymentFailed'),
        ];
    }

    private static function notification(string $className): string
    {
        return <<<PHP
            <?php

            namespace App\Notifications;

            use Illuminate\Notifications\Notification;

            class {$className} extends Notification
            {
            }

            PHP;
    }
}
