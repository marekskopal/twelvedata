<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type BalanceSheetCurrentLiabilitiesType from BalanceSheetCurrentLiabilities
 * @phpstan-import-type BalanceSheetNonCurrentLiabilitiesType from BalanceSheetNonCurrentLiabilities
 * @phpstan-type BalanceSheetLiabilitiesType array{
 *     current_liabilities: BalanceSheetCurrentLiabilitiesType,
 *     non_current_liabilities: BalanceSheetNonCurrentLiabilitiesType,
 *     total_liabilities: int,
 * }
 */
readonly class BalanceSheetLiabilities
{
    public function __construct(
        public BalanceSheetCurrentLiabilities $currentLiabilities,
        public BalanceSheetNonCurrentLiabilities $nonCurrentLiabilities,
        public int $totalLiabilities,
    ) {
    }

    /** @param BalanceSheetLiabilitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            currentLiabilities: BalanceSheetCurrentLiabilities::fromArray($data['current_liabilities']),
            nonCurrentLiabilities: BalanceSheetNonCurrentLiabilities::fromArray($data['non_current_liabilities']),
            totalLiabilities: $data['total_liabilities'],
        );
    }
}
