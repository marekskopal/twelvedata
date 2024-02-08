<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Dto\CryptocurrenciesList;
use MarekSkopal\TwelveData\Dto\ForexPairsList;
use MarekSkopal\TwelveData\Dto\StockList;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

class ReferenceData
{
    public function __construct(private readonly Client $client)
    {
    }

    public function stockList(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?string $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
        ?bool $includeDelisted = null,
    ): StockList {
        $response = $this->client->get(
            path: '/stocks',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type,
                'outputSize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'show_plan' => $showPlan !== null ? QueryParamsUtils::booleanAsString($showPlan) : null,
                'include_delisted' => $includeDelisted !== null ? QueryParamsUtils::booleanAsString($includeDelisted) : null,
            ],
        );

        return StockList::fromJson($response->getBody()->getContents());
    }

    public function forexPairsList(
        string $symbol,
        ?string $currencyBase = null,
        ?string $currencyQuote = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): ForexPairsList {
        $response = $this->client->get(
            path: '/forex_pairs',
            queryParams: [
                'symbol' => $symbol,
                'currency_base' => $currencyBase,
                'currency_quote' => $currencyQuote,
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
        );

        return ForexPairsList::fromJson($response->getBody()->getContents());
    }

    public function cryptocurrenciesList(
        string $symbol,
        ?string $exchange = null,
        ?string $currencyBase = null,
        ?string $currencyQuote = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): CryptocurrenciesList {
        $response = $this->client->get(
            path: '/forex_pairs',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'currency_base' => $currencyBase,
                'currency_quote' => $currencyQuote,
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
        );

        return CryptocurrenciesList::fromJson($response->getBody()->getContents());
    }
}
