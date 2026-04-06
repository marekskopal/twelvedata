<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\TechnicalIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Api\BatchableRequest;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators\AccumulationDistribution;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators\AccumulationDistributionOscillator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators\OnBalanceVolume;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators\RelativeVolume;
use MarekSkopal\TwelveData\Enum\AdjustEnum;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Enum\OrderEnum;
use MarekSkopal\TwelveData\Enum\PrepostEnum;
use MarekSkopal\TwelveData\Enum\SeriesTypeEnum;
use MarekSkopal\TwelveData\Enum\TypeEnum;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\Guard;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

readonly class VolumeIndicators extends TwelveDataApi
{
    public function accumulationDistributionRequest(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
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
        ?bool $includeOhlc = null,
        ?string $timezone = null,
        ?DateTimeImmutable $date = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $previousClose = null,
        ?AdjustEnum $adjust = null,
    ): BatchableRequest
    {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/ad',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
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
                'include_ohlc' => QueryParamsUtils::booleanAsString($includeOhlc),
                'timezone' => $timezone,
                'date' => DateUtils::formatDate($date),
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'previous_close' => QueryParamsUtils::booleanAsString($previousClose),
                'adjust' => $adjust?->value,
            ],
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(AccumulationDistribution::class, $json),
        );
    }

    /** @return TechnicalIndicator<AccumulationDistribution> */
    public function accumulationDistribution(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
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
        ?bool $includeOhlc = null,
        ?string $timezone = null,
        ?DateTimeImmutable $date = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $previousClose = null,
        ?AdjustEnum $adjust = null,
    ): TechnicalIndicator
    {
        $request = $this->accumulationDistributionRequest(
            $symbol,
            $interval,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $type,
            $outputSize,
            $format,
            $delimiter,
            $prepost,
            $dp,
            $order,
            $includeOhlc,
            $timezone,
            $date,
            $startDate,
            $endDate,
            $previousClose,
            $adjust,
        );

        return TechnicalIndicator::fromJson(AccumulationDistribution::class, $this->client->get($request->path, $request->queryParams));
    }

    public function accumulationDistributionOscillatorRequest(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $fastPeriod = null,
        ?int $slowPeriod = null,
        ?TypeEnum $type = null,
        ?int $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
        ?OrderEnum $order = null,
        ?bool $includeOhlc = null,
        ?string $timezone = null,
        ?DateTimeImmutable $date = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $previousClose = null,
        ?AdjustEnum $adjust = null,
    ): BatchableRequest
    {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/adosc',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'fast_period' => $fastPeriod,
                'slow_period' => $slowPeriod,
                'type' => $type?->value,
                'outputsize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'prepost' => $prepost?->value,
                'dp' => $dp,
                'order' => $order?->value,
                'include_ohlc' => QueryParamsUtils::booleanAsString($includeOhlc),
                'timezone' => $timezone,
                'date' => DateUtils::formatDate($date),
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'previous_close' => QueryParamsUtils::booleanAsString($previousClose),
                'adjust' => $adjust?->value,
            ],
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(AccumulationDistributionOscillator::class, $json),
        );
    }

    /** @return TechnicalIndicator<AccumulationDistributionOscillator> */
    public function accumulationDistributionOscillator(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $fastPeriod = null,
        ?int $slowPeriod = null,
        ?TypeEnum $type = null,
        ?int $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
        ?OrderEnum $order = null,
        ?bool $includeOhlc = null,
        ?string $timezone = null,
        ?DateTimeImmutable $date = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $previousClose = null,
        ?AdjustEnum $adjust = null,
    ): TechnicalIndicator
    {
        $request = $this->accumulationDistributionOscillatorRequest(
            $symbol,
            $interval,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $fastPeriod,
            $slowPeriod,
            $type,
            $outputSize,
            $format,
            $delimiter,
            $prepost,
            $dp,
            $order,
            $includeOhlc,
            $timezone,
            $date,
            $startDate,
            $endDate,
            $previousClose,
            $adjust,
        );

        return TechnicalIndicator::fromJson(
            AccumulationDistributionOscillator::class,
            $this->client->get($request->path, $request->queryParams),
        );
    }

    public function onBalanceVolumeRequest(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?SeriesTypeEnum $seriesType = null,
        ?TypeEnum $type = null,
        ?int $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
        ?OrderEnum $order = null,
        ?bool $includeOhlc = null,
        ?string $timezone = null,
        ?DateTimeImmutable $date = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $previousClose = null,
        ?AdjustEnum $adjust = null,
    ): BatchableRequest
    {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/obv',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'series_type' => $seriesType?->value,
                'type' => $type?->value,
                'outputsize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'prepost' => $prepost?->value,
                'dp' => $dp,
                'order' => $order?->value,
                'include_ohlc' => QueryParamsUtils::booleanAsString($includeOhlc),
                'timezone' => $timezone,
                'date' => DateUtils::formatDate($date),
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'previous_close' => QueryParamsUtils::booleanAsString($previousClose),
                'adjust' => $adjust?->value,
            ],
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(OnBalanceVolume::class, $json),
        );
    }

    /** @return TechnicalIndicator<OnBalanceVolume> */
    public function onBalanceVolume(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?SeriesTypeEnum $seriesType = null,
        ?TypeEnum $type = null,
        ?int $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
        ?OrderEnum $order = null,
        ?bool $includeOhlc = null,
        ?string $timezone = null,
        ?DateTimeImmutable $date = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $previousClose = null,
        ?AdjustEnum $adjust = null,
    ): TechnicalIndicator
    {
        $request = $this->onBalanceVolumeRequest(
            $symbol,
            $interval,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $seriesType,
            $type,
            $outputSize,
            $format,
            $delimiter,
            $prepost,
            $dp,
            $order,
            $includeOhlc,
            $timezone,
            $date,
            $startDate,
            $endDate,
            $previousClose,
            $adjust,
        );

        return TechnicalIndicator::fromJson(OnBalanceVolume::class, $this->client->get($request->path, $request->queryParams));
    }

    public function relativeVolumeRequest(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $timePeriod = null,
        ?TypeEnum $type = null,
        ?int $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
        ?OrderEnum $order = null,
        ?bool $includeOhlc = null,
        ?string $timezone = null,
        ?DateTimeImmutable $date = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $previousClose = null,
        ?AdjustEnum $adjust = null,
    ): BatchableRequest
    {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/rvol',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'time_period' => $timePeriod,
                'type' => $type?->value,
                'outputsize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'prepost' => $prepost?->value,
                'dp' => $dp,
                'order' => $order?->value,
                'include_ohlc' => QueryParamsUtils::booleanAsString($includeOhlc),
                'timezone' => $timezone,
                'date' => DateUtils::formatDate($date),
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'previous_close' => QueryParamsUtils::booleanAsString($previousClose),
                'adjust' => $adjust?->value,
            ],
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(RelativeVolume::class, $json),
        );
    }

    /** @return TechnicalIndicator<RelativeVolume> */
    public function relativeVolume(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $timePeriod = null,
        ?TypeEnum $type = null,
        ?int $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
        ?OrderEnum $order = null,
        ?bool $includeOhlc = null,
        ?string $timezone = null,
        ?DateTimeImmutable $date = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $previousClose = null,
        ?AdjustEnum $adjust = null,
    ): TechnicalIndicator
    {
        $request = $this->relativeVolumeRequest(
            $symbol,
            $interval,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $timePeriod,
            $type,
            $outputSize,
            $format,
            $delimiter,
            $prepost,
            $dp,
            $order,
            $includeOhlc,
            $timezone,
            $date,
            $startDate,
            $endDate,
            $previousClose,
            $adjust,
        );

        return TechnicalIndicator::fromJson(RelativeVolume::class, $this->client->get($request->path, $request->queryParams));
    }
}
