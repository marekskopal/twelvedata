<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class StatisticsStatistics
{
    public function __construct(
        public StatisticsValuationsMetrics $valuationsMetrics,
        public StatisticsFinancials $financials,
        public StatisticsStockStatistics $stockStatistics,
        public StatisticsStockPriceSummary $stockPriceSummary,
        public StatisticsDividendsAndSplits $dividendsAndSplits,
    ) {
    }

    /**
     * @param array{
     *     valuations_metrics: array{
     *         market_capitalization: int,
     *         enterprise_value: int,
     *         trailing_pe: float|null,
     *         forward_pe: float|null,
     *         peg_ratio: float|null,
     *         price_to_sales_ttm: float|null,
     *         price_to_book_mrq: float|null,
     *         enterprise_to_revenue: float|null,
     *         enterprise_to_ebitda: float|null,
     *     },
     *     financials: array{
     *         fiscal_year_ends: string|null,
     *         most_recent_quarter: string|null,
     *         profit_margin: float|null,
     *         operating_margin: float|null,
     *         return_on_assets_ttm: float|null,
     *         return_on_equity_ttm: float|null,
     *         income_statement: array{
     *             revenue_ttm: int,
     *             revenue_per_share_ttm: float|null,
     *             quarterly_revenue_growth: float|null,
     *             gross_profit_ttm: int,
     *             ebitda: int,
     *             net_income_to_common_ttm: int,
     *             diluted_eps_ttm: float|null,
     *             quarterly_earnings_growth_yoy: float|null,
     *         },
     *         balance_sheet: array{
     *             total_cash_mrq: int|null,
     *             total_cash_per_share_mrq: float|null,
     *             total_debt_mrq: int|null,
     *             total_debt_to_equity_mrq: float|null,
     *             current_ratio_mrq: float|null,
     *             book_value_per_share_mrq: float|null,
     *         },
     *         cash_flow: array{
     *             operating_cash_flow_ttm: int,
     *             levered_free_cash_flow_ttm: int,
     *         },
     *     },
     *     stock_statistics: array{
     *         shares_outstanding: int|null,
     *         float_shares: int|null,
     *         avg_10_volume: int|null,
     *         avg_90_volume: int|null,
     *         shares_short: int|null,
     *         short_ratio: float|null,
     *         short_percent_of_shares_outstanding: float|null,
     *         percent_held_by_insiders: float|null,
     *         percent_held_by_institutions: float|null,
     *     },
     *     stock_price_summary: array{
     *         fifty_two_week_low: float,
     *         fifty_two_week_high: float,
     *         fifty_two_week_change: float,
     *         beta: float|null,
     *         day_50_ma: float,
     *         day_200_ma: float,
     *     },
     *     dividends_and_splits: array{
     *         forward_annual_dividend_rate: float|null,
     *         forward_annual_dividend_yield: float|null,
     *         trailing_annual_dividend_rate: float|null,
     *         trailing_annual_dividend_yield: float|null,
     *         "5_year_average_dividend_yield": float|null,
     *         payout_ratio: float|null,
     *         dividend_date: string|null,
     *         ex_dividend_date: string|null,
     *         last_split_factor: string|null,
     *         last_split_date: string|null,
     *     },
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            valuationsMetrics: StatisticsValuationsMetrics::fromArray($data['valuations_metrics']),
            financials: StatisticsFinancials::fromArray($data['financials']),
            stockStatistics: StatisticsStockStatistics::fromArray($data['stock_statistics']),
            stockPriceSummary: StatisticsStockPriceSummary::fromArray($data['stock_price_summary']),
            dividendsAndSplits: StatisticsDividendsAndSplits::fromArray($data['dividends_and_splits']),
        );
    }
}
