<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

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
        public string $figiCode,
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
     *     figi_code: string,
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
            figiCode: $data['figi_code'],
        );
    }
}
