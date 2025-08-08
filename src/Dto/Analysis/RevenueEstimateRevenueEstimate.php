<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

use DateTimeImmutable;

/**
 * @phpstan-type RevenueEstimateRevenueEstimateType array{
 *     date: string,
 *     period: string,
 *     number_of_analysts: int,
 *     avg_estimate: int,
 *     low_estimate: int,
 *     high_estimate: int,
 *     year_ago_sales: int,
 *     sales_growth: float,
 * }
 */
readonly class RevenueEstimateRevenueEstimate
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $period,
        public int $numberOfAnalysts,
        public int $avgEstimate,
        public int $lowEstimate,
        public int $highEstimate,
        public int $yearAgoSales,
        public float $salesGrowth,
    ) {
    }

    /** @param RevenueEstimateRevenueEstimateType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            period: $data['period'],
            numberOfAnalysts: $data['number_of_analysts'],
            avgEstimate: $data['avg_estimate'],
            lowEstimate: $data['low_estimate'],
            highEstimate: $data['high_estimate'],
            yearAgoSales: $data['year_ago_sales'],
            salesGrowth: $data['sales_growth'],
        );
    }
}
