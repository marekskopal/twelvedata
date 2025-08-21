<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type KaufmanAdaptiveMovingAverageType array{
 *     datetime: string,
 *     kama: string,
 * }
 * @implements ValueInterface<KaufmanAdaptiveMovingAverage, KaufmanAdaptiveMovingAverageType>
 */
readonly class KaufmanAdaptiveMovingAverage implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $kama,)
    {
    }

    /** @param KaufmanAdaptiveMovingAverageType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            kama: $data['kama'],
        );
    }
}
