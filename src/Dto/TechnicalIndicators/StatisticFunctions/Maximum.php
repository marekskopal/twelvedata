<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MaximumType array{
 *     datetime: string,
 *     max: string,
 * }
 * @implements ValueInterface<Maximum, MaximumType>
 */
readonly class Maximum implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $max)
    {
    }

    /** @param MaximumType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            max: $data['max'],
        );
    }
}
