<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

class TimeSeriesMeta
{
    public function __construct(
        public string $symbol,
        public string $interval,
        public string $currency,
        public string $exchangeTimezone,
        public string $exchange,
        public string $micCode,
        public string $type,
    ) {
    }

    /**
     * @param array{
     *     symbol: string,
     *     interval: string,
     *     currency: string,
     *     exchange_timezone: string,
     *     exchange: string,
     *     mic_code: string,
     *     type: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            interval: $data['interval'],
            currency: $data['currency'],
            exchangeTimezone: $data['exchange_timezone'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            type: $data['type'],
        );
    }
}
