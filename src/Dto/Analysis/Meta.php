<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-type MetaType array{
 *     symbol: string,
 *     name: string,
 *     currency: string,
 *     exchange_timezone: string,
 *     exchange: string,
 *     mic_code: string,
 *     type: string,
 * }
 */
readonly class Meta
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $currency,
        public string $exchangeTimezone,
        public string $exchange,
        public string $micCode,
        public string $type,
    ) {
    }

    /** @param MetaType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            currency: $data['currency'],
            exchangeTimezone: $data['exchange_timezone'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            type: $data['type'],
        );
    }
}
