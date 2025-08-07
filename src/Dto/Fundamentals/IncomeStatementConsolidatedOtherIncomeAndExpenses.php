<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedOtherIncomeAndExpensesType array{
 *     other_income_expense: int,
 *     other_non_operating_income_expenses: int,
 *     special_income_charges?: int,
 *     gain_on_sale_of_ppe?: int,
 *     gain_on_sale_of_business?: int,
 *     gain_on_sale_of_security?: int,
 *     other_special_charges?: int,
 *     write_off?: int,
 *     impairment_of_capital_assets?: int,
 *     restructuring_and_merger_acquisition?: int,
 *     securities_amortization?: int,
 *     earnings_from_equity_interest?: int,
 *     earnings_from_equity_interest_net_of_tax?: int,
 *     total_other_finance_cost?: int,
 * }
 */
readonly class IncomeStatementConsolidatedOtherIncomeAndExpenses
{
    public function __construct(
        public int $otherIncomeExpense,
        public int $otherNonOperatingIncomeExpenses,
        public ?int $specialIncomeCharges,
        public ?int $gainOnSaleOfPpe,
        public ?int $gainOnSaleOfBusiness,
        public ?int $gainOnSaleOfSecurity,
        public ?int $otherSpecialCharges,
        public ?int $writeOff,
        public ?int $impairmentOfCapitalAssets,
        public ?int $restructuringAndMergerAcquisition,
        public ?int $securitiesAmortization,
        public ?int $earningsFromEquityInterest,
        public ?int $earningsFromEquityInterestNetOfTax,
        public ?int $totalOtherFinanceCost,
    ) {
    }

    /** @param IncomeStatementConsolidatedOtherIncomeAndExpensesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            otherIncomeExpense: $data['other_income_expense'],
            otherNonOperatingIncomeExpenses: $data['other_non_operating_income_expenses'],
            specialIncomeCharges: $data['special_income_charges'] ?? null,
            gainOnSaleOfPpe: $data['gain_on_sale_of_ppe'] ?? null,
            gainOnSaleOfBusiness: $data['gain_on_sale_of_business'] ?? null,
            gainOnSaleOfSecurity: $data['gain_on_sale_of_security'] ?? null,
            otherSpecialCharges: $data['other_special_charges'] ?? null,
            writeOff: $data['write_off'] ?? null,
            impairmentOfCapitalAssets: $data['impairment_of_capital_assets'] ?? null,
            restructuringAndMergerAcquisition: $data['restructuring_and_merger_acquisition'] ?? null,
            securitiesAmortization: $data['securities_amortization'] ?? null,
            earningsFromEquityInterest: $data['earnings_from_equity_interest'] ?? null,
            earningsFromEquityInterestNetOfTax: $data['earnings_from_equity_interest_net_of_tax'] ?? null,
            totalOtherFinanceCost: $data['total_other_finance_cost'] ?? null,
        );
    }
}
