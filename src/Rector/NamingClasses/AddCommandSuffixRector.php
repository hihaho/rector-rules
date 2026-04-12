<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses;

use Illuminate\Console\Command;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\AddCommandSuffixRector\AddCommandSuffixRectorTest
 */
final class AddCommandSuffixRector extends AbstractAddSuffixRector
{
    protected function baseClass(): string
    {
        return Command::class;
    }

    protected function suffix(): string
    {
        return 'Command';
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Add "Command" suffix to classes extending Illuminate\Console\Command',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
use Illuminate\Console\Command;

class NotifyUsers extends Command
{
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
use Illuminate\Console\Command;

class NotifyUsersCommand extends Command
{
}
CODE_SAMPLE,
                ),
            ],
        );
    }
}
