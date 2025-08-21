<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type LinearRegressionSlopeType array{
 *     datetime: string,
 *     linearregslope: string,
 * }
 * @implements ValueInterface<LinearRegressionSlope, LinearRegressionSlopeType>
 */
readonly class LinearRegressionSlope implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $linearregslope)
    {
    }

    /** @param LinearRegressionSlopeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            linearregslope: $data['linearregslope'],
        );
    }
}
