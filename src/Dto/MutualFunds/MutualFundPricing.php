<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundPricingType array{
 *     nav: float|null,
 *     '12_month_low': float|null,
 *     '12_month_high': float|null,
 *     last_month: float|null,
 * }
 */
readonly class MutualFundPricing
{
    public function __construct(
        public ?float $nav,
        public ?float $twelveMonthLow,
        public ?float $twelveMonthHigh,
        public ?float $lastMonth,
    ) {
    }

    /** @param MutualFundPricingType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            nav: $data['nav'] ?? null,
            twelveMonthLow: $data['12_month_low'] ?? null,
            twelveMonthHigh: $data['12_month_high'] ?? null,
            lastMonth: $data['last_month'] ?? null,
        );
    }
}
