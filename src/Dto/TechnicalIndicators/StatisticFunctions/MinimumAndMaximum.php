<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MinimumAndMaximumType array{
 *     datetime: string,
 *     min: string,
 *     max: string,
 * }
 * @implements ValueInterface<MinimumAndMaximum, MinimumAndMaximumType>
 */
readonly class MinimumAndMaximum implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $min, public string $max)
    {
    }

    /** @param MinimumAndMaximumType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            min: $data['min'],
            max: $data['max'],
        );
    }
}
