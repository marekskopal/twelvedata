<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

use DateTimeImmutable;

readonly class MarketMoversValue
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $exchange,
        public string $micCode,
        public DateTimeImmutable $datetime,
        public float $last,
        public float $high,
        public float $low,
        public float $volume,
        public float $change,
        public float $percentChange,
    ) {
    }

    /**
     * @param array{
     *     symbol: string,
     *     name: string,
     *     exchange: string,
     *     mic_code: string,
     *     datetime: string,
     *     last: float,
     *     high: float,
     *     low: float,
     *     volume: float,
     *     change: float,
     *     percent_change: float,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            datetime: new DateTimeImmutable($data['datetime']),
            last: $data['last'],
            high: $data['high'],
            low: $data['low'],
            volume: $data['volume'],
            change: $data['change'],
            percentChange: $data['percent_change'],
        );
    }
}
