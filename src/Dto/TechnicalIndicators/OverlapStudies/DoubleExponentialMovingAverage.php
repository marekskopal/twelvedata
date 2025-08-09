<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type DoubleExponentialMovingAverageType array{
 *     datetime: string,
 *     dema: string,
 * }
 * @implements ValueInterface<DoubleExponentialMovingAverage, DoubleExponentialMovingAverageType>
 */
readonly class DoubleExponentialMovingAverage implements ValueInterface
{
    public function __construct(public string $datetime, public string $dema)
    {
    }

    /** @param DoubleExponentialMovingAverageType $data */
    public static function fromArray(array $data): self
    {
        return new self(datetime: $data['datetime'], dema: $data['dema']);
    }
}
