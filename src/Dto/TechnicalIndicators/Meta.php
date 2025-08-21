<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators;

/**
 * @phpstan-import-type MetaIndicatorType from MetaIndicator
 * @phpstan-type MetaType array{
 *     symbol: string,
 *     interval: string,
 *     currency: string,
 *     exchange_timezone: string,
 *     exchange: string,
 *     mic_code: string,
 *     type: string,
 *     indicator: MetaIndicatorType
 * }
 */
readonly class Meta
{
    public function __construct(
        public string $symbol,
        public string $interval,
        public string $currency,
        public string $exchangeTimezone,
        public string $exchange,
        public string $micCode,
        public string $type,
        public MetaIndicator $indicator,
    ) {
    }

    /** @param MetaType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            interval: $data['interval'],
            currency: $data['currency'],
            exchangeTimezone: $data['exchange_timezone'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
            type: $data['type'],
            indicator: MetaIndicator::fromArray($data['indicator']),
        );
    }
}
