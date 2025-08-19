<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type DivisionType array{
 *     datetime: string,
 *     div: string,
 * }
 * @implements ValueInterface<Division, DivisionType>
 */
readonly class Division implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $div)
    {
    }

    /** @param DivisionType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            div: $data['div'],
        );
    }
}
