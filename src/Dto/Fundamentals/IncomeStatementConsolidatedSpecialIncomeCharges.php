<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedSpecialIncomeChargesType array{
 *     special_income_charges_value: int,
 * }
 */
readonly class IncomeStatementConsolidatedSpecialIncomeCharges
{
    public function __construct(public int $specialIncomeChargesValue,)
    {
    }

    /** @param IncomeStatementConsolidatedSpecialIncomeChargesType $data */
    public static function fromArray(array $data): self
    {
        return new self(specialIncomeChargesValue: $data['special_income_charges_value']);
    }
}
