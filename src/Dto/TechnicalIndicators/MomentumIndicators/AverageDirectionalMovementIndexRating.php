<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AverageDirectionalMovementIndexRatingType array{
 *     datetime: string,
 *     adxr: string,
 * }
 * @implements ValueInterface<AverageDirectionalMovementIndexRating, AverageDirectionalMovementIndexRatingType>
 */
readonly class AverageDirectionalMovementIndexRating implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $adxr)
    {
    }

    /** @param AverageDirectionalMovementIndexRatingType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            adxr: $data['adxr'],
        );
    }
}
