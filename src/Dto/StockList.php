<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class StockList
{
    /** @param list<StockListData> $data */
    public function __construct(public array $data, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     data: list<array{
         *         symbol: string,
         *         name: string,
         *         currency: string,
         *         exchange: string,
         *         mic_code: string,
         *         country: string,
         *         type: string,
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
     *         name: string,
     *         currency: string,
     *         exchange: string,
     *         mic_code: string,
     *         country: string,
     *         type: string,
     *     }>,
     *     status: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(fn (array $item): StockListData => StockListData::fromArray($item), $data['data']),
            status: $data['status'],
        );
    }
}
