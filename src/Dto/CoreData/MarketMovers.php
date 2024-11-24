<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

readonly class MarketMovers
{
    /** @param list<MarketMoversValue> $values */
    public function __construct(public array $values, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     values: list<array{
         *         symbol: string,
         *         name: string,
         *         exchange: string,
         *         mic_code: string,
         *         datetime: string,
         *         last: float,
         *         high: float,
         *         low: float,
         *         volume: float,
         *         change: float,
         *         percent_change: float,
         *     }>,
         *     status: string,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     values: list<array{
     *         symbol: string,
     *         name: string,
     *         exchange: string,
     *         mic_code: string,
     *         datetime: string,
     *         last: float,
     *         high: float,
     *         low: float,
     *         volume: float,
     *         change: float,
     *         percent_change: float,
     *     }>,
     *     status: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            values: array_map(fn (array $item): MarketMoversValue => MarketMoversValue::fromArray($item), $data['values']),
            status: $data['status'],
        );
    }
}
