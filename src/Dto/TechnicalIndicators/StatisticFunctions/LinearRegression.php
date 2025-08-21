<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type LinearRegressionType array{
 *     datetime: string,
 *     linearreg: string,
 * }
 * @implements ValueInterface<LinearRegression, LinearRegressionType>
 */
readonly class LinearRegression implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $linearreg)
    {
    }

    /** @param LinearRegressionType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            linearreg: $data['linearreg'],
        );
    }
}
