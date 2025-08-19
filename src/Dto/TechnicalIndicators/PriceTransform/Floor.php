<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type FloorType array{
 *     datetime: string,
 *     floor: string,
 * }
 * @implements ValueInterface<Floor, FloorType>
 */
readonly class Floor implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $floor)
    {
    }

    /** @param FloorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            floor: $data['floor'],
        );
    }
}
