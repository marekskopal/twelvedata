<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type StochasticRelativeStrengthIndexType array{
 *     datetime: string,
 *     k: string,
 *     d: string,
 * }
 * @implements ValueInterface<StochasticRelativeStrengthIndex, StochasticRelativeStrengthIndexType>
 */
readonly class StochasticRelativeStrengthIndex implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $k, public string $d)
    {
    }

    /** @param StochasticRelativeStrengthIndexType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            k: $data['k'],
            d: $data['d'],
        );
    }
}
