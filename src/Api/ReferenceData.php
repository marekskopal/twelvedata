<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Dto\ReferenceData\BondsList;
use MarekSkopal\TwelveData\Dto\ReferenceData\CommoditiesList;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrenciesList;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyExchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\EarliestTimestamp;
use MarekSkopal\TwelveData\Dto\ReferenceData\EtfList;
use MarekSkopal\TwelveData\Dto\ReferenceData\Exchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\ForexPairsList;
use MarekSkopal\TwelveData\Dto\ReferenceData\FundsList;
use MarekSkopal\TwelveData\Dto\ReferenceData\IndicesList;
use MarekSkopal\TwelveData\Dto\ReferenceData\MarketState;
use MarekSkopal\TwelveData\Dto\ReferenceData\StockList;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearch;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

class ReferenceData extends TwelveDataApi
{
    public function stockList(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $includeDelisted = null,
    ): StockList {
        $response = $this->client->get(
            path: '/stocks',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => $includeDelisted !== null ? QueryParamsUtils::booleanAsString($includeDelisted) : null,
            ],
        );

        return StockList::fromJson($response);
    }

    public function forexPairsList(
        ?string $symbol = null,
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

        return ForexPairsList::fromJson($response);
    }

    public function cryptocurrenciesList(
        ?string $symbol = null,
        ?string $exchange = null,
        ?string $currencyBase = null,
        ?string $currencyQuote = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): CryptocurrenciesList {
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

        return CryptocurrenciesList::fromJson($response);
    }

    public function fundsList(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $exchange = null,
        ?string $country = null,
        ?string $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $includeDelisted = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): FundsList {
        $response = $this->client->get(
            path: '/funds',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'exchange' => $exchange,
                'country' => $country,
                'type' => $type,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => $includeDelisted !== null ? QueryParamsUtils::booleanAsString($includeDelisted) : null,
                'page' => $page !== null ? (string) $page : null,
                'outputsize' => $outputsize !== null ? (string) $outputsize : null,
            ],
        );

        return FundsList::fromJson($response);
    }

    public function bondsList(
        ?string $symbol = null,
        ?string $exchange = null,
        ?string $country = null,
        ?string $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $includeDelisted = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): BondsList {
        $response = $this->client->get(
            path: '/bonds',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'country' => $country,
                'type' => $type,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => $includeDelisted !== null ? QueryParamsUtils::booleanAsString($includeDelisted) : null,
                'page' => $page !== null ? (string) $page : null,
                'outputsize' => $outputsize !== null ? (string) $outputsize : null,
            ],
        );

        return BondsList::fromJson($response);
    }

    public function etfList(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $includeDelisted = null,
    ): EtfList {
        $response = $this->client->get(
            path: '/etf',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => $includeDelisted !== null ? QueryParamsUtils::booleanAsString($includeDelisted) : null,
            ],
        );

        return EtfList::fromJson($response);
    }

    public function indicesList(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $includeDelisted = null,
    ): IndicesList {
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
                'include_delisted' => $includeDelisted !== null ? QueryParamsUtils::booleanAsString($includeDelisted) : null,
            ],
        );

        return IndicesList::fromJson($response);
    }

    public function commoditiesList(
        ?string $symbol = null,
        ?string $category = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): CommoditiesList {
        $response = $this->client->get(
            path: '/commodities',
            queryParams: [
                'symbol' => $symbol,
                'category' => $category,
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
        );

        return CommoditiesList::fromJson($response);
    }

    public function exchanges(
        ?string $type = null,
        ?string $name = null,
        ?string $code = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
    ): Exchanges {
        $response = $this->client->get(
            path: '/exchanges',
            queryParams: [
                'type' => $type,
                'name' => $name,
                'code' => $code,
                'country' => $country,
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
        );

        return Exchanges::fromJson($response);
    }

    public function cryptocurrencyExchanges(?FormatEnum $format = null, ?string $delimiter = null,): CryptocurrencyExchanges
    {
        $response = $this->client->get(
            path: '/cryptocurrency_exchanges',
            queryParams: [
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
        );

        return CryptocurrencyExchanges::fromJson($response);
    }

    /** @return list<MarketState> */
    public function marketState(?string $exchange = null, ?string $code = null, ?string $country = null,): array
    {
        $response = $this->client->get(
            path: '/market_state',
            queryParams: [
                'exchange' => $exchange,
                'code' => $code,
                'country' => $country,
            ],
        );

        $responseContents = $response;

        /**
         * @var list<array{
         *     name: string,
         *     code: string,
         *     country: string,
         *     is_market_open: bool,
         *     time_after_open: string,
         *     time_to_open: string,
         *     time_to_close: string,
         *  }> $data
         */
        $data = json_decode($responseContents, associative: true);

        return array_map(fn (array $item): MarketState => MarketState::fromArray($item), $data);
    }

    public function earliestTimestamp(
        string $symbol,
        IntervalEnum $interval,
        ?string $figi = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $timezone = null,
    ): EarliestTimestamp {
        $response = $this->client->get(
            path: '/earliest_timestamp',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'timezone' => $timezone,
            ],
        );

        return EarliestTimestamp::fromJson($response);
    }

    public function symbolSearch(string $symbol, ?string $figi = null, ?int $outputsize = null,): SymbolSearch
    {
        $response = $this->client->get(
            path: '/symbol_search',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'outputsize' => $outputsize !== null ? (string) $outputsize : null,
            ],
        );

        return SymbolSearch::fromJson($response);
    }
}
