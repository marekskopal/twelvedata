<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MidpriceType array{
 *     datetime: string,
 *     midprice: string,
 * }
 * @implements ValueInterface<Midprice, MidpriceType>
 */
readonly class Midprice implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $midprice)
    {
    }

    /** @param MidpriceType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            midprice: $data['midprice'],
        );
    }
}
