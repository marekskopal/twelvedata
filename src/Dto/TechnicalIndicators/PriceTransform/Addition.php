<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AdditionType array{
 *     datetime: string,
 *     add: string,
 * }
 * @implements ValueInterface<Addition, AdditionType>
 */
readonly class Addition implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $add)
    {
    }

    /** @param AdditionType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            add: $data['add'],
        );
    }
}
