<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\RenamePropagation;

/**
 * @see \Hihaho\RectorRules\Rector\NamingClasses\AddMailSuffixRector
 */
final class MailRenamePropagationTest extends AbstractRenamePropagationTestCase
{
    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/mail_rule.php';
    }

    public function test_rewrites_a_reference_in_a_file_processed_before_the_declaration(): void
    {
        $this->processCorpus();

        $sender = $this->corpusContents('Actions/SendAccountActivated.php');

        $this->assertStringContainsString('AccountActivatedMail', $sender);
        $this->assertStringNotContainsString('new AccountActivated(', $sender);
    }

    public function test_renames_the_declaration_and_its_file(): void
    {
        $this->processCorpus();

        $this->assertFileExists($this->corpusPath('Mail/AccountActivatedMail.php'));
        $this->assertFileDoesNotExist($this->corpusPath('Mail/AccountActivated.php'));
    }

    /**
     * @return array<string, string>
     */
    protected static function corpusFiles(): array
    {
        return [
            'Actions/SendAccountActivated.php' => <<<'PHP'
                <?php

                namespace App\Actions;

                use App\Mail\AccountActivated;

                class SendAccountActivated
                {
                    public function handle($mailer): void
                    {
                        $mailer->send(new AccountActivated());
                    }
                }

                PHP,
            'Mail/AccountActivated.php' => <<<'PHP'
                <?php

                namespace App\Mail;

                use Illuminate\Mail\Mailable;

                class AccountActivated extends Mailable
                {
                }

                PHP,
        ];
    }
}
