<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Currencies;

/**
 * @phpstan-type ExchangeRateType array{
 *     symbol: string,
 *     rate: float,
 *     timestamp: int
 *  }
 */
readonly class ExchangeRate
{
    public function __construct(public string $symbol, public float $rate, public int $timestamp)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var ExchangeRateType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param ExchangeRateType $data */
    public static function fromArray(array $data): self
    {
        return new self(symbol: $data['symbol'], rate: $data['rate'], timestamp: $data['timestamp']);
    }
}
