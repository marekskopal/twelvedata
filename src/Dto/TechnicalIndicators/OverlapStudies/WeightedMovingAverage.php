<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type WeightedMovingAverageType array{
 *     datetime: string,
 *     wma: string,
 * }
 * @implements ValueInterface<WeightedMovingAverage, WeightedMovingAverageType>
 */
readonly class WeightedMovingAverage implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $wma)
    {
    }

    /** @param WeightedMovingAverageType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            wma: $data['wma'],
        );
    }
}
