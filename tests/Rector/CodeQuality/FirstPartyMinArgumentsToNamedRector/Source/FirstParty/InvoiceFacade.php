<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Invoice addLine(string $label, int $amount, string $memo = '')
 */
final class InvoiceFacade extends Facade
{
    public static function format(string $number, int $year, bool $draft): string
    {
        return $draft ? "{$number}-{$year}-draft" : "{$number}-{$year}";
    }

    protected static function getFacadeAccessor(): string
    {
        return 'invoice';
    }
}
