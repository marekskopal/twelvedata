<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class FundHolders
{
    /** @param list<Holder> $fundHolders */
    public function __construct(public Meta $meta, public array $fundHolders)
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
         *     fund_holders: list<array{
         *         entity_name: string,
         *         date_reported: string,
         *         shares: int,
         *         value: int,
         *         percent_held: float,
         *     }>,
         * } $responseContents
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
     *     fund_holders: list<array{
     *         entity_name: string,
     *         date_reported: string,
     *         shares: int,
     *         value: int,
     *         percent_held: float,
     *     }>,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            fundHolders: array_map(
                fn (array $item): Holder => Holder::fromArray($item),
                $data['fund_holders'],
            ),
        );
    }
}
