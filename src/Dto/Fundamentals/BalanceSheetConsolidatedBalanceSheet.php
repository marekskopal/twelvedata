<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-import-type BalanceSheetConsolidatedAssetsType from BalanceSheetConsolidatedAssets
 * @phpstan-type BalanceSheetConsolidatedBalanceSheetType array{
 *     fiscal_date: string,
 *     assets: BalanceSheetConsolidatedAssetsType,
 * }
 */
readonly class BalanceSheetConsolidatedBalanceSheet
{
    public function __construct(public DateTimeImmutable $fiscalDate, public BalanceSheetConsolidatedAssets $assets,)
    {
    }

    /** @param BalanceSheetConsolidatedBalanceSheetType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            fiscalDate: new DateTimeImmutable($data['fiscal_date']),
            assets: BalanceSheetConsolidatedAssets::fromArray($data['assets']),
        );
    }
}
