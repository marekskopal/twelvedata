<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MaximumIndexType array{
 *     datetime: string,
 *     maxidx: string,
 * }
 * @implements ValueInterface<MaximumIndex, MaximumIndexType>
 */
readonly class MaximumIndex implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $maxidx)
    {
    }

    /** @param MaximumIndexType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            maxidx: $data['maxidx'],
        );
    }
}
