<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class BondsListList
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $country,
        public string $currency,
        public string $exchange,
        public string $type,
    ) {
    }

    /**
     * @param array{
     *     symbol: string,
     *     name: string,
     *     country: string,
     *     currency: string,
     *     exchange: string,
     *     type: string,
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
            type: $data['type'],
        );
    }
}
