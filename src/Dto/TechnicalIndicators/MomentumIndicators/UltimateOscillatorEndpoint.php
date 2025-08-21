<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type UltimateOscillatorEndpointType array{
 *     datetime: string,
 *     ultosc: string,
 * }
 * @implements ValueInterface<UltimateOscillatorEndpoint, UltimateOscillatorEndpointType>
 */
readonly class UltimateOscillatorEndpoint implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $ultosc)
    {
    }

    /** @param UltimateOscillatorEndpointType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            ultosc: $data['ultosc'],
        );
    }
}
