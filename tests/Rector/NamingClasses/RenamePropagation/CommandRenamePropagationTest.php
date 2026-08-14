<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\NamingClasses\RenamePropagation;

/**
 * Artisan discovers commands by deriving the FQCN from the file path, so for this rule
 * the *file* rename is the point: a renamed class in an unrenamed file silently drops
 * out of `php artisan list` with no static error anywhere.
 *
 * @see \Hihaho\RectorRules\Rector\NamingClasses\AddCommandSuffixRector
 */
final class CommandRenamePropagationTest extends AbstractRenamePropagationTestCase
{
    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/command_rule.php';
    }

    public function test_rewrites_a_reference_in_a_file_processed_before_the_declaration(): void
    {
        $this->processCorpus();

        $registrar = $this->corpusContents('Console/CommandRegistrar.php');

        $this->assertStringContainsString('ImportArticlesCommand', $registrar);
        $this->assertStringNotContainsString('ImportArticles::class', $registrar);
    }

    public function test_renames_the_file_so_path_discovery_keeps_working(): void
    {
        $this->processCorpus();

        $this->assertFileExists($this->corpusPath('Console/Commands/ImportArticlesCommand.php'));
        $this->assertFileDoesNotExist($this->corpusPath('Console/Commands/ImportArticles.php'));
        $this->assertStringContainsString(
            'class ImportArticlesCommand',
            $this->corpusContents('Console/Commands/ImportArticlesCommand.php'),
        );
    }

    public function test_leaves_an_already_suffixed_command_alone(): void
    {
        $this->processCorpus();

        $this->assertFileExists($this->corpusPath('Console/Commands/PruneLogsCommand.php'));
    }

    /**
     * @return array<string, string>
     */
    protected static function corpusFiles(): array
    {
        return [
            // Console/CommandRegistrar.php sorts before Console/Commands/.
            'Console/CommandRegistrar.php' => <<<'PHP'
                <?php

                namespace App\Console;

                use App\Console\Commands\ImportArticles;

                class CommandRegistrar
                {
                    public function commands(): array
                    {
                        return [ImportArticles::class];
                    }
                }

                PHP,
            'Console/Commands/ImportArticles.php' => self::command('ImportArticles'),
            'Console/Commands/PruneLogsCommand.php' => self::command('PruneLogsCommand'),
        ];
    }

    private static function command(string $className): string
    {
        return <<<PHP
            <?php

            namespace App\Console\Commands;

            use Illuminate\Console\Command;

            class {$className} extends Command
            {
            }

            PHP;
    }
}
