<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\CoreData\EndOfDayPrice;
use MarekSkopal\TwelveData\Dto\CoreData\LatestPrice;
use MarekSkopal\TwelveData\Dto\CoreData\MarketMovers;
use MarekSkopal\TwelveData\Dto\CoreData\Quote;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeries;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeriesCross;
use MarekSkopal\TwelveData\Enum\AdjustEnum;
use MarekSkopal\TwelveData\Enum\DirectionEnum;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Enum\MarketMoverEnum;
use MarekSkopal\TwelveData\Enum\OrderEnum;
use MarekSkopal\TwelveData\Enum\PrepostEnum;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

readonly class CoreData extends TwelveDataApi
{
    /** @param list<AdjustEnum>|null $adjust */
    public function timeSeries(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?int $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
        ?OrderEnum $order = null,
        ?string $timezone = null,
        ?DateTimeImmutable $date = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $previousClose = null,
        ?array $adjust = null,
    ): TimeSeries {
        $response = $this->client->get(
            path: '/time_series',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type,
                'outputsize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'prepost' => $prepost?->value,
                'dp' => $dp !== null ? (string) $dp : null,
                'order' => $order?->value,
                'timezone' => $timezone,
                'date' => $date?->format('Y-m-d'),
                'start_date' => $startDate?->format('Y-m-d h:i:s'),
                'end_date' => $endDate?->format('Y-m-d h:i:s'),
                'previous_close' => $previousClose !== null ? QueryParamsUtils::booleanAsString($previousClose) : null,
                'adjust' => $adjust !== null ? QueryParamsUtils::enumArrayAsString($adjust) : null,
            ],
        );

        return TimeSeries::fromJson($response);
    }

    /** @param list<AdjustEnum>|null $adjust */
    public function timeSeriesCross(
        string $base,
        string $quote,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $baseType = null,
        ?string $baseExchange = null,
        ?string $baseMicCode = null,
        ?string $quoteType = null,
        ?string $quoteExchange = null,
        ?string $quoteMicCode = null,
        ?int $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?array $adjust = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): TimeSeriesCross {
        $response = $this->client->get(
            path: '/time_series/cross',
            queryParams: [
                'base' => $base,
                'quote' => $quote,
                'interval' => $interval->value,
                'base_type' => $baseType,
                'base_exchange' => $baseExchange,
                'base_mic_code' => $baseMicCode,
                'quote_type' => $quoteType,
                'quote_exchange' => $quoteExchange,
                'quote_mic_code' => $quoteMicCode,
                'outputsize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'prepost' => $prepost?->value,
                'start_date' => $startDate?->format('Y-m-d h:i:s'),
                'end_date' => $endDate?->format('Y-m-d h:i:s'),
                'adjust' => $adjust !== null ? QueryParamsUtils::enumArrayAsString($adjust) : null,
                'dp' => $dp,
                'timezone' => $timezone,
            ],
        );

        return TimeSeriesCross::fromJson($response);
    }

    public function quote(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $volumeTypePeriod = null,
        ?string $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?bool $eod = null,
        ?int $rollingPeriod = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): Quote {
        $response = $this->client->get(
            path: '/quote',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'interval' => $interval?->value,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'volume_time_period' => $volumeTypePeriod !== null ? (string) $volumeTypePeriod : null,
                'type' => $type,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'prepost' => $prepost?->value,
                'eod' => $eod !== null ? QueryParamsUtils::booleanAsString($eod) : null,
                'rolling_period' => $rollingPeriod !== null ? (string) $rollingPeriod : null,
                'dp' => $dp !== null ? (string) $dp : null,
                'timezone' => $timezone,
            ],
        );

        return Quote::fromJson($response);
    }

    public function latestPrice(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
    ): LatestPrice {
        $response = $this->client->get(
            path: '/price',
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
                'prepost' => $prepost?->value,
                'dp' => $dp !== null ? (string) $dp : null,
            ],
        );

        return LatestPrice::fromJson($response);
    }

    public function endOfDayPrice(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?DateTimeImmutable $date = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
    ): EndOfDayPrice {
        $response = $this->client->get(
            path: '/eod',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type,
                'date' => $date?->format('Y-m-d'),
                'prepost' => $prepost?->value,
                'dp' => $dp !== null ? (string) $dp : null,
            ],
        );

        return EndOfDayPrice::fromJson($response);
    }

    public function marketMovers(
        MarketMoverEnum $market,
        ?DirectionEnum $direction = null,
        ?string $outputsize = null,
        ?string $country = null,
        ?float $priceGreaterThan = null,
        ?int $dp = null,
    ): MarketMovers {
        $response = $this->client->get(
            path: '/market_movers/' . $market->value,
            queryParams: [
                'direction' => $direction?->value,
                'outputsize' => $outputsize,
                'country' => $country,
                'price_greater_than' => $priceGreaterThan !== null ? (string) $priceGreaterThan : null,
                'dp' => $dp !== null ? (string) $dp : null,
            ],
        );

        return MarketMovers::fromJson($response);
    }
}
