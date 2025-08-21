<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AverageType array{
 *     datetime: string,
 *     avg: string,
 * }
 * @implements ValueInterface<Average, AverageType>
 */
readonly class Average implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $avg)
    {
    }

    /** @param AverageType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            avg: $data['avg'],
        );
    }
}
