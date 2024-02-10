<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Dto\CoreData\CurrencyConversion;
use MarekSkopal\TwelveData\Dto\CoreData\EndOfDayPrice;
use MarekSkopal\TwelveData\Dto\CoreData\ExchangeRate;
use MarekSkopal\TwelveData\Dto\CoreData\Quote;
use MarekSkopal\TwelveData\Dto\CoreData\RealTImePrice;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeries;
use MarekSkopal\TwelveData\Enum\AdjustEnum;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Enum\OrderEnum;
use MarekSkopal\TwelveData\Enum\PrepostEnum;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

class CoreData extends TwelveDataApi
{
    public function __construct(private readonly Client $client)
    {
    }

    /** @param list<AdjustEnum>|null $adjust */
    public function timeSeries(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?string $outputSize = null,
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
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type,
                'outputSize' => $outputSize,
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

        return TimeSeries::fromJson($this->getResponseContents($response));
    }

    public function exchangeRate(
        string $symbol,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): ExchangeRate {
        $response = $this->client->get(
            path: '/exchange_rate',
            queryParams: [
                'symbol' => $symbol,
                'date' => $date?->format('Y-m-d'),
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'dp' => $dp !== null ? (string) $dp : null,
                'timezone' => $timezone,
            ],
        );

        return ExchangeRate::fromJson($this->getResponseContents($response));
    }

    public function currencyConversion(
        string $symbol,
        float $amount,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): CurrencyConversion {
        $response = $this->client->get(
            path: '/currency_conversion',
            queryParams: [
                'symbol' => $symbol,
                'amount' => (string) $amount,
                'date' => $date?->format('Y-m-d'),
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'dp' => $dp !== null ? (string) $dp : null,
                'timezone' => $timezone,
            ],
        );

        return CurrencyConversion::fromJson($this->getResponseContents($response));
    }

    public function quote(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
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
                'interval' => $interval->value,
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

        return Quote::fromJson($this->getResponseContents($response));
    }

    public function realTimePrice(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
    ): RealTImePrice {
        $response = $this->client->get(
            path: '/price',
            queryParams: [
                'symbol' => $symbol,
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

        return RealTImePrice::fromJson($this->getResponseContents($response));
    }

    public function endOfDayPrice(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
    ): EndOfDayPrice {
        $response = $this->client->get(
            path: '/eod',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type,
                'prepost' => $prepost?->value,
                'dp' => $dp !== null ? (string) $dp : null,
            ],
        );

        return EndOfDayPrice::fromJson($this->getResponseContents($response));
    }
}
