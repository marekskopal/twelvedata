<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-import-type StatisticsIncomeStatementType from StatisticsIncomeStatement
 * @phpstan-import-type StatisticsBalanceSheetType from StatisticsBalanceSheet
 * @phpstan-import-type StatisticsCashFlowType from StatisticsCashFlow
 * @phpstan-type StatisticsFinancialsType array{
 *     fiscal_year_ends: string|null,
 *     most_recent_quarter: string|null,
 *     profit_margin: float|null,
 *     operating_margin: float|null,
 *     return_on_assets_ttm: float|null,
 *     return_on_equity_ttm: float|null,
 *     income_statement: StatisticsIncomeStatementType,
 *     balance_sheet: StatisticsBalanceSheetType,
 *     cash_flow: StatisticsCashFlowType,
 * }
 */
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

    /** @param StatisticsFinancialsType $data */
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
