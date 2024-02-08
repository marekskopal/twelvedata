<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class SymbolSearchData
{
    public function __construct(
        public string $symbol,
        public string $instrumentName,
        public string $exchange,
        public string $micCode,
        public string $exchangeTimezone,
        public string $instrumentType,
        public string $country,
        public string $currency,
    ) {
    }

    /**
     * @param array{
     *     symbol: string,
     *     instrument_name: string,
     *     exchange: string,
     *     mic_code: string,
     *     exchange_timezone: string,
     *     instrument_type: string,
     *     country: string,
     *     currency: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            instrumentName: $data['instrument_name'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            exchangeTimezone: $data['exchange_timezone'],
            instrumentType: $data['instrument_type'],
            country: $data['country'],
            currency: $data['currency'],
        );
    }
}
