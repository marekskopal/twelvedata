<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type StochasticOscillatorType array{
 *     datetime: string,
 *     slow_k: string,
 *     slow_d: string,
 * }
 * @implements ValueInterface<StochasticOscillator, StochasticOscillatorType>
 */
readonly class StochasticOscillator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $slowK, public string $slowD)
    {
    }

    /** @param StochasticOscillatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            slowK: $data['slow_k'],
            slowD: $data['slow_d'],
        );
    }
}
