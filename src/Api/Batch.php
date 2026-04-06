<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\Batch\BatchCurrencyConversion;
use MarekSkopal\TwelveData\Dto\Batch\BatchEndOfDayPrice;
use MarekSkopal\TwelveData\Dto\Batch\BatchExchangeRate;
use MarekSkopal\TwelveData\Dto\Batch\BatchLatestPrice;
use MarekSkopal\TwelveData\Dto\Batch\BatchQuote;
use MarekSkopal\TwelveData\Dto\Batch\BatchTimeSeries;
use MarekSkopal\TwelveData\Enum\AdjustEnum;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Enum\OrderEnum;
use MarekSkopal\TwelveData\Enum\PrepostEnum;
use MarekSkopal\TwelveData\Enum\TypeEnum;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

readonly class Batch extends TwelveDataApi
{
    /** @param list<string> $symbols */
    public function timeSeries(
        array $symbols,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
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
        ?AdjustEnum $adjust = null,
    ): BatchTimeSeries {
        $response = $this->client->get(
            path: '/time_series',
            queryParams: [
                'symbol' => implode(',', $symbols),
                'interval' => $interval->value,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type?->value,
                'outputsize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'prepost' => $prepost?->value,
                'dp' => $dp,
                'order' => $order?->value,
                'timezone' => $timezone,
                'date' => DateUtils::formatDate($date),
                'start_date' => DateUtils::formatDateTime($startDate),
                'end_date' => DateUtils::formatDateTime($endDate),
                'previous_close' => QueryParamsUtils::booleanAsString($previousClose),
                'adjust' => $adjust?->value,
            ],
        );

        return BatchTimeSeries::fromJson($response);
    }

    /** @param list<string> $symbols */
    public function quote(
        array $symbols,
        ?IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $volumeTimePeriod = null,
        ?TypeEnum $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?bool $eod = null,
        ?int $rollingPeriod = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): BatchQuote {
        $response = $this->client->get(
            path: '/quote',
            queryParams: [
                'symbol' => implode(',', $symbols),
                'interval' => $interval?->value,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'volume_time_period' => $volumeTimePeriod,
                'type' => $type?->value,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'prepost' => $prepost?->value,
                'eod' => QueryParamsUtils::booleanAsString($eod),
                'rolling_period' => $rollingPeriod,
                'dp' => $dp,
                'timezone' => $timezone,
            ],
        );

        return BatchQuote::fromJson($response);
    }

    /** @param list<string> $symbols */
    public function latestPrice(
        array $symbols,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
    ): BatchLatestPrice {
        $response = $this->client->get(
            path: '/price',
            queryParams: [
                'symbol' => implode(',', $symbols),
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type?->value,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'prepost' => $prepost?->value,
                'dp' => $dp,
            ],
        );

        return BatchLatestPrice::fromJson($response);
    }

    /** @param list<string> $symbols */
    public function endOfDayPrice(
        array $symbols,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?DateTimeImmutable $date = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
    ): BatchEndOfDayPrice {
        $response = $this->client->get(
            path: '/eod',
            queryParams: [
                'symbol' => implode(',', $symbols),
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type?->value,
                'date' => DateUtils::formatDate($date),
                'prepost' => $prepost?->value,
                'dp' => $dp,
            ],
        );

        return BatchEndOfDayPrice::fromJson($response);
    }

    /** @param list<string> $symbols */
    public function exchangeRate(
        array $symbols,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): BatchExchangeRate {
        $response = $this->client->get(
            path: '/exchange_rate',
            queryParams: [
                'symbol' => implode(',', $symbols),
                'date' => DateUtils::formatDate($date),
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'dp' => $dp,
                'timezone' => $timezone,
            ],
        );

        return BatchExchangeRate::fromJson($response);
    }

    /** @param list<string> $symbols */
    public function currencyConversion(
        array $symbols,
        float $amount,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): BatchCurrencyConversion {
        $response = $this->client->get(
            path: '/currency_conversion',
            queryParams: [
                'symbol' => implode(',', $symbols),
                'amount' => $amount,
                'date' => DateUtils::formatDate($date),
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'dp' => $dp,
                'timezone' => $timezone,
            ],
        );

        return BatchCurrencyConversion::fromJson($response);
    }
}
