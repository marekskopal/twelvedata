<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type BalanceSheetConsolidatedGoodwillAndOtherIntangibleAssetsType array{
 *     goodwill: int,
 *     other_intangible_assets: int,
 *     total_goodwill_and_intangible_assets: int,
 * }
 */
readonly class BalanceSheetConsolidatedGoodwillAndOtherIntangibleAssets
{
    public function __construct(public int $goodwill, public int $otherIntangibleAssets, public int $totalGoodwillAndIntangibleAssets,)
    {
    }

    /** @param BalanceSheetConsolidatedGoodwillAndOtherIntangibleAssetsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            goodwill: $data['goodwill'],
            otherIntangibleAssets: $data['other_intangible_assets'],
            totalGoodwillAndIntangibleAssets: $data['total_goodwill_and_intangible_assets'],
        );
    }
}
