<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-type GrowthEstimatesGrowthEstimatesType array{
 *     current_quarter: float,
 *     next_quarter: float,
 *     current_year: float,
 *     next_year: float,
 *     next_5_years_pa: float,
 *     past_5_years_pa: float
 * }
 */
readonly class GrowthEstimatesGrowthEstimates
{
    public function __construct(
        public float $currentQuarter,
        public float $nextQuarter,
        public float $currentYear,
        public float $nextYear,
        public float $next5YearsPa,
        public float $past5YearsPa,
    ) {
    }

    /** @param GrowthEstimatesGrowthEstimatesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            currentQuarter: $data['current_quarter'],
            nextQuarter: $data['next_quarter'],
            currentYear: $data['current_year'],
            nextYear: $data['next_year'],
            next5YearsPa: $data['next_5_years_pa'],
            past5YearsPa: $data['past_5_years_pa'],
        );
    }
}
