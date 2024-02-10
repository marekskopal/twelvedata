<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

readonly class CurrencyConversion
{
    public function __construct(public string $symbol, public float $rate, public float $amount, public int $timestamp)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     symbol: string,
         *     rate: float,
         *     amount: float,
         *     timestamp: int
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     symbol: string,
     *     rate: float,
     *     amount: float,
     *     timestamp: int
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(symbol: $data['symbol'], rate: $data['rate'], amount: $data['amount'], timestamp: $data['timestamp']);
    }
}
