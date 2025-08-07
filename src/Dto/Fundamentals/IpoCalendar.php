<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-type IpoCalendarType array{
 *     date: string,
 *     symbol: string,
 *     name: string,
 *     exchange: string,
 *     mic_code: string,
 *     price_range_low: float|null,
 *     price_range_high: float|null,
 *     offer_price: float|null,
 *     currency: string,
 *     shares: int|null,
 * }
 */
readonly class IpoCalendar
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $symbol,
        public string $name,
        public string $exchange,
        public string $micCode,
        public ?float $priceRangeLow,
        public ?float $priceRangeHigh,
        public ?float $offerPrice,
        public string $currency,
        public ?int $shares,
    ) {
    }

    /** @param IpoCalendarType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            symbol: $data['symbol'],
            name: $data['name'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            priceRangeLow: $data['price_range_low'],
            priceRangeHigh: $data['price_range_high'],
            offerPrice: $data['offer_price'],
            currency: $data['currency'],
            shares: $data['shares'],
        );
    }
}
