<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type BalanceSheetConsolidatedCurrentAssetsType from BalanceSheetConsolidatedCurrentAssets
 * @phpstan-import-type BalanceSheetConsolidatedNonCurrentAssetsType from BalanceSheetConsolidatedNonCurrentAssets
 * @phpstan-import-type BalanceSheetConsolidatedLiabilitiesType from BalanceSheetConsolidatedLiabilities
 * @phpstan-type BalanceSheetConsolidatedAssetsType array{
 *     total_assets: int,
 *     current_assets: BalanceSheetConsolidatedCurrentAssetsType,
 *     non_current_assets: BalanceSheetConsolidatedNonCurrentAssetsType,
 *     liabilities: BalanceSheetConsolidatedLiabilitiesType,
 * }
 */
readonly class BalanceSheetConsolidatedAssets
{
    public function __construct(
        public int $totalAssets,
        public BalanceSheetConsolidatedCurrentAssets $currentAssets,
        public BalanceSheetConsolidatedNonCurrentAssets $nonCurrentAssets,
        public BalanceSheetConsolidatedLiabilities $liabilities,
    ) {
    }

    /** @param BalanceSheetConsolidatedAssetsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalAssets: $data['total_assets'],
            currentAssets: BalanceSheetConsolidatedCurrentAssets::fromArray($data['current_assets']),
            nonCurrentAssets: BalanceSheetConsolidatedNonCurrentAssets::fromArray($data['non_current_assets']),
            liabilities: BalanceSheetConsolidatedLiabilities::fromArray($data['liabilities']),
        );
    }
}
