<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type SubtractionType array{
 *     datetime: string,
 *     sub: string,
 * }
 * @implements ValueInterface<Subtraction, SubtractionType>
 */
readonly class Subtraction implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $sub)
    {
    }

    /** @param SubtractionType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            sub: $data['sub'],
        );
    }
}
