<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type SummationType array{
 *     datetime: string,
 *     sum: string,
 * }
 * @implements ValueInterface<Summation, SummationType>
 */
readonly class Summation implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $sum)
    {
    }

    /** @param SummationType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            sum: $data['sum'],
        );
    }
}
