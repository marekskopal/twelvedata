<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class Splits
{
    /** @param list<SplitsSplit> $splits */
    public function __construct(public Meta $meta, public array $splits)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     meta: array{
         *         symbol: string,
         *         name: string,
         *         currency: string,
         *         exchange: string,
         *         mic_code: string,
         *         exchange_timezone: string,
         *     },
         *     splits: list<array{
         *         date: string,
         *         description: string,
         *         ratio: float,
         *         from_factor: float,
         *         to_factor: float,
         *   }>
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     meta: array{
     *         symbol: string,
     *         name: string,
     *         currency: string,
     *         exchange: string,
     *         mic_code: string,
     *         exchange_timezone: string,
     *     },
     *     splits: list<array{
     *         date: string,
     *         description: string,
     *         ratio: float,
     *         from_factor: float,
     *         to_factor: float,
     *     }>
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            splits: array_map(fn (array $item): SplitsSplit => SplitsSplit::fromArray($item), $data['splits']),
        );
    }
}
