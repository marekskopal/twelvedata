<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

readonly class StatisticsFinancials
{
    public function __construct(
        public ?DateTimeImmutable $fiscalYearEnds,
        public ?DateTimeImmutable $mostRecentQuarter,
        public ?float $profitMargin,
        public ?float $operatingMargin,
        public ?float $returnOnAssetsTtm,
        public ?float $returnOnEquityTtm,
        public StatisticsIncomeStatement $incomeStatement,
        public StatisticsBalanceSheet $balanceSheet,
        public StatisticsCashFlow $cashFlow,
    ) {
    }

    /**
     * @param array{
     *     fiscal_year_ends: string|null,
     *     most_recent_quarter: string|null,
     *     profit_margin: float|null,
     *     operating_margin: float|null,
     *     return_on_assets_ttm: float|null,
     *     return_on_equity_ttm: float|null,
     *     income_statement: array{
     *          revenue_ttm: int,
     *          revenue_per_share_ttm: float|null,
     *          quarterly_revenue_growth: float|null,
     *          gross_profit_ttm: int,
     *          ebitda: int,
     *          net_income_to_common_ttm: int,
     *          diluted_eps_ttm: float|null,
     *          quarterly_earnings_growth_yoy: float|null,
     *     },
     *     balance_sheet: array{
     *          total_cash_mrq: int|null,
     *          total_cash_per_share_mrq: float|null,
     *          total_debt_mrq: int|null,
     *          total_debt_to_equity_mrq: float|null,
     *          current_ratio_mrq: float|null,
     *          book_value_per_share_mrq: float|null,
     *     },
     *     cash_flow: array{
     *          operating_cash_flow_ttm: int,
     *          levered_free_cash_flow_ttm: int,
     *     },
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            fiscalYearEnds: $data['fiscal_year_ends'] !== null ? new DateTimeImmutable($data['fiscal_year_ends']) : null,
            mostRecentQuarter: $data['most_recent_quarter'] !== null ? new DateTimeImmutable($data['most_recent_quarter']) : null,
            profitMargin: $data['profit_margin'],
            operatingMargin: $data['operating_margin'],
            returnOnAssetsTtm: $data['return_on_assets_ttm'],
            returnOnEquityTtm: $data['return_on_equity_ttm'],
            incomeStatement: StatisticsIncomeStatement::fromArray($data['income_statement']),
            balanceSheet: StatisticsBalanceSheet::fromArray($data['balance_sheet']),
            cashFlow: StatisticsCashFlow::fromArray($data['cash_flow']),
        );
    }
}
