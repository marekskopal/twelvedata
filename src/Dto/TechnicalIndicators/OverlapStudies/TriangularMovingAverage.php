<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type TriangularMovingAverageType array{
 *     datetime: string,
 *     trima: string,
 * }
 * @implements ValueInterface<TriangularMovingAverage, TriangularMovingAverageType>
 */
readonly class TriangularMovingAverage implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $trima)
    {
    }

    /** @param TriangularMovingAverageType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            trima: $data['trima'],
        );
    }
}
