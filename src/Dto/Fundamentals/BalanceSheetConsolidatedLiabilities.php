<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type BalanceSheetConsolidatedCurrentLiabilitiesType from BalanceSheetConsolidatedCurrentLiabilities
 * @phpstan-import-type BalanceSheetConsolidatedNonCurrentLiabilitiesType from BalanceSheetConsolidatedNonCurrentLiabilities
 * @phpstan-import-type BalanceSheetConsolidatedEquityType from BalanceSheetConsolidatedEquity
 * @phpstan-type BalanceSheetConsolidatedLiabilitiesType array{
 *     total_liabilities_net_minority_interest: int,
 *     current_liabilities: BalanceSheetConsolidatedCurrentLiabilitiesType,
 *     non_current_liabilities: BalanceSheetConsolidatedNonCurrentLiabilitiesType,
 *     equity: BalanceSheetConsolidatedEquityType,
 * }
 */
readonly class BalanceSheetConsolidatedLiabilities
{
    public function __construct(
        public int $totalLiabilitiesNetMinorityInterest,
        public BalanceSheetConsolidatedCurrentLiabilities $currentLiabilities,
        public BalanceSheetConsolidatedNonCurrentLiabilities $nonCurrentLiabilities,
        public BalanceSheetConsolidatedEquity $equity,
    ) {
    }

    /** @param BalanceSheetConsolidatedLiabilitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalLiabilitiesNetMinorityInterest: $data['total_liabilities_net_minority_interest'],
            currentLiabilities: BalanceSheetConsolidatedCurrentLiabilities::fromArray($data['current_liabilities']),
            nonCurrentLiabilities: BalanceSheetConsolidatedNonCurrentLiabilities::fromArray($data['non_current_liabilities']),
            equity: BalanceSheetConsolidatedEquity::fromArray($data['equity']),
        );
    }
}
