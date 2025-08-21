<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type LinearRegressionInterceptType array{
 *     datetime: string,
 *     linearregintercept: string,
 * }
 * @implements ValueInterface<LinearRegressionIntercept, LinearRegressionInterceptType>
 */
readonly class LinearRegressionIntercept implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $linearregintercept)
    {
    }

    /** @param LinearRegressionInterceptType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            linearregintercept: $data['linearregintercept'],
        );
    }
}
