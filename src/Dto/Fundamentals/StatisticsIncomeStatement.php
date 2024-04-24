<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class StatisticsIncomeStatement
{
    public function __construct(
        public int $revenueTtm,
        public ?float $revenuePerShareTtm,
        public ?float $quarterlyRevenueGrowth,
        public int $grossProfitTtm,
        public int $ebitda,
        public int $netIncomeToCommonTtm,
        public ?float $dilutedEpsTtm,
        public ?float $quarterlyEarningsGrowthYoy,
    ) {
    }

    /**
     * @param array{
     *     revenue_ttm: int,
     *     revenue_per_share_ttm: float|null,
     *     quarterly_revenue_growth: float|null,
     *     gross_profit_ttm: int,
     *     ebitda: int,
     *     net_income_to_common_ttm: int,
     *     diluted_eps_ttm: float|null,
     *     quarterly_earnings_growth_yoy: float|null,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            revenueTtm: $data['revenue_ttm'],
            revenuePerShareTtm: $data['revenue_per_share_ttm'],
            quarterlyRevenueGrowth: $data['quarterly_revenue_growth'],
            grossProfitTtm: $data['gross_profit_ttm'],
            ebitda: $data['ebitda'],
            netIncomeToCommonTtm: $data['net_income_to_common_ttm'],
            dilutedEpsTtm: $data['diluted_eps_ttm'],
            quarterlyEarningsGrowthYoy: $data['quarterly_earnings_growth_yoy'],
        );
    }
}
