<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class Dividends
{
    /**
     * @param list<DividendsDividend> $dividends
     */
    public function __construct(
        public Meta $meta,
        public array $dividends,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     meta: array {
         *         symbol: string,
         *         name: string,
         *         currency: string,
         *         exchange: string,
         *         mic_code: string,
         *         exchange_timezone: string,
         *     },
         *     dividends: list<array{
         *         ex_date: string,
         *         amount: float,
         *     }
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     meta: array {
     *         symbol: string,
     *         name: string,
     *         currency: string,
     *         exchange: string,
     *         mic_code: string,
     *         exchange_timezone: string,
     *     },
     *     dividends: list<array{
     *         ex_date: string,
     *         amount: float,
     *     }
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            dividends: array_map(fn (array $item): DividendsDividend => DividendsDividend::fromArray($item), $data['dividends']),
        );
    }
}
