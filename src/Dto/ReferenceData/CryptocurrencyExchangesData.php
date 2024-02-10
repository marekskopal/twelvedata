<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class CryptocurrencyExchangesData
{
    public function __construct(public string $name)
    {
    }

    /**
     * @param array{
     *     name: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(name: $data['name']);
    }
}
