<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type TrueRangeType array{
 *     datetime: string,
 *     trange: string,
 * }
 * @implements ValueInterface<TrueRange, TrueRangeType>
 */
readonly class TrueRange implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $trange)
    {
    }

    /** @param TrueRangeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            trange: $data['trange'],
        );
    }
}
