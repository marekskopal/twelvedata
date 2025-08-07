<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-import-type IncomeStatementConsolidatedRevenueType from IncomeStatementConsolidatedRevenue
 * @phpstan-import-type IncomeStatementConsolidatedGrossProfitType from IncomeStatementConsolidatedGrossProfit
 * @phpstan-import-type IncomeStatementConsolidatedOperatingIncomeType from IncomeStatementConsolidatedOperatingIncome
 * @phpstan-import-type IncomeStatementConsolidatedNetIncomeType from IncomeStatementConsolidatedNetIncome
 * @phpstan-import-type IncomeStatementConsolidatedEarningsPerShareType from IncomeStatementConsolidatedEarningsPerShare
 * @phpstan-import-type IncomeStatementConsolidatedExpensesType from IncomeStatementConsolidatedExpenses
 * @phpstan-import-type IncomeStatementConsolidatedOtherIncomeAndExpensesType from IncomeStatementConsolidatedOtherIncomeAndExpenses
 * @phpstan-import-type IncomeStatementConsolidatedTaxesType from IncomeStatementConsolidatedTaxes
 * @phpstan-import-type IncomeStatementDepreciationAndAmortizationType from IncomeStatementDepreciationAndAmortization
 * @phpstan-import-type IncomeStatementConsolidatedEbitdaType from IncomeStatementConsolidatedEbitda
 * @phpstan-import-type IncomeStatementConsolidatedDividendsAndSharesType from IncomeStatementConsolidatedDividendsAndShares
 * @phpstan-import-type IncomeStatementConsolidatedUnusualItemsType from IncomeStatementConsolidatedUnusualItems
 * @phpstan-import-type IncomeStatementConsolidatedDepreciationType from IncomeStatementConsolidatedDepreciation
 * @phpstan-import-type IncomeStatementConsolidatedPretaxIncomeType from IncomeStatementConsolidatedPretaxIncome
 * @phpstan-import-type IncomeStatementConsolidatedSpecialIncomeChargesType from IncomeStatementConsolidatedSpecialIncomeCharges
 * @phpstan-type IncomeStatementConsolidatedIncomeStatementType array{
 *     fiscal_date: string,
 *     year: int,
 *     revenue: IncomeStatementConsolidatedRevenueType,
 *     gross_profit: IncomeStatementConsolidatedGrossProfitType,
 *     operating_income: IncomeStatementConsolidatedOperatingIncomeType,
 *     net_income: IncomeStatementConsolidatedNetIncomeType,
 *     earnings_per_share: IncomeStatementConsolidatedEarningsPerShareType,
 *     expenses: IncomeStatementConsolidatedExpensesType,
 *     other_income_and_expenses: IncomeStatementConsolidatedOtherIncomeAndExpensesType,
 *     taxes: IncomeStatementConsolidatedTaxesType,
 *     depreciation_and_amortization?: IncomeStatementDepreciationAndAmortizationType,
 *     ebitda: IncomeStatementConsolidatedEbitdaType,
 *     dividends_and_shares: IncomeStatementConsolidatedDividendsAndSharesType,
 *     unusual_items?: IncomeStatementConsolidatedUnusualItemsType,
 *     depreciation: IncomeStatementConsolidatedDepreciationType,
 *     pretax_income: IncomeStatementConsolidatedPretaxIncomeType,
 *     special_income_charges?: IncomeStatementConsolidatedSpecialIncomeChargesType,
 * }
 */
readonly class IncomeStatementConsolidatedIncomeStatement
{
    public function __construct(
        public DateTimeImmutable $fiscalDate,
        public int $year,
        public IncomeStatementConsolidatedRevenue $revenue,
        public IncomeStatementConsolidatedGrossProfit $grossProfit,
        public IncomeStatementConsolidatedOperatingIncome $operatingIncome,
        public IncomeStatementConsolidatedNetIncome $netIncome,
        public IncomeStatementConsolidatedEarningsPerShare $earningsPerShare,
        public IncomeStatementConsolidatedExpenses $expenses,
        public IncomeStatementConsolidatedOtherIncomeAndExpenses $otherIncomeAndExpenses,
        public IncomeStatementConsolidatedTaxes $taxes,
        public ?IncomeStatementDepreciationAndAmortization $depreciationAndAmortization,
        public IncomeStatementConsolidatedEbitda $ebitda,
        public IncomeStatementConsolidatedDividendsAndShares $dividendsAndShares,
        public ?IncomeStatementConsolidatedUnusualItems $unusualItems,
        public IncomeStatementConsolidatedDepreciation $depreciation,
        public IncomeStatementConsolidatedPretaxIncome $pretaxIncome,
        public ?IncomeStatementConsolidatedSpecialIncomeCharges $specialIncomeCharges,
    ) {
    }

    /** @param IncomeStatementConsolidatedIncomeStatementType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            fiscalDate: new DateTimeImmutable($data['fiscal_date']),
            year: $data['year'],
            revenue: IncomeStatementConsolidatedRevenue::fromArray($data['revenue']),
            grossProfit: IncomeStatementConsolidatedGrossProfit::fromArray($data['gross_profit']),
            operatingIncome: IncomeStatementConsolidatedOperatingIncome::fromArray($data['operating_income']),
            netIncome: IncomeStatementConsolidatedNetIncome::fromArray($data['net_income']),
            earningsPerShare: IncomeStatementConsolidatedEarningsPerShare::fromArray($data['earnings_per_share']),
            expenses: IncomeStatementConsolidatedExpenses::fromArray($data['expenses']),
            otherIncomeAndExpenses: IncomeStatementConsolidatedOtherIncomeAndExpenses::fromArray($data['other_income_and_expenses']),
            taxes: IncomeStatementConsolidatedTaxes::fromArray($data['taxes']),
            depreciationAndAmortization: ($data['depreciation_and_amortization'] ?? null) !== null ? IncomeStatementDepreciationAndAmortization::fromArray(
                $data['depreciation_and_amortization'],
            ) : null,
            ebitda: IncomeStatementConsolidatedEbitda::fromArray($data['ebitda']),
            dividendsAndShares: IncomeStatementConsolidatedDividendsAndShares::fromArray($data['dividends_and_shares']),
            unusualItems: ($data['unusual_items'] ?? null) !== null ? IncomeStatementConsolidatedUnusualItems::fromArray(
                $data['unusual_items'],
            ) : null,
            depreciation: IncomeStatementConsolidatedDepreciation::fromArray($data['depreciation']),
            pretaxIncome: IncomeStatementConsolidatedPretaxIncome::fromArray($data['pretax_income']),
            specialIncomeCharges: ($data['special_income_charges'] ?? null) !== null ? IncomeStatementConsolidatedSpecialIncomeCharges::fromArray(
                $data['special_income_charges'],
            ) : null,
        );
    }
}
