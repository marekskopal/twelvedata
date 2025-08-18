<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type NormalizedAverageTrueRangeType array{
 *     datetime: string,
 *     natr: string,
 * }
 * @implements ValueInterface<NormalizedAverageTrueRange, NormalizedAverageTrueRangeType>
 */
readonly class NormalizedAverageTrueRange implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $natr)
    {
    }

    /** @param NormalizedAverageTrueRangeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            natr: $data['natr'],
        );
    }
}
