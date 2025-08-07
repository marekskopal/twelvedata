<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-type CryptocurrencyPairsDataType array{
 *     symbol: string,
 *     available_exchanges: list<string>,
 *     currency_base: string,
 *     currency_quote: string,
 * }
 */
readonly class CryptocurrencyPairsData
{
    /** @param list<string> $availableExchanges */
    public function __construct(
        public string $symbol,
        public array $availableExchanges,
        public string $currencyBase,
        public string $currencyQuote,
    ) {
    }

    /** @param CryptocurrencyPairsDataType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            availableExchanges: $data['available_exchanges'],
            currencyBase: $data['currency_base'],
            currencyQuote: $data['currency_quote'],
        );
    }
}
