<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class FundsList
{
    public function __construct(public FundsListResult $result, public string $status)
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
         *             figi_code: string,
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
     *              figi_code: string,
     *          }>,
     *      },
     *      status: string,
     *   } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            result: FundsListResult::fromArray($data['result']),
            status: $data['status'],
        );
    }
}
