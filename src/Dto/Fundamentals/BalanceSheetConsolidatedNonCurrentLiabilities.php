<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type BalanceSheetConsolidatedLongTermDebtAndCapitalLeaseObligationType from BalanceSheetConsolidatedLongTermDebtAndCapitalLeaseObligation
 * @phpstan-type BalanceSheetConsolidatedNonCurrentLiabilitiesType array{
 *     total_non_current_liabilities_net_minority_interest: int,
 *     long_term_debt_and_capital_lease_obligation: BalanceSheetConsolidatedLongTermDebtAndCapitalLeaseObligationType,
 *     long_term_provisions?: int,
 *     non_current_pension_and_other_postretirement_benefit_plans?: int,
 *     non_current_accrued_expenses?: int,
 *     due_to_related_parties_non_current?: int,
 *     trade_and_other_payables_non_current?: int,
 *     non_current_deferred_liabilities?: int,
 *     non_current_deferred_revenue?: int,
 *     non_current_deferred_taxes_liabilities?: int,
 *     other_non_current_liabilities?: int,
 *     preferred_securities_outside_stock_equity?: int,
 *     derivative_product_liabilities?: int,
 *     capital_lease_obligations?: int,
 *     restricted_common_stock?: int,
 * }
 */
readonly class BalanceSheetConsolidatedNonCurrentLiabilities
{
    public function __construct(
        public int $totalNonCurrentLiabilitiesNetMinorityInterest,
        public BalanceSheetConsolidatedLongTermDebtAndCapitalLeaseObligation $longTermDebtAndCapitalLeaseObligation,
        public ?int $longTermProvisions,
        public ?int $nonCurrentPensionAndOtherPostretirementBenefitPlans,
        public ?int $nonCurrentAccruedExpenses,
        public ?int $dueToRelatedPartiesNonCurrent,
        public ?int $tradeAndOtherPayablesNonCurrent,
        public ?int $nonCurrentDeferredLiabilities,
        public ?int $nonCurrentDeferredRevenue,
        public ?int $nonCurrentDeferredTaxesLiabilities,
        public ?int $otherNonCurrentLiabilities,
        public ?int $preferredSecuritiesOutsideStockEquity,
        public ?int $derivativeProductLiabilities,
        public ?int $capitalLeaseObligations,
        public ?int $restrictedCommonStock,
    ) {
    }

    /** @param BalanceSheetConsolidatedNonCurrentLiabilitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalNonCurrentLiabilitiesNetMinorityInterest: $data['total_non_current_liabilities_net_minority_interest'],
            longTermDebtAndCapitalLeaseObligation: BalanceSheetConsolidatedLongTermDebtAndCapitalLeaseObligation::fromArray(
                $data['long_term_debt_and_capital_lease_obligation'],
            ),
            longTermProvisions: $data['long_term_provisions'] ?? null,
            nonCurrentPensionAndOtherPostretirementBenefitPlans: $data['non_current_pension_and_other_postretirement_benefit_plans'] ?? null,
            nonCurrentAccruedExpenses: $data['non_current_accrued_expenses'] ?? null,
            dueToRelatedPartiesNonCurrent: $data['due_to_related_parties_non_current'] ?? null,
            tradeAndOtherPayablesNonCurrent: $data['trade_and_other_payables_non_current'] ?? null,
            nonCurrentDeferredLiabilities: $data['non_current_deferred_liabilities'] ?? null,
            nonCurrentDeferredRevenue: $data['non_current_deferred_revenue'] ?? null,
            nonCurrentDeferredTaxesLiabilities: $data['non_current_deferred_taxes_liabilities'] ?? null,
            otherNonCurrentLiabilities: $data['other_non_current_liabilities'] ?? null,
            preferredSecuritiesOutsideStockEquity: $data['preferred_securities_outside_stock_equity'] ?? null,
            derivativeProductLiabilities: $data['derivative_product_liabilities'] ?? null,
            capitalLeaseObligations: $data['capital_lease_obligations'] ?? null,
            restrictedCommonStock: $data['restricted_common_stock'] ?? null,
        );
    }
}
