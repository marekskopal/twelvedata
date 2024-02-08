<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class BondsList
{
    public function __construct(public BondsListResult $result, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     result: array{
         *         count: int,
         *         list: list<array{
         *             symbol: string,
         *             name: string,
         *             country: string,
         *             currency: string,
         *             exchange: string,
         *             type: string,
         *         }>,
         *     },
         *     status: string,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *      result: array{
     *          count: int,
     *          list: list<array{
     *              symbol: string,
     *              name: string,
     *              country: string,
     *              currency: string,
     *              exchange: string,
     *              type: string,
     *          }>,
     *      },
     *      status: string,
     *   } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            result: BondsListResult::fromArray($data['result']),
            status: $data['status'],
        );
    }
}
