<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type BalanceSheetShareholdersEquityType array{
 *     common_stock: int|null,
 *     retained_earnings: int|null,
 *     other_shareholders_equity:int|null,
 *     total_shareholders_equity:int|null,
 *     additional_paid_in_capital:int|null,
 *     treasury_stock:int|null,
 *     minority_interest:int|null,
 * }
 */
readonly class BalanceSheetShareholdersEquity
{
    public function __construct(
        public ?int $commonStock,
        public ?int $retainedEarnings,
        public ?int $otherShareholdersEquity,
        public ?int $totalShareholdersEquity,
        public ?int $additionalPaidInCapital,
        public ?int $treasuryStock,
        public ?int $minorityInterest,
    ) {
    }

    /** @param BalanceSheetShareholdersEquityType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            commonStock: $data['common_stock'],
            retainedEarnings: $data['retained_earnings'],
            otherShareholdersEquity: $data['other_shareholders_equity'],
            totalShareholdersEquity: $data['total_shareholders_equity'],
            additionalPaidInCapital: $data['additional_paid_in_capital'],
            treasuryStock: $data['treasury_stock'],
            minorityInterest: $data['minority_interest'],
        );
    }
}
