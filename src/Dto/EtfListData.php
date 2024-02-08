<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class EtfListData
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $currency,
        public string $exchange,
        public string $micCode,
        public string $country,
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
        );
    }
}
