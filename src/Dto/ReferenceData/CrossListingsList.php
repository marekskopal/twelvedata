<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class CrossListingsList
{
    public function __construct(public string $symbol, public string $name, public string $exchange, public string $micCode,)
    {
    }

    /**
     * @param array{
     *     symbol: string,
     *     name: string,
     *     exchange: string,
     *     mic_code: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(symbol: $data['symbol'], name: $data['name'], exchange: $data['exchange'], micCode: $data['mic_code']);
    }
}
