<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type TypicalPriceType array{
 *     datetime: string,
 *     typprice: string,
 * }
 * @implements ValueInterface<TypicalPrice, TypicalPriceType>
 */
readonly class TypicalPrice implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $typprice)
    {
    }

    /** @param TypicalPriceType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            typprice: $data['typprice'],
        );
    }
}
