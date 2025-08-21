<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MinimumAndMaximumIndexType array{
 *     datetime: string,
 *     minidx: string,
 *     maxidx: string,
 * }
 * @implements ValueInterface<MinimumAndMaximumIndex, MinimumAndMaximumIndexType>
 */
readonly class MinimumAndMaximumIndex implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $minidx, public string $maxidx)
    {
    }

    /** @param MinimumAndMaximumIndexType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            minidx: $data['minidx'],
            maxidx: $data['maxidx'],
        );
    }
}
