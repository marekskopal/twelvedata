<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class CountriesData
{
    public function __construct(
        public string $iso2,
        public string $iso3,
        public int $numeric,
        public string $name,
        public string $officialName,
        public string $capital,
        public string $currency,
    ) {
    }

    /**
     * @param array{
     *     iso2: string,
     *     iso3: string,
     *     numeric: string,
     *     name: string,
     *     official_name: string,
     *     capital: string,
     *     currency: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            iso2: $data['iso2'],
            iso3: $data['iso3'],
            numeric: (int) $data['numeric'],
            name: $data['name'],
            officialName: $data['official_name'],
            capital: $data['capital'],
            currency: $data['currency'],
        );
    }
}
