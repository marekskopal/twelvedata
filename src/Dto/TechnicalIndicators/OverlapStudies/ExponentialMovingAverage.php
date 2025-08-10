<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type ExponentialMovingAverageType array{
 *     datetime: string,
 *     ema: string,
 * }
 * @implements ValueInterface<ExponentialMovingAverage, ExponentialMovingAverageType>
 */
readonly class ExponentialMovingAverage implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $ema)
    {
    }

    /** @param ExponentialMovingAverageType $data */
    public static function fromArray(array $data): self
    {
        return new self(datetime: new DateTimeImmutable($data['datetime']), ema: $data['ema']);
    }
}
