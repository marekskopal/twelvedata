<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MovingAverageType array{
 *     datetime: string,
 *     ma: string,
 * }
 * @implements ValueInterface<MovingAverage, MovingAverageType>
 */
readonly class MovingAverage implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $ma,)
    {
    }

    /** @param MovingAverageType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            ma: $data['ma'],
        );
    }
}
