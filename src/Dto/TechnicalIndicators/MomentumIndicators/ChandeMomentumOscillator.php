<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type ChandeMomentumOscillatorType array{
 *     datetime: string,
 *     cmo: string,
 * }
 * @implements ValueInterface<ChandeMomentumOscillator, ChandeMomentumOscillatorType>
 */
readonly class ChandeMomentumOscillator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $cmo)
    {
    }

    /** @param ChandeMomentumOscillatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            cmo: $data['cmo'],
        );
    }
}
