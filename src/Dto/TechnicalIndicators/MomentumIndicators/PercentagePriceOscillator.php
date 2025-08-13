<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type PercentagePriceOscillatorType array{
 *     datetime: string,
 *     ppo: string,
 * }
 * @implements ValueInterface<PercentagePriceOscillator, PercentagePriceOscillatorType>
 */
readonly class PercentagePriceOscillator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $ppo)
    {
    }

    /** @param PercentagePriceOscillatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            ppo: $data['ppo'],
        );
    }
}
