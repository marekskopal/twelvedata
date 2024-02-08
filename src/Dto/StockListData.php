<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class StockListData
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $currency,
        public string $exchange,
        public string $micCode,
        public string $country,
        public string $type,
    ) {
    }

    /**
     * @param array{
     *     symbol: string,
     *     name: string,
     *     currency: string,
     *     exchange: string,
     *     mic_code: string,
     *     country: string,
     *     type: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            currency: $data['currency'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            country: $data['country'],
            type: $data['type'],
        );
    }
}
