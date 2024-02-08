<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class ExchangeRate
{
    public function __construct(public string $symbol, public float $rate, public int $timestamp)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     symbol: string,
         *     rate: float,
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
     *     timestamp: int
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(symbol: $data['symbol'], rate: $data['rate'], timestamp: $data['timestamp']);
    }
}
