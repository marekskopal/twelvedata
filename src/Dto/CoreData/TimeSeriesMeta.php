<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

readonly class TimeSeriesMeta
{
    public function __construct(
        public string $symbol,
        public string $interval,
        public ?string $currency,
        public ?string $exchangeTimezone,
        public ?string $exchange,
        public ?string $micCode,
        public ?string $currencyBase,
        public ?string $currencyQuote,
        public string $type,
    ) {
    }

    /**
     * @param array{
     *     symbol: string,
     *     interval: string,
     *     currency?: string,
     *     exchange_timezone?: string,
     *     exchange?: string,
     *     mic_code?: string,
     *     currency_base?: string,
     *     currency_quote?: string,
     *     type: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            interval: $data['interval'],
            currency: $data['currency'] ?? null,
            exchangeTimezone: $data['exchange_timezone'] ?? null,
            exchange: $data['exchange'] ?? null,
            micCode: $data['mic_code'] ?? null,
            currencyBase: $data['currency_base'] ?? null,
            currencyQuote: $data['currency_quote'] ?? null,
            type: $data['type'],
        );
    }
}
