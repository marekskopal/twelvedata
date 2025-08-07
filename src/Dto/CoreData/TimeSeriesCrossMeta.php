<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

/**
 * @phpstan-type TimeSeriesCrossMetaType array{
 *     base_instrument: string,
 *     base_currency: string,
 *     base_exchange: string,
 *     interval: string,
 *     quote_instrument: string,
 *     quote_currency: string,
 *     quote_exchange: string,
 * }
 */
readonly class TimeSeriesCrossMeta
{
    public function __construct(
        public string $baseInstrument,
        public string $baseCurrency,
        public string $baseExchange,
        public string $interval,
        public string $quoteInstrument,
        public string $quoteCurrency,
        public string $quoteExchange,
    ) {
    }

    /** @param TimeSeriesCrossMetaType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            baseInstrument: $data['base_instrument'],
            baseCurrency: $data['base_currency'],
            baseExchange: $data['base_exchange'],
            interval: $data['interval'],
            quoteInstrument: $data['quote_instrument'],
            quoteCurrency: $data['quote_currency'],
            quoteExchange: $data['quote_exchange'],
        );
    }
}
