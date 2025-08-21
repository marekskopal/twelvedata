<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AbsolutePriceOscillatorType array{
 *     datetime: string,
 *     apo: string,
 * }
 * @implements ValueInterface<AbsolutePriceOscillator, AbsolutePriceOscillatorType>
 */
readonly class AbsolutePriceOscillator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $apo)
    {
    }

    /** @param AbsolutePriceOscillatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            apo: $data['apo'],
        );
    }
}
