<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class IndicesListData
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $country,
        public string $currency,
        public string $exchange,
        public string $micCode,
    ) {
    }

    /**
     * @param array{
     *     symbol: string,
     *     name: string,
     *     country: string,
     *     currency: string,
     *     exchange: string,
     *     mic_code: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            country: $data['country'],
            currency: $data['currency'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
        );
    }
}
