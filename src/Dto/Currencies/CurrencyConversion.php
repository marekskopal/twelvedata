<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Currencies;

/**
 * @phpstan-type CurrencyConversionType array{
 *     symbol: string,
 *     rate: float,
 *     amount: float,
 *     timestamp: int
 *  }
 */
readonly class CurrencyConversion
{
    public function __construct(public string $symbol, public float $rate, public float $amount, public int $timestamp)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var CurrencyConversionType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param CurrencyConversionType $data */
    public static function fromArray(array $data): self
    {
        return new self(symbol: $data['symbol'], rate: $data['rate'], amount: $data['amount'], timestamp: $data['timestamp']);
    }
}
