<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Dto\BondsList;
use MarekSkopal\TwelveData\Dto\CryptocurrenciesList;
use MarekSkopal\TwelveData\Dto\CryptocurrencyExchanges;
use MarekSkopal\TwelveData\Dto\EarliestTimestamp;
use MarekSkopal\TwelveData\Dto\EtfList;
use MarekSkopal\TwelveData\Dto\Exchanges;
use MarekSkopal\TwelveData\Dto\ForexPairsList;
use MarekSkopal\TwelveData\Dto\FundsList;
use MarekSkopal\TwelveData\Dto\IndicesList;
use MarekSkopal\TwelveData\Dto\MarketState;
use MarekSkopal\TwelveData\Dto\StockList;
use MarekSkopal\TwelveData\Dto\SymbolSearch;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

class ReferenceData extends TwelveDataApi
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
                'include_delisted' => $includeDelisted !== null ? QueryParamsUtils::booleanAsString($includeDelisted) : null,
            ],
        );

        return StockList::fromJson($this->getResponseContents($response));
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

        return ForexPairsList::fromJson($this->getResponseContents($response));
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

        return CryptocurrenciesList::fromJson($this->getResponseContents($response));
    }

    public function etfList(
        string $symbol,
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
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => $includeDelisted !== null ? QueryParamsUtils::booleanAsString($includeDelisted) : null,
            ],
        );

        return EtfList::fromJson($this->getResponseContents($response));
    }

    public function indicesList(
        string $symbol,
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
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'include_delisted' => $includeDelisted !== null ? QueryParamsUtils::booleanAsString($includeDelisted) : null,
            ],
        );

        return IndicesList::fromJson($this->getResponseContents($response));
    }

    public function fundsList(
        string $symbol,
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

        return FundsList::fromJson($this->getResponseContents($response));
    }

    public function bondsList(
        string $symbol,
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

        return BondsList::fromJson($this->getResponseContents($response));
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

        return Exchanges::fromJson($this->getResponseContents($response));
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

        return CryptocurrencyExchanges::fromJson($this->getResponseContents($response));
    }

    public function symbolSearch(string $symbol, ?int $outputsize = null,): SymbolSearch
    {
        $response = $this->client->get(
            path: '/symbol_search',
            queryParams: [
                'symbol' => $symbol,
                'outputsize' => $outputsize !== null ? (string) $outputsize : null,
            ],
        );

        return SymbolSearch::fromJson($this->getResponseContents($response));
    }

    public function earliestTimestamp(
        string $symbol,
        IntervalEnum $interval,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $timezone = null,
    ): EarliestTimestamp {
        $response = $this->client->get(
            path: '/earliest_timestamp',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'exchange' => $exchange,
                'micCode' => $micCode,
                'timezone' => $timezone,
            ],
        );

        return EarliestTimestamp::fromJson($this->getResponseContents($response));
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

        $responseContents = $this->getResponseContents($response);

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
}
