<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type WeightedClosePriceType array{
 *     datetime: string,
 *     wclprice: string,
 * }
 * @implements ValueInterface<WeightedClosePrice, WeightedClosePriceType>
 */
readonly class WeightedClosePrice implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $wclprice)
    {
    }

    /** @param WeightedClosePriceType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            wclprice: $data['wclprice'],
        );
    }
}
