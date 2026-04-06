<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\BatchableRequest;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\ReferenceData\CrossListings;
use MarekSkopal\TwelveData\Dto\ReferenceData\EarliestTimestamp;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearch;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Utils\Guard;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

readonly class Discovery extends TwelveDataApi
{
    /** @return BatchableRequest<SymbolSearch> */
    public function symbolSearchRequest(string $symbol, ?int $outputsize = null, ?bool $showPlan = null): BatchableRequest
    {
        return new BatchableRequest(
            path: '/symbol_search',
            queryParams: [
                'symbol' => $symbol,
                'outputsize' => $outputsize !== null ? (string) $outputsize : null,
                'show_plan' => QueryParamsUtils::booleanAsString($showPlan),
            ],
            responseFactory: SymbolSearch::fromJson(...),
        );
    }

    public function symbolSearch(string $symbol, ?int $outputsize = null, ?bool $showPlan = null): SymbolSearch
    {
        return $this->symbolSearchRequest($symbol, $outputsize, $showPlan)->execute($this->client);
    }

    /** @return BatchableRequest<CrossListings> */
    public function crossListingsRequest(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/cross_listings',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
            responseFactory: CrossListings::fromJson(...),
        );
    }

    public function crossListings(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): CrossListings {
        return $this->crossListingsRequest($symbol, $exchange, $micCode, $country)->execute($this->client);
    }

    /** @return BatchableRequest<EarliestTimestamp> */
    public function earliestTimestampRequest(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneMinute,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $timezone = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/earliest_timestamp',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'timezone' => $timezone,
            ],
            responseFactory: EarliestTimestamp::fromJson(...),
        );
    }

    public function earliestTimestamp(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneMinute,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $timezone = null,
    ): EarliestTimestamp {
        return $this->earliestTimestampRequest(
            $symbol,
            $interval,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $timezone,
        )->execute($this->client);
    }
}
