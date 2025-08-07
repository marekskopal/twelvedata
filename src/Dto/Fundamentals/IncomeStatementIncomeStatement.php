<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-import-type IncomeStatementOperationExpenseType from IncomeStatementOperationExpense
 * @phpstan-import-type IncomeStatementNonOperatingInterestType from IncomeStatementNonOperatingInterest
 * @phpstan-type IncomeStatementIncomeStatementType array{
 *     fiscal_date: string,
 *     quarter?: int,
 *     sales: int,
 *     cost_of_goods: int,
 *     gross_profit: int,
 *     operating_expense: IncomeStatementOperationExpenseType,
 *     operating_income: int,
 *     non_operating_interest: IncomeStatementNonOperatingInterestType,
 *     other_income_expense: int,
 *     pretax_income: int,
 *     income_tax: int,
 *     net_income: int,
 *     eps_basic: float|null,
 *     eps_diluted: float|null,
 *     basic_shares_outstanding: int|null,
 *     diluted_shares_outstanding: int|null,
 *     ebitda: int,
 *     net_income_continuous_operations: int|null,
 *     minority_interests: int|null,
 *     preferred_stock_dividends: int|null,
 * }
 */
readonly class IncomeStatementIncomeStatement
{
    public function __construct(
        public DateTimeImmutable $fiscalDate,
        public ?int $quarter,
        public int $sales,
        public int $costOfGoods,
        public int $grossProfit,
        public IncomeStatementOperationExpense $operatingExpense,
        public int $operatingIncome,
        public IncomeStatementNonOperatingInterest $nonOperatingInterest,
        public int $otherIncomeExpense,
        public int $pretaxIncome,
        public int $incomeTax,
        public int $netIncome,
        public ?float $epsBasic,
        public ?float $epsDiluted,
        public ?int $basicSharesOutstanding,
        public ?int $dilutedSharesOutstanding,
        public int $ebitda,
        public ?int $netIncomeContinuousOperations,
        public ?int $minorityInterests,
        public ?int $preferredStockDividends,
    ) {
    }

    /** @param IncomeStatementIncomeStatementType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            fiscalDate: new DateTimeImmutable($data['fiscal_date']),
            quarter: $data['quarter'] ?? null,
            sales: $data['sales'],
            costOfGoods: $data['cost_of_goods'],
            grossProfit: $data['gross_profit'],
            operatingExpense: IncomeStatementOperationExpense::fromArray($data['operating_expense']),
            operatingIncome: $data['operating_income'],
            nonOperatingInterest: IncomeStatementNonOperatingInterest::fromArray($data['non_operating_interest']),
            otherIncomeExpense: $data['other_income_expense'],
            pretaxIncome: $data['pretax_income'],
            incomeTax: $data['income_tax'],
            netIncome: $data['net_income'],
            epsBasic: $data['eps_basic'],
            epsDiluted: $data['eps_diluted'],
            basicSharesOutstanding: $data['basic_shares_outstanding'],
            dilutedSharesOutstanding: $data['diluted_shares_outstanding'],
            ebitda: $data['ebitda'],
            netIncomeContinuousOperations: $data['net_income_continuous_operations'],
            minorityInterests: $data['minority_interests'],
            preferredStockDividends: $data['preferred_stock_dividends'],
        );
    }
}
