<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class CashFlowCashFlow
{
    public function __construct(
        public string $fiscalDate,
        public ?int $quarter,
        public CashFlowOperatingActivities $operatingActivities,
        public CashFlowInvestingActivities $investingActivities,
        public CashFlowFinancingActivities $financingActivities,
        public int $endCashPosition,
        public int $incomeTaxPaid,
        public ?int $interestPaid,
        public int $freeCashFlow,
    ) {
    }

    /**
     * @param array{
     *     fiscal_date: string,
     *     quarter: int|null,
     *     operating_activities: array{
     *         net_income: int,
     *         depreciation: int,
     *         deferred_taxes: int|null,
     *         stock_based_compensation: int,
     *         other_non_cash_items: int,
     *         accounts_receivable: int,
     *         accounts_payable: int,
     *         other_assets_liabilities: int,
     *         operating_cash_flow: int,
     *     },
     *     investing_activities: array{
     *         capital_expenditures: int,
     *         net_intangibles: int|null,
     *         net_acquisitions: int|null,
     *         purchase_of_investments: int,
     *         sale_of_investments: int,
     *         other_investing_activity: int,
     *         investing_cash_flow: int,
     *     },
     *     financing_activities: array{
     *         long_term_debt_issuance: int|null,
     *         long_term_debt_payments: int,
     *         short_term_debt_issuance: int,
     *         common_stock_issuance: int|null,
     *         common_stock_repurchase: int,
     *         common_dividends: int,
     *         other_financing_charges: int,
     *         financing_cash_flow: int,
     *     },
     *     end_cash_position: int,
     *     income_tax_paid: int,
     *     interest_paid: int|null,
     *     free_cash_flow: int,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            fiscalDate: $data['fiscal_date'],
            quarter: $data['quarter'] ?? null,
            operatingActivities: CashFlowOperatingActivities::fromArray($data['operating_activities']),
            investingActivities: CashFlowInvestingActivities::fromArray($data['investing_activities']),
            financingActivities: CashFlowFinancingActivities::fromArray($data['financing_activities']),
            endCashPosition: $data['end_cash_position'],
            incomeTaxPaid: $data['income_tax_paid'],
            interestPaid: $data['interest_paid'],
            freeCashFlow: $data['free_cash_flow'],
        );
    }
}
