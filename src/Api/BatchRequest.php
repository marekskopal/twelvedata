<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Client\ClientInterface;
use MarekSkopal\TwelveData\Dto\Batch\BatchMultiResponse;
use MarekSkopal\TwelveData\Enum\AdjustEnum;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Enum\OrderEnum;
use MarekSkopal\TwelveData\Enum\PrepostEnum;
use MarekSkopal\TwelveData\Enum\TypeEnum;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use const JSON_THROW_ON_ERROR;

class BatchRequest
{
    /** @var array<string, string> */
    private array $requests = [];

    public function __construct(private readonly ClientInterface $client)
    {
    }

    /** @param array<string, scalar|null> $queryParams */
    public function add(string $name, string $path, array $queryParams = []): self
    {
        $filteredParams = array_filter($queryParams, static fn (mixed $value): bool => $value !== null);

        $url = '/' . ltrim($path, '/');
        if (count($filteredParams) > 0) {
            $url .= '?' . http_build_query($filteredParams);
        }

        $this->requests[$name] = $url;

        return $this;
    }

    public function addTimeSeries(
        string $name,
        string $symbol,
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
    ): self {
        return $this->add($name, '/time_series', [
            'symbol' => $symbol,
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
        ]);
    }

    public function addQuote(
        string $name,
        string $symbol,
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
    ): self {
        return $this->add($name, '/quote', [
            'symbol' => $symbol,
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
        ]);
    }

    public function addLatestPrice(
        string $name,
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
    ): self {
        return $this->add($name, '/price', [
            'symbol' => $symbol,
            'exchange' => $exchange,
            'mic_code' => $micCode,
            'country' => $country,
            'type' => $type?->value,
            'format' => $format?->value,
            'delimiter' => $delimiter,
            'prepost' => $prepost?->value,
            'dp' => $dp,
        ]);
    }

    public function addEndOfDayPrice(
        string $name,
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?DateTimeImmutable $date = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
    ): self {
        return $this->add($name, '/eod', [
            'symbol' => $symbol,
            'exchange' => $exchange,
            'mic_code' => $micCode,
            'country' => $country,
            'type' => $type?->value,
            'date' => DateUtils::formatDate($date),
            'prepost' => $prepost?->value,
            'dp' => $dp,
        ]);
    }

    public function addExchangeRate(
        string $name,
        string $symbol,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): self {
        return $this->add($name, '/exchange_rate', [
            'symbol' => $symbol,
            'date' => DateUtils::formatDate($date),
            'format' => $format?->value,
            'delimiter' => $delimiter,
            'dp' => $dp,
            'timezone' => $timezone,
        ]);
    }

    public function addCurrencyConversion(
        string $name,
        string $symbol,
        float $amount,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): self {
        return $this->add($name, '/currency_conversion', [
            'symbol' => $symbol,
            'amount' => $amount,
            'date' => DateUtils::formatDate($date),
            'format' => $format?->value,
            'delimiter' => $delimiter,
            'dp' => $dp,
            'timezone' => $timezone,
        ]);
    }

    public function execute(): BatchMultiResponse
    {
        $response = $this->client->post(
            path: '/',
            body: json_encode($this->requests, JSON_THROW_ON_ERROR),
        );

        return BatchMultiResponse::fromJson($response);
    }
}
