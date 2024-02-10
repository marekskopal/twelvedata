<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

use DateTimeImmutable;

readonly class Quote
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $exchange,
        public string $micCode,
        public string $currency,
        public DateTimeImmutable $datetime,
        public int $timestamp,
        public string $open,
        public string $high,
        public string $low,
        public string $close,
        public string $volume,
        public string $previousClose,
        public string $change,
        public string $percentChange,
        public string $averageVolume,
        public ?string $rolling1dChange,
        public ?string $rolling7dChange,
        public ?string $rollingPeriodChange,
        public bool $isMarketOpen,
        public QuoteFiftyTwoWeek $fiftyTwoWeek,
        public ?string $extendedChange,
        public ?string $extendedPercentChange,
        public ?string $extendedPrice,
        public ?int $extendedTimestamp,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     symbol: string,
         *     name: string,
         *     exchange: string,
         *     mic_code: string,
         *     currency: string,
         *     datetime: string,
         *     timestamp: int,
         *     open: string,
         *     high: string,
         *     low: string,
         *     close: string,
         *     volume: string,
         *     previous_close: string,
         *     change: string,
         *     percent_change: string,
         *     average_volume: string,
         *     rolling_1d_change?: string,
         *     rolling_7d_change?: string,
         *     rolling_period_change?: string,
         *     is_market_open: bool,
         *     fifty_two_week: array{
         *         low: string,
         *         high: string,
         *         low_change: string,
         *         high_change: string,
         *         low_change_percent: string,
         *         high_change_percent: string,
         *         range: string,
         *     },
         *     extended_change?: string,
         *     extended_percent_change?: string,
         *     extended_price?: string,
         *     extended_timestamp?: int,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     symbol: string,
     *     name: string,
     *     exchange: string,
     *     mic_code: string,
     *     currency: string,
     *     datetime: string,
     *     timestamp: int,
     *     open: string,
     *     high: string,
     *     low: string,
     *     close: string,
     *     volume: string,
     *     previous_close: string,
     *     change: string,
     *     percent_change: string,
     *     average_volume: string,
     *     rolling_1d_change?: string,
     *     rolling_7d_change?: string,
     *     rolling_period_change?: string,
     *     is_market_open: bool,
     *     fifty_two_week: array{
     *         low: string,
     *         high: string,
     *         low_change: string,
     *         high_change: string,
     *         low_change_percent: string,
     *         high_change_percent: string,
     *         range: string,
     *     },
     *     extended_change?: string,
     *     extended_percent_change?: string,
     *     extended_price?: string,
     *     extended_timestamp?: int,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            currency: $data['currency'],
            datetime: new DateTimeImmutable($data['datetime']),
            timestamp: $data['timestamp'],
            open: $data['open'],
            high: $data['high'],
            low: $data['low'],
            close: $data['close'],
            volume: $data['volume'],
            previousClose: $data['previous_close'],
            change: $data['change'],
            percentChange: $data['percent_change'],
            averageVolume: $data['average_volume'],
            rolling1dChange: $data['rolling_1d_change'] ?? null,
            rolling7dChange: $data['rolling_7d_change'] ?? null,
            rollingPeriodChange: $data['rolling_period_change'] ?? null,
            isMarketOpen: $data['is_market_open'],
            fiftyTwoWeek: QuoteFiftyTwoWeek::fromArray($data['fifty_two_week']),
            extendedChange: $data['extended_change'] ?? null,
            extendedPercentChange: $data['extended_percent_change'] ?? null,
            extendedPrice: $data['extended_price'] ?? null,
            extendedTimestamp: $data['extended_timestamp'] ?? null,
        );
    }
}
