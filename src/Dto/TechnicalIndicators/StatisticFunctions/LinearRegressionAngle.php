<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type LinearRegressionAngleType array{
 *     datetime: string,
 *     linearregangle: string,
 * }
 * @implements ValueInterface<LinearRegressionAngle, LinearRegressionAngleType>
 */
readonly class LinearRegressionAngle implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $linearregangle)
    {
    }

    /** @param LinearRegressionAngleType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            linearregangle: $data['linearregangle'],
        );
    }
}
