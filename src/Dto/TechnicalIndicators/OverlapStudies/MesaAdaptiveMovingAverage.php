<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MesaAdaptiveMovingAverageType array{
 *     datetime: string,
 *     mama: string,
 *     fama: string,
 * }
 * @implements ValueInterface<MesaAdaptiveMovingAverage, MesaAdaptiveMovingAverageType>
 */
readonly class MesaAdaptiveMovingAverage implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $mama, public string $fama)
    {
    }

    /** @param MesaAdaptiveMovingAverageType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            mama: $data['mama'],
            fama: $data['fama'],
        );
    }
}
