<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class CryptocurrenciesList
{
    /** @param list<CryptocurrenciesListData> $data */
    public function __construct(public array $data, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     data: list<array{
         *         symbol: string,
         *         available_exchanges: list<string>,
         *         currency_base: string,
         *         currency_quote: string,
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
     *         available_exchanges: list<string>,
     *         currency_base: string,
     *         currency_quote: string,
     *     }>,
     *     status: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(fn (array $item): CryptocurrenciesListData => CryptocurrenciesListData::fromArray($item), $data['data']),
            status: $data['status'],
        );
    }
}
