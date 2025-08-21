<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\ReferenceData\Bonds;
use MarekSkopal\TwelveData\Dto\ReferenceData\Commodities;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyPairs;
use MarekSkopal\TwelveData\Dto\ReferenceData\Etfs;
use MarekSkopal\TwelveData\Dto\ReferenceData\ForexPairs;
use MarekSkopal\TwelveData\Dto\ReferenceData\Funds;
use MarekSkopal\TwelveData\Dto\ReferenceData\Indices;
use MarekSkopal\TwelveData\Dto\ReferenceData\Stocks;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

readonly class AssetCatalogs extends TwelveDataApi
{
    public function stocks(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
        ?bool $includeDelisted = null,
    ): Stocks {
        $response = $this->client->get(
            path: '/stocks',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'show_plan' => QueryParamsUtils::booleanAsString($showPlan),
                'include_delisted' => QueryParamsUtils::booleanAsString($includeDelisted),
            ],
        );

        return Stocks::fromJson($response);
    }

    public function forexPairs(
        ?string $symbol = null,
        ?string $currencyBase = null,
        ?string $currencyQuote = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): ForexPairs {
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

        return ForexPairs::fromJson($response);
    }

    public function cryptocurrencyPairs(
        ?string $symbol = null,
        ?string $exchange = null,
        ?string $currencyBase = null,
        ?string $currencyQuote = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): CryptocurrencyPairs {
        $response = $this->client->get(
            path: '/cryptocurrencies',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'currency_base' => $currencyBase,
                'currency_quote' => $currencyQuote,
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
        );

        return CryptocurrencyPairs::fromJson($response);
    }

    public function etfs(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
        ?bool $includeDelisted = null,
    ): Etfs {
        $response = $this->client->get(
            path: '/etf',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'show_plan' => QueryParamsUtils::booleanAsString($showPlan),
                'include_delisted' => QueryParamsUtils::booleanAsString($includeDelisted),
            ],
        );

        return Etfs::fromJson($response);
    }

    public function funds(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $country = null,
        ?string $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $includeDelisted = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): Funds {
        $response = $this->client->get(
            path: '/funds',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
                'type' => $type,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => QueryParamsUtils::booleanAsString($includeDelisted),
                'page' => $page !== null ? (string) $page : null,
                'outputsize' => $outputsize !== null ? (string) $outputsize : null,
            ],
        );

        return Funds::fromJson($response);
    }

    public function bonds(
        ?string $symbol = null,
        ?string $exchange = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): Bonds {
        $response = $this->client->get(
            path: '/bonds',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'country' => $country,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => QueryParamsUtils::booleanAsString($showPlan),
                'page' => $page !== null ? (string) $page : null,
                'outputsize' => $outputsize !== null ? (string) $outputsize : null,
            ],
        );

        return Bonds::fromJson($response);
    }

    public function indices(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $includeDelisted = null,
    ): Indices {
        $response = $this->client->get(
            path: '/indices',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => QueryParamsUtils::booleanAsString($includeDelisted),
            ],
        );

        return Indices::fromJson($response);
    }

    public function commodities(
        ?string $symbol = null,
        ?string $category = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): Commodities {
        $response = $this->client->get(
            path: '/commodities',
            queryParams: [
                'symbol' => $symbol,
                'category' => $category,
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
        );

        return Commodities::fromJson($response);
    }
}
