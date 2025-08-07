<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedExpensesType array{
 *     total_expenses: int,
 *     selling_general_and_administration_expense?: int,
 *     selling_and_marketing_expense?: int,
 *     general_and_administrative_expense?: int,
 *     other_general_and_administrative_expense?: int,
 *     depreciation_amortization_depletion_income_statement?: int,
 *     research_and_development_expense?: int,
 *     insurance_and_claims_expense?: int,
 *     rent_and_landing_fees?: int,
 *     salaries_and_wages_expense?: int,
 *     rent_expense_supplemental?: int,
 *     provision_for_doubtful_accounts?: int,
 * }
 */
readonly class IncomeStatementConsolidatedExpenses
{
    public function __construct(
        public int $totalExpenses,
        public ?int $sellingGeneralAndAdministrationExpense,
        public ?int $sellingAndMarketingExpense,
        public ?int $generalAndAdministrativeExpense,
        public ?int $otherGeneralAndAdministrativeExpense,
        public ?int $depreciationAmortizationDepletionIncomeStatement,
        public ?int $researchAndDevelopmentExpense,
        public ?int $insuranceAndClaimsExpense,
        public ?int $rentAndLandingFees,
        public ?int $salariesAndWagesExpense,
        public ?int $rentExpenseSupplemental,
        public ?int $provisionForDoubtfulAccounts,
    ) {
    }

    /** @param IncomeStatementConsolidatedExpensesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalExpenses: $data['total_expenses'],
            sellingGeneralAndAdministrationExpense: $data['selling_general_and_administration_expense'] ?? null,
            sellingAndMarketingExpense: $data['selling_and_marketing_expense'] ?? null,
            generalAndAdministrativeExpense: $data['general_and_administrative_expense'] ?? null,
            otherGeneralAndAdministrativeExpense: $data['other_general_and_administrative_expense'] ?? null,
            depreciationAmortizationDepletionIncomeStatement: $data['depreciation_amortization_depletion_income_statement'] ?? null,
            researchAndDevelopmentExpense: $data['research_and_development_expense'] ?? null,
            insuranceAndClaimsExpense: $data['insurance_and_claims_expense'] ?? null,
            rentAndLandingFees: $data['rent_and_landing_fees'] ?? null,
            salariesAndWagesExpense: $data['salaries_and_wages_expense'] ?? null,
            rentExpenseSupplemental: $data['rent_expense_supplemental'] ?? null,
            provisionForDoubtfulAccounts: $data['provision_for_doubtful_accounts'] ?? null,
        );
    }
}
