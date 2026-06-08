<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

class SessionModel
{
    public const string CUSTOM_DISCOUNTS = 'customDiscounts';

    public function ensureDiscountsLoaded(): mixed
    {
        if (! $this->relationLoaded('customDiscounts')) {
            $this->load(['customDiscounts']);
        }

        return $this->getRelation('customDiscounts');
    }
}
-----
<?php

namespace Hihaho\RectorRules\Tests\Rector\Eloquent\RelationNameToClassConstantRector\Fixture;

class SessionModel
{
    public const string CUSTOM_DISCOUNTS = 'customDiscounts';

    public function ensureDiscountsLoaded(): mixed
    {
        if (! $this->relationLoaded(self::CUSTOM_DISCOUNTS)) {
            $this->load([self::CUSTOM_DISCOUNTS]);
        }

        return $this->getRelation(self::CUSTOM_DISCOUNTS);
    }
}
