<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

use DateTimeImmutable;

/**
 * @phpstan-type EarningsEstimateEarningsEstimateType array{
 *     date: string,
 *     period: string,
 *     number_of_analysts: int,
 *     avg_estimate: float,
 *     low_estimate: float,
 *     high_estimate: float,
 *     year_ago_eps: float,
 * }
 */
readonly class EarningsEstimateEarningsEstimate
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $period,
        public int $numberOfAnalysts,
        public float $avgEstimate,
        public float $lowEstimate,
        public float $highEstimate,
        public float $yearAgoEps,
    ) {
    }

    /** @param EarningsEstimateEarningsEstimateType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            period: $data['period'],
            numberOfAnalysts: $data['number_of_analysts'],
            avgEstimate: $data['avg_estimate'],
            lowEstimate: $data['low_estimate'],
            highEstimate: $data['high_estimate'],
            yearAgoEps: $data['year_ago_eps'],
        );
    }
}
