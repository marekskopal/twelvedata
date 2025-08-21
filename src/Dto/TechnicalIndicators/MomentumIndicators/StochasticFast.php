<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type StochasticFastType array{
 *     datetime: string,
 *     fast_k: string,
 *     fast_d: string,
 * }
 * @implements ValueInterface<StochasticFast, StochasticFastType>
 */
readonly class StochasticFast implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $fastK, public string $fastD)
    {
    }

    /** @param StochasticFastType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            fastK: $data['fast_k'],
            fastD: $data['fast_d'],
        );
    }
}
