<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MinimumIndexType array{
 *     datetime: string,
 *     minidx: string,
 * }
 * @implements ValueInterface<MinimumIndex, MinimumIndexType>
 */
readonly class MinimumIndex implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $minidx)
    {
    }

    /** @param MinimumIndexType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            minidx: $data['minidx'],
        );
    }
}
