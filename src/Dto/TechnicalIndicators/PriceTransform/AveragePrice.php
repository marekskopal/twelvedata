<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AveragePriceType array{
 *     datetime: string,
 *     avgprice: string,
 * }
 * @implements ValueInterface<AveragePrice, AveragePriceType>
 */
readonly class AveragePrice implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $avgprice)
    {
    }

    /** @param AveragePriceType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            avgprice: $data['avgprice'],
        );
    }
}
