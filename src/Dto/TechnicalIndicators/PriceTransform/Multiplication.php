<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MultiplicationType array{
 *     datetime: string,
 *     mult: string,
 * }
 * @implements ValueInterface<Multiplication, MultiplicationType>
 */
readonly class Multiplication implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $mult)
    {
    }

    /** @param MultiplicationType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            mult: $data['mult'],
        );
    }
}
