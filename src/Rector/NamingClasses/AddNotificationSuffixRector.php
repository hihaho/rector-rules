<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Rector\NamingClasses;

use Hihaho\RectorRules\Tests\Rector\NamingClasses\AddNotificationSuffixRector\AddNotificationSuffixRectorTest;
use Illuminate\Notifications\Notification;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see AddNotificationSuffixRectorTest
 */
final class AddNotificationSuffixRector extends AbstractAddSuffixRector
{
    protected function baseClass(): string
    {
        return Notification::class;
    }

    protected function suffix(): string
    {
        return 'Notification';
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Add "Notification" suffix to classes extending Illuminate\Notifications\Notification',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
}
CODE_SAMPLE,
                ),
            ],
        );
    }
}
