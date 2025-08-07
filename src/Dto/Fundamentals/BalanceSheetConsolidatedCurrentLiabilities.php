<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type BalanceSheetConsolidatedPayablesAndAccruedExpensesType from BalanceSheetConsolidatedPayablesAndAccruedExpenses
 * @phpstan-type BalanceSheetConsolidatedCurrentLiabilitiesType array{
 *     total_current_liabilities: int,
 *     current_debt_and_capital_lease_obligation?: int,
 *     current_debt: int,
 *     current_capital_lease_obligation?: int,
 *     other_current_borrowings: int,
 *     line_of_credit?: int,
 *     commercial_paper: int,
 *     current_notes_payable?: int,
 *     current_provisions?: int,
 *     payables_and_accrued_expenses: BalanceSheetConsolidatedPayablesAndAccruedExpensesType,
 *     pension_and_other_post_retirement_benefit_plans_current?: int,
 *     employee_benefits?: int,
 *     current_deferred_liabilities: int,
 *     current_deferred_revenue: int,
 *     current_deferred_taxes_liabilities?: int,
 *     other_current_liabilities: int,
 *     liabilities_held_for_sale_non_current?: int,
 * }
 */
readonly class BalanceSheetConsolidatedCurrentLiabilities
{
    public function __construct(
        public int $totalCurrentLiabilities,
        public ?int $currentDebtAndCapitalLeaseObligation,
        public int $currentDebt,
        public ?int $currentCapitalLeaseObligation,
        public int $otherCurrentBorrowings,
        public ?int $lineOfCredit,
        public int $commercialPaper,
        public ?int $currentNotesPayable,
        public BalanceSheetConsolidatedPayablesAndAccruedExpenses $payablesAndAccruedExpenses,
        public ?int $currentProvisions,
        public ?int $pensionAndOtherPostRetirementBenefitPlansCurrent,
        public ?int $employeeBenefits,
        public int $currentDeferredLiabilities,
        public int $currentDeferredRevenue,
        public ?int $currentDeferredTaxesLiabilities,
        public int $otherCurrentLiabilities,
        public ?int $liabilitiesHeldForSaleNonCurrent,
    ) {
    }

    /** @param BalanceSheetConsolidatedCurrentLiabilitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalCurrentLiabilities: $data['total_current_liabilities'],
            currentDebtAndCapitalLeaseObligation: $data['current_debt_and_capital_lease_obligation'] ?? null,
            currentDebt: $data['current_debt'],
            currentCapitalLeaseObligation: $data['current_capital_lease_obligation'] ?? null,
            otherCurrentBorrowings: $data['other_current_borrowings'],
            lineOfCredit: $data['line_of_credit'] ?? null,
            commercialPaper: $data['commercial_paper'],
            currentNotesPayable: $data['current_notes_payable'] ?? null,
            payablesAndAccruedExpenses: BalanceSheetConsolidatedPayablesAndAccruedExpenses::fromArray(
                $data['payables_and_accrued_expenses'],
            ),
            currentProvisions: $data['current_provisions'] ?? null,
            pensionAndOtherPostRetirementBenefitPlansCurrent: $data['pension_and_other_post_retirement_benefit_plans_current'] ?? null,
            employeeBenefits: $data['employee_benefits'] ?? null,
            currentDeferredLiabilities: $data['current_deferred_liabilities'],
            currentDeferredRevenue: $data['current_deferred_revenue'],
            currentDeferredTaxesLiabilities: $data['current_deferred_taxes_liabilities'] ?? null,
            otherCurrentLiabilities: $data['other_current_liabilities'],
            liabilitiesHeldForSaleNonCurrent: $data['liabilities_held_for_sale_non_current'] ?? null,
        );
    }
}
