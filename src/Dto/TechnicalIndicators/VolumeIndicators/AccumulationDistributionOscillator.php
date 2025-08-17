<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AccumulationDistributionOscillatorType array{
 *     datetime: string,
 *     adosc: string,
 * }
 * @implements ValueInterface<AccumulationDistributionOscillator, AccumulationDistributionOscillatorType>
 */
readonly class AccumulationDistributionOscillator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $adosc)
    {
    }

    /** @param AccumulationDistributionOscillatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            adosc: $data['adosc'],
        );
    }
}
