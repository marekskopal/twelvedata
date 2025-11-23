<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

use DateTimeImmutable;

/**
 * @phpstan-type AnalystRatingsUsEquitiesRatingType array{
 *     date: string,
 *     firm: string,
 *     analyst_name: string|null,
 *     rating_change: string|null,
 *     rating_current: string|null,
 *     rating_prior: string|null,
 *     time: string|null,
 *     action_price_target: string|null,
 *     price_target_current: float|null,
 *     price_target_prior: float|null,
 * }
 */
readonly class AnalystRatingsUsEquitiesRating
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $firm,
        public ?string $analystName,
        public ?string $ratingChange,
        public ?string $ratingCurrent,
        public ?string $ratingPrior,
        public ?string $time,
        public ?string $actionPriceTarget,
        public ?float $priceTargetCurrent,
        public ?float $priceTargetPrior,
    ) {
    }

    /** @param AnalystRatingsUsEquitiesRatingType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            firm: $data['firm'],
            analystName: $data['analyst_name'],
            ratingChange: $data['rating_change'],
            ratingCurrent: $data['rating_current'],
            ratingPrior: $data['rating_prior'],
            time: $data['time'],
            actionPriceTarget: $data['action_price_target'],
            priceTargetCurrent: $data['price_target_current'],
            priceTargetPrior: $data['price_target_prior'],
        );
    }
}
