<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class ForexPairsListData
{
    public function __construct(
        public string $symbol,
        public string $currencyGroup,
        public string $currencyBase,
        public string $currencyQuote,
    ) {
    }

    /**
     * @param array{
     *     symbol: string,
     *     currency_group: string,
     *     currency_base: string,
     *     currency_quote: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            currencyGroup: $data['currency_group'],
            currencyBase: $data['currency_base'],
            currencyQuote: $data['currency_quote'],
        );
    }
}
