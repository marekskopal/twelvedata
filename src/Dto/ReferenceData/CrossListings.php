<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class CrossListings
{
    public function __construct(public CrossListingsResult $result)
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
         *             exchange: string,
         *             mic_code: string,
         *         }>,
         *     },
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
     *              exchange: string,
     *              mic_code: string,
     *          }>,
     *      },
     *   } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            result: CrossListingsResult::fromArray($data['result']),
        );
    }
}
