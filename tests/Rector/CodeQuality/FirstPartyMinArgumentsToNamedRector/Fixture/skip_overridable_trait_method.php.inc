<?php

namespace Hihaho\RectorRules\Tests\Rector\CodeQuality\FirstPartyMinArgumentsToNamedRector\Source\FirstParty\Concerns;

// A class that uses the trait can replace a protected, public or abstract method
// with one whose parameters have other names.
trait BuildsLabels
{
    public function render(string $value): string
    {
        return $this->label($value, 'a', 'b')
            . $this->title($value, 'a', 'b')
            . $this->suffix($value, 'a', 'b')
            . self::caption($value, 'a', 'b');
    }

    protected function label(string $value, string $prefix, string $suffix): string
    {
        return $prefix . $value . $suffix;
    }

    public function title(string $value, string $prefix, string $suffix): string
    {
        return $prefix . $value . $suffix;
    }

    abstract private function suffix(string $value, string $prefix, string $suffix): string;

    protected static function caption(string $value, string $prefix, string $suffix): string
    {
        return $prefix . $value . $suffix;
    }
}

?>
