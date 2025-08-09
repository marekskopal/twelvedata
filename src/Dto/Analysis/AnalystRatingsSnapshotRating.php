<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

use DateTimeImmutable;

/**
 * @phpstan-type AnalystRatingsSnapshotRatingType array{
 *     date: string,
 *     firm: string,
 *     rating_change: string,
 *     rating_current: string,
 *     rating_prior: string,
 * }
 */
readonly class AnalystRatingsSnapshotRating
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $firm,
        public string $ratingChange,
        public string $ratingCurrent,
        public string $ratingPrior,
    ) {
    }

    /** @param AnalystRatingsSnapshotRatingType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            firm: $data['firm'],
            ratingChange: $data['rating_change'],
            ratingCurrent: $data['rating_current'],
            ratingPrior: $data['rating_prior'],
        );
    }
}
