<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\TechnicalIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Api\BatchableRequest;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators\HilbertTransformDominantCyclePeriod;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators\HilbertTransformDominantCyclePhase;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators\HilbertTransformPhasorComponents;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators\HilbertTransformSineWave;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators\HilbertTransformTrendVsCycleMode;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
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

readonly class CycleIndicators extends TwelveDataApi
{
    public function hilbertTransformDominantCyclePeriodRequest(
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
            path: '/ht_dcperiod',
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
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(HilbertTransformDominantCyclePeriod::class, $json),
        );
    }

    /** @return TechnicalIndicator<HilbertTransformDominantCyclePeriod> */
    public function hilbertTransformDominantCyclePeriod(
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
        $request = $this->hilbertTransformDominantCyclePeriodRequest(
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

        return TechnicalIndicator::fromJson(
            HilbertTransformDominantCyclePeriod::class,
            $this->client->get($request->path, $request->queryParams),
        );
    }

    public function hilbertTransformDominantCyclePhaseRequest(
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
            path: '/ht_dcphase',
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
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(HilbertTransformDominantCyclePhase::class, $json),
        );
    }

    /** @return TechnicalIndicator<HilbertTransformDominantCyclePhase> */
    public function hilbertTransformDominantCyclePhase(
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
        $request = $this->hilbertTransformDominantCyclePhaseRequest(
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

        return TechnicalIndicator::fromJson(
            HilbertTransformDominantCyclePhase::class,
            $this->client->get($request->path, $request->queryParams),
        );
    }

    public function hilbertTransformPhasorComponentsRequest(
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
            path: '/ht_phasor',
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
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(HilbertTransformPhasorComponents::class, $json),
        );
    }

    /** @return TechnicalIndicator<HilbertTransformPhasorComponents> */
    public function hilbertTransformPhasorComponents(
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
        $request = $this->hilbertTransformPhasorComponentsRequest(
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

        return TechnicalIndicator::fromJson(
            HilbertTransformPhasorComponents::class,
            $this->client->get($request->path, $request->queryParams),
        );
    }

    public function hilbertTransformSineWaveRequest(
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
            path: '/ht_sine',
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
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(HilbertTransformSineWave::class, $json),
        );
    }

    /** @return TechnicalIndicator<HilbertTransformSineWave> */
    public function hilbertTransformSineWave(
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
        $request = $this->hilbertTransformSineWaveRequest(
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

        return TechnicalIndicator::fromJson(HilbertTransformSineWave::class, $this->client->get($request->path, $request->queryParams));
    }

    public function hilbertTransformTrendVsCycleModeRequest(
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
            path: '/ht_trendmode',
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
            responseFactory: fn (string $json) => TechnicalIndicator::fromJson(HilbertTransformTrendVsCycleMode::class, $json),
        );
    }

    /** @return TechnicalIndicator<HilbertTransformTrendVsCycleMode> */
    public function hilbertTransformTrendVsCycleMode(
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
        $request = $this->hilbertTransformTrendVsCycleModeRequest(
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

        return TechnicalIndicator::fromJson(
            HilbertTransformTrendVsCycleMode::class,
            $this->client->get($request->path, $request->queryParams),
        );
    }
}
