<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundExpensesType array{
 *     expense_ratio_gross: float|null,
 *     expense_ratio_net: float|null,
 * }
 */
readonly class MutualFundExpenses
{
    public function __construct(public ?float $expenseRatioGross, public ?float $expenseRatioNet,)
    {
    }

    /** @param MutualFundExpensesType $data */
    public static function fromArray(array $data): self
    {
        return new self(expenseRatioGross: $data['expense_ratio_gross'] ?? null, expenseRatioNet: $data['expense_ratio_net'] ?? null);
    }
}
