<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses;

use Illuminate\Mail\Mailable;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Hihaho\RectorRules\Tests\Rector\NamingClasses\AddMailSuffixRector\AddMailSuffixRectorTest
 */
final class AddMailSuffixRector extends AbstractAddSuffixRector
{
    protected function baseClass(): string
    {
        return Mailable::class;
    }

    protected function suffix(): string
    {
        return 'Mail';
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Add "Mail" suffix to classes extending Illuminate\Mail\Mailable',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
use Illuminate\Mail\Mailable;

class AccountActivated extends Mailable
{
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
use Illuminate\Mail\Mailable;

class AccountActivatedMail extends Mailable
{
}
CODE_SAMPLE,
                ),
            ],
        );
    }
}
