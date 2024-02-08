<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class SymbolSearch
{
    /** @param list<SymbolSearchData> $data */
    public function __construct(public array $data, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     data: list<array{
         *         symbol: string,
         *         instrument_name: string,
         *         exchange: string,
         *         mic_code: string,
         *         exchange_timezone: string,
         *         instrument_type: string,
         *         country: string,
         *         currency: string,
         *     }>,
         *     status: string,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     data: list<array{
     *         symbol: string,
     *         instrument_name: string,
     *         exchange: string,
     *         mic_code: string,
     *         exchange_timezone: string,
     *         instrument_type: string,
     *         country: string,
     *         currency: string,
     *     }>,
     *     status: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(fn (array $item): SymbolSearchData => SymbolSearchData::fromArray($item), $data['data']),
            status: $data['status'],
        );
    }
}
