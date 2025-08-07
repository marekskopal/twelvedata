<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-import-type BalanceSheetAssetsType from BalanceSheetAssets
 * @phpstan-import-type BalanceSheetLiabilitiesType from BalanceSheetLiabilities
 * @phpstan-import-type BalanceSheetShareholdersEquityType from BalanceSheetShareholdersEquity
 * @phpstan-type BalanceSheetBalanceSheetType array{
 *    fiscal_date: string,
 *    assets: BalanceSheetAssetsType,
 *    liabilities: BalanceSheetLiabilitiesType,
 *    shareholders_equity: BalanceSheetShareholdersEquityType,
 * }
 */
readonly class BalanceSheetBalanceSheet
{
    public function __construct(
        public DateTimeImmutable $fiscalDate,
        public BalanceSheetAssets $assets,
        public BalanceSheetLiabilities $liabilities,
        public BalanceSheetShareholdersEquity $shareholdersEquity,
    ) {
    }

    /** @param BalanceSheetBalanceSheetType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            fiscalDate: new DateTimeImmutable($data['fiscal_date']),
            assets: BalanceSheetAssets::fromArray($data['assets']),
            liabilities: BalanceSheetLiabilities::fromArray($data['liabilities']),
            shareholdersEquity: BalanceSheetShareholdersEquity::fromArray($data['shareholders_equity']),
        );
    }
}
