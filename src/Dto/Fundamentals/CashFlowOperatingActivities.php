<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type CashFlowOperatingActivitiesType array{
 *     net_income: int|null,
 *     depreciation: int|null,
 *     deferred_taxes: int|null,
 *     stock_based_compensation: int|null,
 *     other_non_cash_items: int|null,
 *     accounts_receivable: int|null,
 *     accounts_payable: int|null,
 *     other_assets_liabilities: int|null,
 *     operating_cash_flow: int|null,
 * }
 */
readonly class CashFlowOperatingActivities
{
    public function __construct(
        public ?int $netIncome,
        public ?int $depreciation,
        public ?int $deferredTaxes,
        public ?int $stockBasedCompensation,
        public ?int $otherNonCashItems,
        public ?int $accountsReceivable,
        public ?int $accountsPayable,
        public ?int $otherAssetsLiabilities,
        public ?int $operatingCashFlow,
    ) {
    }

    /** @param CashFlowOperatingActivitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            netIncome: $data['net_income'],
            depreciation: $data['depreciation'],
            deferredTaxes: $data['deferred_taxes'],
            stockBasedCompensation: $data['stock_based_compensation'],
            otherNonCashItems: $data['other_non_cash_items'],
            accountsReceivable: $data['accounts_receivable'],
            accountsPayable: $data['accounts_payable'],
            otherAssetsLiabilities: $data['other_assets_liabilities'],
            operatingCashFlow: $data['operating_cash_flow'],
        );
    }
}
