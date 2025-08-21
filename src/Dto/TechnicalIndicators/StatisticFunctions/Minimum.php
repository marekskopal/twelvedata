<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MinimumType array{
 *     datetime: string,
 *     min: string,
 * }
 * @implements ValueInterface<Minimum, MinimumType>
 */
readonly class Minimum implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $min)
    {
    }

    /** @param MinimumType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            min: $data['min'],
        );
    }
}
