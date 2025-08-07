<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedRevenueType array{
 *     total_revenue: int,
 *     operating_revenue: int,
 * }
 */
readonly class IncomeStatementConsolidatedRevenue
{
    public function __construct(public int $totalRevenue, public int $operatingRevenue,)
    {
    }

    /** @param IncomeStatementConsolidatedRevenueType $data */
    public static function fromArray(array $data): self
    {
        return new self(totalRevenue: $data['total_revenue'], operatingRevenue: $data['operating_revenue']);
    }
}
