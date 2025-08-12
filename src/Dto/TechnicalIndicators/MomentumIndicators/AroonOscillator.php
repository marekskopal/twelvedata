<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AroonOscillatorType array{
 *     datetime: string,
 *     aroonosc: string,
 * }
 * @implements ValueInterface<AroonOscillator, AroonOscillatorType>
 */
readonly class AroonOscillator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $aroonosc)
    {
    }

    /** @param AroonOscillatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            aroonosc: $data['aroonosc'],
        );
    }
}
