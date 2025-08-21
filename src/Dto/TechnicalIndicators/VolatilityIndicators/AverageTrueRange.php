<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AverageTrueRangeType array{
 *     datetime: string,
 *     atr: string,
 * }
 * @implements ValueInterface<AverageTrueRange, AverageTrueRangeType>
 */
readonly class AverageTrueRange implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $atr)
    {
    }

    /** @param AverageTrueRangeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            atr: $data['atr'],
        );
    }
}
