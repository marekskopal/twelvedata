<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\TechnicalIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Api\BatchableRequest;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators\AverageTrueRange;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators\NormalizedAverageTrueRange;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators\Supertrend;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators\SupertrendHeikinAshiCandles;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators\TrueRange;
use MarekSkopal\TwelveData\Enum\AdjustEnum;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Enum\OrderEnum;
use MarekSkopal\TwelveData\Enum\PrepostEnum;
use MarekSkopal\TwelveData\Enum\TypeEnum;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\Guard;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

readonly class VolatilityIndicators extends TwelveDataApi
{
    public function averageTrueRangeRequest(
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
            path: '/atr',
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
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(AverageTrueRange::class, $json),
        );
    }

    /** @return TechnicalIndicator<AverageTrueRange> */
    public function averageTrueRange(
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
        $request = $this->averageTrueRangeRequest(
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

        return TechnicalIndicator::fromJson(AverageTrueRange::class, $this->client->get($request->path, $request->queryParams));
    }

    public function normalizedAverageTrueRangeRequest(
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
            path: '/natr',
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
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(NormalizedAverageTrueRange::class, $json),
        );
    }

    /** @return TechnicalIndicator<NormalizedAverageTrueRange> */
    public function normalizedAverageTrueRange(
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
        $request = $this->normalizedAverageTrueRangeRequest(
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

        return TechnicalIndicator::fromJson(NormalizedAverageTrueRange::class, $this->client->get($request->path, $request->queryParams));
    }

    public function supertrendRequest(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $period = null,
        ?int $multiplier = null,
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
            path: '/supertrend',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'period' => $period,
                'multiplier' => $multiplier,
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
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(Supertrend::class, $json),
        );
    }

    /** @return TechnicalIndicator<Supertrend> */
    public function supertrend(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $period = null,
        ?int $multiplier = null,
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
        $request = $this->supertrendRequest(
            $symbol,
            $interval,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $period,
            $multiplier,
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

        return TechnicalIndicator::fromJson(Supertrend::class, $this->client->get($request->path, $request->queryParams));
    }

    public function supertrendHeikinAshiCandlesRequest(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $period = null,
        ?int $multiplier = null,
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
            path: '/supertrend_heikinashicandles',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'period' => $period,
                'multiplier' => $multiplier,
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
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(SupertrendHeikinAshiCandles::class, $json),
        );
    }

    /** @return TechnicalIndicator<SupertrendHeikinAshiCandles> */
    public function supertrendHeikinAshiCandles(
        ?string $symbol = null,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $period = null,
        ?int $multiplier = null,
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
        $request = $this->supertrendHeikinAshiCandlesRequest(
            $symbol,
            $interval,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $period,
            $multiplier,
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

        return TechnicalIndicator::fromJson(SupertrendHeikinAshiCandles::class, $this->client->get($request->path, $request->queryParams));
    }

    public function trueRangeRequest(
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
            path: '/trange',
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
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(TrueRange::class, $json),
        );
    }

    /** @return TechnicalIndicator<TrueRange> */
    public function trueRange(
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
        $request = $this->trueRangeRequest(
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

        return TechnicalIndicator::fromJson(TrueRange::class, $this->client->get($request->path, $request->queryParams));
    }
}
