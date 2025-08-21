<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MedianPriceType array{
 *     datetime: string,
 *     medprice: string,
 * }
 * @implements ValueInterface<MedianPrice, MedianPriceType>
 */
readonly class MedianPrice implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $medprice)
    {
    }

    /** @param MedianPriceType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            medprice: $data['medprice'],
        );
    }
}
