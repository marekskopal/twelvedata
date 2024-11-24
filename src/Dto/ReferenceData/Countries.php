<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class Countries
{
    /** @param list<CountriesData> $data */
    public function __construct(public array $data)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     data: list<array{
         *         iso2: string,
         *         iso3: string,
         *         numeric: string,
         *         name: string,
         *         official_name: string,
         *         capital: string,
         *         currency: string,
         *     }>,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     data: list<array{
     *         iso2: string,
     *         iso3: string,
     *         numeric: string,
     *         name: string,
     *         official_name: string,
     *         capital: string,
     *         currency: string,
     *     }>,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(
                fn(array $exchangeScheduleData) => CountriesData::fromArray($exchangeScheduleData),
                $data['data'],
            ),
        );
    }
}
