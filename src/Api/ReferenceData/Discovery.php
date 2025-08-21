<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\ReferenceData\CrossListings;
use MarekSkopal\TwelveData\Dto\ReferenceData\EarliestTimestamp;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearch;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Exception\InvalidArgumentException;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

readonly class Discovery extends TwelveDataApi
{
    public function symbolSearch(string $symbol, ?int $outputsize = null, ?bool $showPlan = null): SymbolSearch
    {
        $response = $this->client->get(
            path: '/symbol_search',
            queryParams: [
                'symbol' => $symbol,
                'outputsize' => $outputsize !== null ? (string) $outputsize : null,
                'show_plan' => QueryParamsUtils::booleanAsString($showPlan),
            ],
        );

        return SymbolSearch::fromJson($response);
    }

    public function crossListings(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): CrossListings {
        $response = $this->client->get(
            path: '/commodities',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return CrossListings::fromJson($response);
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
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
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
        );

        return EarliestTimestamp::fromJson($response);
    }
}
