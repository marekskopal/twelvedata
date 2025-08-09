<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-type RecommendationsMonthType array{
 *     strong_buy: int,
 *     buy: int,
 *     hold: int,
 *     sell: int,
 *     strong_sell: int,
 * }
 */
readonly class RecommendationsMonth
{
    public function __construct(public int $strongBuy, public int $buy, public int $hold, public int $sell, public int $strongSell,)
    {
    }

    /** @param RecommendationsMonthType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            strongBuy: $data['strong_buy'],
            buy: $data['buy'],
            hold: $data['hold'],
            sell: $data['sell'],
            strongSell: $data['strong_sell'],
        );
    }
}
