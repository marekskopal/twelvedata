<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type BalanceSheetConsolidatedCapitalStockType array{
 *     common_stock: int,
 *     preferred_stock?: int,
 *     total_partnership_capital?: int,
 *     general_partnership_capital?: int,
 *     limited_partnership_capital?: int,
 *     capital_stock?: int,
 *     other_capital_stock?: int,
 *     additional_paid_in_capital?: int,
 *     retained_earnings?: int,
 *     treasury_stock?: int,
 *     treasury_shares_number?: int,
 *     ordinary_shares_number?: int,
 *     preferred_shares_number?: int,
 *     share_issued?: int,
 * }
 */
readonly class BalanceSheetConsolidatedCapitalStock
{
    public function __construct(
        public int $commonStock,
        public ?int $preferredStock,
        public ?int $totalPartnershipCapital,
        public ?int $generalPartnershipCapital,
        public ?int $limitedPartnershipCapital,
        public ?int $capitalStock,
        public ?int $otherCapitalStock,
        public ?int $additionalPaidInCapital,
        public ?int $retainedEarnings,
        public ?int $treasuryStock,
        public ?int $treasurySharesNumber,
        public ?int $ordinarySharesNumber,
        public ?int $preferredSharesNumber,
        public ?int $shareIssued,
    ) {
    }

    /** @param BalanceSheetConsolidatedCapitalStockType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            commonStock: $data['common_stock'],
            preferredStock: $data['preferred_stock'] ?? null,
            totalPartnershipCapital: $data['total_partnership_capital'] ?? null,
            generalPartnershipCapital: $data['general_partnership_capital'] ?? null,
            limitedPartnershipCapital: $data['limited_partnership_capital'] ?? null,
            capitalStock: $data['capital_stock'] ?? null,
            otherCapitalStock: $data['other_capital_stock'] ?? null,
            additionalPaidInCapital: $data['additional_paid_in_capital'] ?? null,
            retainedEarnings: $data['retained_earnings'] ?? null,
            treasuryStock: $data['treasury_stock'] ?? null,
            treasurySharesNumber: $data['treasury_shares_number'] ?? null,
            ordinarySharesNumber: $data['ordinary_shares_number'] ?? null,
            preferredSharesNumber: $data['preferred_shares_number'] ?? null,
            shareIssued: $data['share_issued'] ?? null,
        );
    }
}
