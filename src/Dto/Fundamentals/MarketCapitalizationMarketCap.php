<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-type MarketCapitalizationMarketCapType array{
 *     date: string,
 *     value: int,
 * }
 */
readonly class MarketCapitalizationMarketCap
{
    public function __construct(public DateTimeImmutable $date, public int $value)
    {
    }

    /** @param MarketCapitalizationMarketCapType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            value: $data['value'],
        );
    }
}
