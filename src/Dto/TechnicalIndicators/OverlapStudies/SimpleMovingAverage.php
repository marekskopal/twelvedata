<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type SimpleMovingAverageType array{
 *     datetime: string,
 *     sma: string,
 * }
 * @implements ValueInterface<SimpleMovingAverage, SimpleMovingAverageType>
 */
readonly class SimpleMovingAverage implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $sma)
    {
    }

    /** @param SimpleMovingAverageType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            sma: $data['sma'],
        );
    }
}
