<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type DetrendedPriceOscillatorType array{
 *     datetime: string,
 *     dpo: string,
 * }
 * @implements ValueInterface<DetrendedPriceOscillator, DetrendedPriceOscillatorType>
 */
readonly class DetrendedPriceOscillator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $dpo)
    {
    }

    /** @param DetrendedPriceOscillatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            dpo: $data['dpo'],
        );
    }
}
