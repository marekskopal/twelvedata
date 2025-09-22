<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type CashFlowOperatingActivitiesType from CashFlowOperatingActivities
 * @phpstan-import-type CashFlowInvestingActivitiesType from CashFlowInvestingActivities
 * @phpstan-import-type CashFlowFinancingActivitiesType from CashFlowFinancingActivities
 * @phpstan-type CashFlowCashFlowType array{
 *     fiscal_date: string,
 *     quarter: int|null,
 *     operating_activities: CashFlowOperatingActivitiesType,
 *     investing_activities: CashFlowInvestingActivitiesType,
 *     financing_activities: CashFlowFinancingActivitiesType,
 *     end_cash_position: int|null,
 *     income_tax_paid: int|null,
 *     interest_paid: int|null,
 *     free_cash_flow: int|null,
 * }
 */
readonly class CashFlowCashFlow
{
    public function __construct(
        public string $fiscalDate,
        public ?int $quarter,
        public CashFlowOperatingActivities $operatingActivities,
        public CashFlowInvestingActivities $investingActivities,
        public CashFlowFinancingActivities $financingActivities,
        public ?int $endCashPosition,
        public ?int $incomeTaxPaid,
        public ?int $interestPaid,
        public ?int $freeCashFlow,
    ) {
    }

    /** @param CashFlowCashFlowType $data */
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
