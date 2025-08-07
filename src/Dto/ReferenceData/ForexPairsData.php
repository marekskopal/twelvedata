<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-type ForexPairsDataType array{
 *     symbol: string,
 *     currency_group: string,
 *     currency_base: string,
 *     currency_quote: string,
 * }
 */
readonly class ForexPairsData
{
    public function __construct(
        public string $symbol,
        public string $currencyGroup,
        public string $currencyBase,
        public string $currencyQuote,
    ) {
    }

    /** @param ForexPairsDataType $data */
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
