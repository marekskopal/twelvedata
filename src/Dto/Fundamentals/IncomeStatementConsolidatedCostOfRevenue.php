<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedCostOfRevenueType array{
 *     cost_of_revenue_value: int,
 *     excise_taxes?: int,
 *     reconciled_cost_of_revenue: int,
 * }
 */
readonly class IncomeStatementConsolidatedCostOfRevenue
{
    public function __construct(public int $costOfRevenueValue, public ?int $exciseTaxes, public int $reconciledCostOfRevenue,)
    {
    }

    /** @param IncomeStatementConsolidatedCostOfRevenueType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            costOfRevenueValue: $data['cost_of_revenue_value'],
            exciseTaxes: $data['excise_taxes'] ?? null,
            reconciledCostOfRevenue: $data['reconciled_cost_of_revenue'],
        );
    }
}
