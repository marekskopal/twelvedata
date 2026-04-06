<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\BatchableRequest;
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
use MarekSkopal\TwelveData\Enum\TypeEnum;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

readonly class AssetCatalogs extends TwelveDataApi
{
    /** @return BatchableRequest<Stocks> */
    public function stocksRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
        ?bool $includeDelisted = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/stocks',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type?->value,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'show_plan' => QueryParamsUtils::booleanAsString($showPlan),
                'include_delisted' => QueryParamsUtils::booleanAsString($includeDelisted),
            ],
            responseFactory: Stocks::fromJson(...),
        );
    }

    public function stocks(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
        ?bool $includeDelisted = null,
    ): Stocks {
        return $this->stocksRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $type,
            $format,
            $delimiter,
            $showPlan,
            $includeDelisted,
        )->execute($this->client);
    }

    /** @return BatchableRequest<ForexPairs> */
    public function forexPairsRequest(
        ?string $symbol = null,
        ?string $currencyBase = null,
        ?string $currencyQuote = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/forex_pairs',
            queryParams: [
                'symbol' => $symbol,
                'currency_base' => $currencyBase,
                'currency_quote' => $currencyQuote,
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
            responseFactory: ForexPairs::fromJson(...),
        );
    }

    public function forexPairs(
        ?string $symbol = null,
        ?string $currencyBase = null,
        ?string $currencyQuote = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): ForexPairs {
        return $this->forexPairsRequest($symbol, $currencyBase, $currencyQuote, $format, $delimiter)->execute($this->client);
    }

    /** @return BatchableRequest<CryptocurrencyPairs> */
    public function cryptocurrencyPairsRequest(
        ?string $symbol = null,
        ?string $exchange = null,
        ?string $currencyBase = null,
        ?string $currencyQuote = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/cryptocurrencies',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'currency_base' => $currencyBase,
                'currency_quote' => $currencyQuote,
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
            responseFactory: CryptocurrencyPairs::fromJson(...),
        );
    }

    public function cryptocurrencyPairs(
        ?string $symbol = null,
        ?string $exchange = null,
        ?string $currencyBase = null,
        ?string $currencyQuote = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): CryptocurrencyPairs {
        return $this->cryptocurrencyPairsRequest($symbol, $exchange, $currencyBase, $currencyQuote, $format, $delimiter)->execute(
            $this->client,
        );
    }

    /** @return BatchableRequest<Etfs> */
    public function etfsRequest(
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
    ): BatchableRequest {
        return new BatchableRequest(
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
            responseFactory: Etfs::fromJson(...),
        );
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
        return $this->etfsRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $format,
            $delimiter,
            $showPlan,
            $includeDelisted,
        )->execute($this->client);
    }

    /** @return BatchableRequest<Funds> */
    public function fundsRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $includeDelisted = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/funds',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
                'type' => $type?->value,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => QueryParamsUtils::booleanAsString($includeDelisted),
                'page' => $page,
                'outputsize' => $outputsize,
            ],
            responseFactory: Funds::fromJson(...),
        );
    }

    public function funds(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $includeDelisted = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): Funds {
        return $this->fundsRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $country,
            $type,
            $format,
            $delimiter,
            $includeDelisted,
            $page,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<Bonds> */
    public function bondsRequest(
        ?string $symbol = null,
        ?string $exchange = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/bonds',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'country' => $country,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => QueryParamsUtils::booleanAsString($showPlan),
                'page' => $page,
                'outputsize' => $outputsize,
            ],
            responseFactory: Bonds::fromJson(...),
        );
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
        return $this->bondsRequest($symbol, $exchange, $country, $format, $delimiter, $showPlan, $page, $outputsize)->execute(
            $this->client,
        );
    }

    /** @return BatchableRequest<Indices> */
    public function indicesRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $includeDelisted = null,
    ): BatchableRequest {
        return new BatchableRequest(
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
            responseFactory: Indices::fromJson(...),
        );
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
        return $this->indicesRequest($symbol, $figi, $exchange, $micCode, $country, $format, $delimiter, $includeDelisted)->execute(
            $this->client,
        );
    }

    /** @return BatchableRequest<Commodities> */
    public function commoditiesRequest(
        ?string $symbol = null,
        ?string $category = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/commodities',
            queryParams: [
                'symbol' => $symbol,
                'category' => $category,
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
            responseFactory: Commodities::fromJson(...),
        );
    }

    public function commodities(
        ?string $symbol = null,
        ?string $category = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): Commodities {
        return $this->commoditiesRequest($symbol, $category, $format, $delimiter)->execute($this->client);
    }
}
