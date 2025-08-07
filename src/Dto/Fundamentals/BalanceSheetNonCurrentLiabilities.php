<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type BalanceSheetNonCurrentLiabilitiesType array{
 *     long_term_provisions: int|null,
 *     long_term_debt: int|null,
 *     provision_for_risks_and_charges:int|null,
 *     deferred_liabilities:int|null,
 *     derivative_product_liabilities:int|null,
 *     other_non_current_liabilities:int|null,
 *     total_non_current_liabilities:int|null,
 * }
 */
readonly class BalanceSheetNonCurrentLiabilities
{
    public function __construct(
        public ?int $longTermProvisions,
        public ?int $longTermDebt,
        public ?int $provisionForRisksAndCharges,
        public ?int $deferredLiabilities,
        public ?int $derivativeProductLiabilities,
        public ?int $otherNonCurrentLiabilities,
        public ?int $totalNonCurrentLiabilities,
    ) {
    }

    /** @param BalanceSheetNonCurrentLiabilitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            longTermProvisions: $data['long_term_provisions'],
            longTermDebt: $data['long_term_debt'],
            provisionForRisksAndCharges: $data['provision_for_risks_and_charges'],
            deferredLiabilities: $data['deferred_liabilities'],
            derivativeProductLiabilities: $data['derivative_product_liabilities'],
            otherNonCurrentLiabilities: $data['other_non_current_liabilities'],
            totalNonCurrentLiabilities: $data['total_non_current_liabilities'],
        );
    }
}
