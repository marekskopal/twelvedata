<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class CryptocurrenciesListData
{
    /** @param list<string> $availableExchanges */
    public function __construct(
        public string $symbol,
        public array $availableExchanges,
        public string $currencyBase,
        public string $currencyQuote,
    ) {
    }

    /**
     * @param array{
     *     symbol: string,
     *     available_exchanges: list<string>,
     *     currency_base: string,
     *     currency_quote: string,
     *  } $data
     */
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
