<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class Statistics
{
    public function __construct(public Meta $meta, public StatisticsStatistics $statistics)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     meta: array{
         *         symbol: string,
         *         name: string,
         *         currency: string,
         *         exchange: string,
         *         mic_code: string,
         *         exchange_timezone: string,
         *     },
         *     statistics: array{
         *         valuations_metrics: array{
         *             market_capitalization: int,
         *             enterprise_value: int,
         *             trailing_pe: float,
         *             forward_pe: float,
         *             peg_ratio: float,
         *             price_to_sales_ttm: float,
         *             price_to_book_mrq: float,
         *             enterprise_to_revenue: float,
         *             enterprise_to_ebitda: float,
         *         },
         *         financials: array{
         *             fiscal_year_ends: string,
         *             most_recent_quarter: string,
         *             profit_margin: float,
         *             operating_margin: float,
         *             return_on_assets_ttm: float,
         *             return_on_equity_ttm: float,
         *             income_statement: array{
         *                 revenue_ttm: int,
         *                 revenue_per_share_ttm: float,
         *                 quarterly_revenue_growth: float,
         *                 gross_profit_ttm: int,
         *                 ebitda: int,
         *                 net_income_to_common_ttm: int,
         *                 diluted_eps_ttm: float,
         *                 quarterly_earnings_growth_yoy: float,
         *             },
         *             balance_sheet: array{
         *                 total_cash_mrq: int,
         *                 total_cash_per_share_mrq: float,
         *                 total_debt_mrq: int,
         *                 total_debt_to_equity_mrq: float,
         *                 current_ratio_mrq: float,
         *                 book_value_per_share_mrq: float,
         *             },
         *             cash_flow: array{
         *                 operating_cash_flow_ttm: int,
         *                 levered_free_cash_flow_ttm: int,
         *             },
         *         },
         *         stock_statistics: array{
         *             shares_outstanding: int,
         *             float_shares: int,
         *             avg_10_volume: int,
         *             avg_90_volume: int,
         *             shares_short: int,
         *             short_ratio: float,
         *             short_percent_of_shares_outstanding: float,
         *             percent_held_by_insiders: float,
         *             percent_held_by_institutions: float,
         *         },
         *         stock_price_summary: array{
         *            fifty_two_week_low: float,
         *            fifty_two_week_high: float,
         *            fifty_two_week_change: float,
         *            beta: float,
         *            day_50_ma: float,
         *            day_200_ma: float,
         *        },
         *        dividends_and_splits: array{
         *            forward_annual_dividend_rate: float,
         *            forward_annual_dividend_yield: float,
         *            trailing_annual_dividend_rate: float,
         *            trailing_annual_dividend_yield: float,
         *            "5_year_average_dividend_yield": float,
         *            payout_ratio: float,
         *            dividend_date: string,
         *            ex_dividend_date: string,
         *            last_split_factor: string,
         *            last_split_date: string,
         *        },
         *     },
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     meta: array{
     *         symbol: string,
     *         name: string,
     *         currency: string,
     *         exchange: string,
     *         mic_code: string,
     *         exchange_timezone: string,
     *     },
     *     statistics: array{
     *         valuations_metrics: array{
     *             market_capitalization: int,
     *             enterprise_value: int,
     *             trailing_pe: float,
     *             forward_pe: float,
     *             peg_ratio: float,
     *             price_to_sales_ttm: float,
     *             price_to_book_mrq: float,
     *             enterprise_to_revenue: float,
     *             enterprise_to_ebitda: float,
     *         },
     *         financials: array{
     *             fiscal_year_ends: string,
     *             most_recent_quarter: string,
     *             profit_margin: float,
     *             operating_margin: float,
     *             return_on_assets_ttm: float,
     *             return_on_equity_ttm: float,
     *             income_statement: array{
     *                 revenue_ttm: int,
     *                 revenue_per_share_ttm: float,
     *                 quarterly_revenue_growth: float,
     *                 gross_profit_ttm: int,
     *                 ebitda: int,
     *                 net_income_to_common_ttm: int,
     *                 diluted_eps_ttm: float,
     *                 quarterly_earnings_growth_yoy: float,
     *             },
     *             balance_sheet: array{
     *                 total_cash_mrq: int,
     *                 total_cash_per_share_mrq: float,
     *                 total_debt_mrq: int,
     *                 total_debt_to_equity_mrq: float,
     *                 current_ratio_mrq: float,
     *                 book_value_per_share_mrq: float,
     *             },
     *             cash_flow: array{
     *                 operating_cash_flow_ttm: int,
     *                 levered_free_cash_flow_ttm: int,
     *             },
     *         },
     *         stock_statistics: array{
     *             shares_outstanding: int,
     *             float_shares: int,
     *             avg_10_volume: int,
     *             avg_90_volume: int,
     *             shares_short: int,
     *             short_ratio: float,
     *             short_percent_of_shares_outstanding: float,
     *             percent_held_by_insiders: float,
     *             percent_held_by_institutions: float,
     *         },
     *         stock_price_summary: array{
     *            fifty_two_week_low: float,
     *            fifty_two_week_high: float,
     *            fifty_two_week_change: float,
     *            beta: float,
     *            day_50_ma: float,
     *            day_200_ma: float,
     *        },
     *        dividends_and_splits: array{
     *            forward_annual_dividend_rate: float,
     *            forward_annual_dividend_yield: float,
     *            trailing_annual_dividend_rate: float,
     *            trailing_annual_dividend_yield: float,
     *            "5_year_average_dividend_yield": float,
     *            payout_ratio: float,
     *            dividend_date: string,
     *            ex_dividend_date: string,
     *            last_split_factor: string,
     *            last_split_date: string,
     *        },
     *     },
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            statistics: StatisticsStatistics::fromArray($data['statistics']),
        );
    }
}
