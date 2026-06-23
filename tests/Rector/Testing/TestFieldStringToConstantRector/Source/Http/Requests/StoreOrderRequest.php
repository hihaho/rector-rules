<?php

declare(strict_types=1);

namespace Hihaho\RectorRules\Tests\Rector\Testing\TestFieldStringToConstantRector\Source\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Test double for an endpoint's FormRequest, whose first-party public string constants
 * name the request fields the rule rewrites against. The constants are consumed by
 * {@see rules()} so the auto-fix deadcode pass keeps them.
 */
class StoreOrderRequest extends FormRequest
{
    public const string ID = 'id';

    public const string NAME = 'name';

    /**
     * A non-`string` constant. The rule's `to_literal` direction only inlines `string`
     * field constants, so a key written with this one is left untouched (the type/drift
     * guard) — exercised by a fixture.
     */
    public const int MAX_ITEMS = 50;

    /** @return array<string, string> */
    public function rules(): array
    {
        return [
            self::ID => 'required|integer',
            self::NAME => 'required|string',
        ];
    }

    public function maxItems(): int
    {
        return self::MAX_ITEMS;
    }
}
