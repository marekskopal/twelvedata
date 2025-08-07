<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type IncomeStatementConsolidatedCostOfRevenueType from IncomeStatementConsolidatedCostOfRevenue
 * @phpstan-type IncomeStatementConsolidatedGrossProfitType array{
 *     gross_profit_value: int,
 *     cost_of_revenue: IncomeStatementConsolidatedCostOfRevenueType,
 * }
 */
readonly class IncomeStatementConsolidatedGrossProfit
{
    public function __construct(public int $grossProfitValue, public IncomeStatementConsolidatedCostOfRevenue $costOfRevenue,)
    {
    }

    /** @param IncomeStatementConsolidatedGrossProfitType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            grossProfitValue: $data['gross_profit_value'],
            costOfRevenue: IncomeStatementConsolidatedCostOfRevenue::fromArray($data['cost_of_revenue']),
        );
    }
}
