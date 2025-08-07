<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type CashFlowInvestingActivitiesType array{
 *     capital_expenditures: int,
 *     net_intangibles: int|null,
 *     net_acquisitions: int|null,
 *     purchase_of_investments: int,
 *     sale_of_investments: int,
 *     other_investing_activity: int,
 *     investing_cash_flow: int,
 * }
 */
readonly class CashFlowInvestingActivities
{
    public function __construct(
        public int $capitalExpenditures,
        public ?int $netIntangibles,
        public ?int $netAcquisitions,
        public int $purchaseOfInvestments,
        public int $saleOfInvestments,
        public int $otherInvestingActivity,
        public int $investingCashFlow,
    ) {
    }

    /** @param CashFlowInvestingActivitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            capitalExpenditures: $data['capital_expenditures'],
            netIntangibles: $data['net_intangibles'],
            netAcquisitions: $data['net_acquisitions'],
            purchaseOfInvestments: $data['purchase_of_investments'],
            saleOfInvestments: $data['sale_of_investments'],
            otherInvestingActivity: $data['other_investing_activity'],
            investingCashFlow: $data['investing_cash_flow'],
        );
    }
}
