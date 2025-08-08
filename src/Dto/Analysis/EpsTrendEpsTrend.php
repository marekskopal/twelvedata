<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

use DateTimeImmutable;

/**
 * @phpstan-type EpsTrendEpsTrendType array{
 *     date: string,
 *     period: string,
 *     current_estimate: float,
 *     "7_days_ago": float,
 *     "30_days_ago": float,
 *     "60_days_ago": float,
 *     "90_days_ago": float,
 * }
 */
readonly class EpsTrendEpsTrend
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $period,
        public float $currentEstimate,
        public float $sevenDaysAgo,
        public float $thirtyDaysAgo,
        public float $sixtyDaysAgo,
        public float $ninetyDaysAgo,
    ) {
    }

    /** @param EpsTrendEpsTrendType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            period: $data['period'],
            currentEstimate: $data['current_estimate'],
            sevenDaysAgo: $data['7_days_ago'],
            thirtyDaysAgo: $data['30_days_ago'],
            sixtyDaysAgo: $data['60_days_ago'],
            ninetyDaysAgo: $data['90_days_ago'],
        );
    }
}
