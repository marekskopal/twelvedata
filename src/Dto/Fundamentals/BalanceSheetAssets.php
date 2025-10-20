<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type BalanceSheetCurrentAssetsType from BalanceSheetCurrentAssets
 * @phpstan-import-type BalanceSheetNonCurrentAssetsType from BalanceSheetNonCurrentAssets
 * @phpstan-type BalanceSheetAssetsType array{
 *     current_assets: BalanceSheetCurrentAssetsType,
 *     non_current_assets: BalanceSheetNonCurrentAssetsType,
 *     total_assets: int|null,
 * }
 */
readonly class BalanceSheetAssets
{
    public function __construct(
        public BalanceSheetCurrentAssets $currentAssets,
        public BalanceSheetNonCurrentAssets $nonCurrentAssets,
        public ?int $totalAssets,
    ) {
    }

    /** @param BalanceSheetAssetsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            currentAssets: BalanceSheetCurrentAssets::fromArray($data['current_assets']),
            nonCurrentAssets: BalanceSheetNonCurrentAssets::fromArray($data['non_current_assets']),
            totalAssets: $data['total_assets'],
        );
    }
}
