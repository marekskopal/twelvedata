<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class Earnings
{
    /** @param list<EarningsEarning> $earnings */
    public function __construct(public Meta $meta, public array $earnings)
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
         *     earnings: list<array{
         *         date: string,
         *         time: string,
         *         eps_estimate: float|null,
         *         eps_actual: float|null,
         *         difference: float|null,
         *         surprise_prc: float|null,
         *     }>
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
     *     earnings: list<array{
     *         date: string,
     *         time: string,
     *         eps_estimate: float|null,
     *         eps_actual: float|null,
     *         difference: float|null,
     *         surprise_prc: float|null,
     *     }>
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            earnings: array_map(fn (array $item): EarningsEarning => EarningsEarning::fromArray($item), $data['earnings']),
        );
    }
}
