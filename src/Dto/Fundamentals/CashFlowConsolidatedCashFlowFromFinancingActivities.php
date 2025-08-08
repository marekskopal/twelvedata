<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type CashFlowConsolidatedCashFlowFromFinancingActivitiesType array{
 *     financing_cash_flow: int,
 *     cash_flow_from_continuing_financing_activities?: int,
 *     cash_from_discontinued_financing_activities?: int,
 *     net_other_financing_charges?: int,
 *     interest_paid_cff?: int,
 *     proceeds_from_stock_option_exercised?: int,
 *     cash_dividends_paid?: int,
 *     preferred_stock_dividend_paid?: int,
 *     common_stock_dividend_paid?: int,
 *     net_preferred_stock_issuance?: int,
 *     preferred_stock_payments?: int,
 *     preferred_stock_issuance?: int,
 *     net_common_stock_issuance?: int,
 *     common_stock_payments?: int,
 *     common_stock_issuance?: int,
 *     repurchase_of_capital_stock?: int,
 *     net_issuance_payments_of_debt?: int,
 *     net_short_term_debt_issuance?: int,
 *     short_term_debt_payments?: int,
 *     short_term_debt_issuance?: int,
 *     net_long_term_debt_issuance?: int,
 *     long_term_debt_payments?: int,
 *     long_term_debt_issuance?: int,
 *     issuance_of_debt?: int,
 *     repayment_of_debt?: int,
 *     issuance_of_capital_stock?: int,
 * }
 */
readonly class CashFlowConsolidatedCashFlowFromFinancingActivities
{
    public function __construct(
        public int $financingCashFlow,
        public ?int $cashFlowFromContinuingFinancingActivities,
        public ?int $cashFromDiscontinuedFinancingActivities,
        public ?int $netOtherFinancingCharges,
        public ?int $interestPaidCff,
        public ?int $proceedsFromStockOptionExercised,
        public ?int $cashDividendsPaid,
        public ?int $preferredStockDividendPaid,
        public ?int $commonStockDividendPaid,
        public ?int $netPreferredStockIssuance,
        public ?int $preferredStockPayments,
        public ?int $preferredStockIssuance,
        public ?int $netCommonStockIssuance,
        public ?int $commonStockPayments,
        public ?int $commonStockIssuance,
        public ?int $repurchaseOfCapitalStock,
        public ?int $netIssuancePaymentsOfDebt,
        public ?int $netShortTermDebtIssuance,
        public ?int $shortTermDebtPayments,
        public ?int $shortTermDebtIssuance,
        public ?int $netLongTermDebtIssuance,
        public ?int $longTermDebtPayments,
        public ?int $longTermDebtIssuance,
        public ?int $issuanceOfDebt,
        public ?int $repaymentOfDebt,
        public ?int $issuanceOfCapitalStock,
    ) {
    }

    /** @param CashFlowConsolidatedCashFlowFromFinancingActivitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            financingCashFlow: $data['financing_cash_flow'],
            cashFlowFromContinuingFinancingActivities: $data['cash_flow_from_continuing_financing_activities'] ?? null,
            cashFromDiscontinuedFinancingActivities: $data['cash_from_discontinued_financing_activities'] ?? null,
            netOtherFinancingCharges: $data['net_other_financing_charges'] ?? null,
            interestPaidCff: $data['interest_paid_cff'] ?? null,
            proceedsFromStockOptionExercised: $data['proceeds_from_stock_option_exercised'] ?? null,
            cashDividendsPaid: $data['cash_dividends_paid'] ?? null,
            preferredStockDividendPaid: $data['preferred_stock_dividend_paid'] ?? null,
            commonStockDividendPaid: $data['common_stock_dividend_paid'] ?? null,
            netPreferredStockIssuance: $data['net_preferred_stock_issuance'] ?? null,
            preferredStockPayments: $data['preferred_stock_payments'] ?? null,
            preferredStockIssuance: $data['preferred_stock_issuance'] ?? null,
            netCommonStockIssuance: $data['net_common_stock_issuance'] ?? null,
            commonStockPayments: $data['common_stock_payments'] ?? null,
            commonStockIssuance: $data['common_stock_issuance'] ?? null,
            repurchaseOfCapitalStock: $data['repurchase_of_capital_stock'] ?? null,
            netIssuancePaymentsOfDebt: $data['net_issuance_payments_of_debt'] ?? null,
            netShortTermDebtIssuance: $data['net_short_term_debt_issuance'] ?? null,
            shortTermDebtPayments: $data['short_term_debt_payments'] ?? null,
            shortTermDebtIssuance: $data['short_term_debt_issuance'] ?? null,
            netLongTermDebtIssuance: $data['net_long_term_debt_issuance'] ?? null,
            longTermDebtPayments: $data['long_term_debt_payments'] ?? null,
            longTermDebtIssuance: $data['long_term_debt_issuance'] ?? null,
            issuanceOfDebt: $data['issuance_of_debt'] ?? null,
            repaymentOfDebt: $data['repayment_of_debt'] ?? null,
            issuanceOfCapitalStock: $data['issuance_of_capital_stock'] ?? null,
        );
    }
}
