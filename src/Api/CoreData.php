<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Dto\CurrencyConversion;
use MarekSkopal\TwelveData\Dto\ExchangeRate;
use MarekSkopal\TwelveData\Dto\TimeSeries;
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
}
