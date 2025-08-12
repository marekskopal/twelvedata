<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\TechnicalIndictors;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\AbsolutePriceOscillator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\AroonIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\AroonOscillator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\AverageDirectionalIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\AverageDirectionalMovementIndexRating;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\BalanceOfPower;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\ChandeMomentumOscillator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\CommodityChannelIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\ConnorsRelativeStrengthIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\CoppockCurve;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\DetrendedPriceOscillator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\DirectionalMovementIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\KnowSureThing;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\MovingAverageConvergenceDivergence;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\MovingAverageConvergenceDivergenceSlope;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Enum\AdjustEnum;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Enum\MaTypeEnum;
use MarekSkopal\TwelveData\Enum\OrderEnum;
use MarekSkopal\TwelveData\Enum\PrepostEnum;
use MarekSkopal\TwelveData\Enum\SeriesTypeEnum;
use MarekSkopal\TwelveData\Enum\TypeEnum;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

readonly class MomentumIndicators extends TwelveDataApi
{
    /** @return TechnicalIndicator<AverageDirectionalIndex> */
    public function averageDirectionalIndex(
        string $symbol,
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
        $response = $this->client->get(
            path: '/adx',
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
        );

        /** @var TechnicalIndicator<AverageDirectionalIndex> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(AverageDirectionalIndex::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<AverageDirectionalMovementIndexRating> */
    public function averageDirectionalMovementIndexRating(
        string $symbol,
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
        $response = $this->client->get(
            path: '/adxr',
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
        );

        /** @var TechnicalIndicator<AverageDirectionalMovementIndexRating> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(AverageDirectionalMovementIndexRating::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<AbsolutePriceOscillator> */
    public function absolutePriceOscillator(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $fastPeriod = null,
        ?MaTypeEnum $maType = null,
        ?SeriesTypeEnum $seriesType = null,
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
        $response = $this->client->get(
            path: '/apo',
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
                'ma_type' => $maType?->value,
                'series_type' => $seriesType?->value,
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
        );

        /** @var TechnicalIndicator<AbsolutePriceOscillator> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(AbsolutePriceOscillator::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<AroonIndicator> */
    public function aroonIndicator(
        string $symbol,
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
        $response = $this->client->get(
            path: '/aroon',
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
        );

        /** @var TechnicalIndicator<AroonIndicator> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(AroonIndicator::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<AroonOscillator> */
    public function aroonOscillator(
        string $symbol,
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
        $response = $this->client->get(
            path: '/aroonosc',
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
        );

        /** @var TechnicalIndicator<AroonOscillator> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(AroonOscillator::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<BalanceOfPower> */
    public function balanceOfPower(
        string $symbol,
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
        $response = $this->client->get(
            path: '/bop',
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
        );

        /** @var TechnicalIndicator<BalanceOfPower> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(BalanceOfPower::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<CommodityChannelIndex> */
    public function commodityChannelIndex(
        string $symbol,
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
        $response = $this->client->get(
            path: '/cci',
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
        );

        /** @var TechnicalIndicator<CommodityChannelIndex> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(CommodityChannelIndex::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<ChandeMomentumOscillator> */
    public function chandeMomentumOscillator(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?SeriesTypeEnum $seriesType = null,
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
        $response = $this->client->get(
            path: '/cmo',
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
        );

        /** @var TechnicalIndicator<ChandeMomentumOscillator> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(ChandeMomentumOscillator::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<CoppockCurve> */
    public function coppockCurve(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $longRocPeriod = null,
        ?SeriesTypeEnum $seriesType = null,
        ?int $shortRocPeriod = null,
        ?int $wmaPeriod = null,
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
        $response = $this->client->get(
            path: '/coppock',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'long_roc_period' => $longRocPeriod,
                'series_type' => $seriesType?->value,
                'short_roc_period' => $shortRocPeriod,
                'wma_period' => $wmaPeriod,
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
        );

        /** @var TechnicalIndicator<CoppockCurve> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(CoppockCurve::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<ConnorsRelativeStrengthIndex> */
    public function connorsRelativeStrengthIndex(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $percentRankPeriod = null,
        ?int $rsiPeriod = null,
        ?SeriesTypeEnum $seriesType = null,
        ?int $upDownLength = null,
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
        $response = $this->client->get(
            path: '/crsi',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'percent_rank_period' => $percentRankPeriod,
                'rsi_period' => $rsiPeriod,
                'series_type' => $seriesType?->value,
                'up_down_length' => $upDownLength,
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
        );

        /** @var TechnicalIndicator<ConnorsRelativeStrengthIndex> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(ConnorsRelativeStrengthIndex::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<DetrendedPriceOscillator> */
    public function detrendedPriceOscillator(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?SeriesTypeEnum $seriesType = null,
        ?int $timePeriod = null,
        ?bool $centered = null,
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
        $response = $this->client->get(
            path: '/dpo',
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
                'time_period' => $timePeriod,
                'centered' => QueryParamsUtils::booleanAsString($centered),
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
        );

        /** @var TechnicalIndicator<DetrendedPriceOscillator> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(DetrendedPriceOscillator::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<DirectionalMovementIndex> */
    public function directionalMovementIndex(
        string $symbol,
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
        $response = $this->client->get(
            path: '/dx',
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
        );

        /** @var TechnicalIndicator<DirectionalMovementIndex> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(DirectionalMovementIndex::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<KnowSureThing> */
    public function knowSureThing(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $rocPeriod1 = null,
        ?int $rocPeriod2 = null,
        ?int $rocPeriod3 = null,
        ?int $rocPeriod4 = null,
        ?int $smaPeriod1 = null,
        ?int $smaPeriod2 = null,
        ?int $smaPeriod3 = null,
        ?int $smaPeriod4 = null,
        ?int $signalPeriod = null,
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
        $response = $this->client->get(
            path: '/kst',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'roc_period_1' => $rocPeriod1,
                'roc_period_2' => $rocPeriod2,
                'roc_period_3' => $rocPeriod3,
                'roc_period_4' => $rocPeriod4,
                'sma_period_1' => $smaPeriod1,
                'sma_period_2' => $smaPeriod2,
                'sma_period_3' => $smaPeriod3,
                'sma_period_4' => $smaPeriod4,
                'signal_period' => $signalPeriod,
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
        );

        /** @var TechnicalIndicator<KnowSureThing> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(KnowSureThing::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<MovingAverageConvergenceDivergence> */
    public function movingAverageConvergenceDivergence(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $fastPeriod = null,
        ?int $slowPeriod = null,
        ?int $signalPeriod = null,
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
        $response = $this->client->get(
            path: '/macd',
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
                'signal_period' => $signalPeriod,
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
        );

        /** @var TechnicalIndicator<MovingAverageConvergenceDivergence> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(MovingAverageConvergenceDivergence::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<MovingAverageConvergenceDivergenceSlope> */
    public function movingAverageConvergenceDivergenceSlope(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $fastPeriod = null,
        ?int $slowPeriod = null,
        ?int $signalPeriod = null,
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
        $response = $this->client->get(
            path: '/macd_slope',
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
                'signal_period' => $signalPeriod,
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
        );

        /** @var TechnicalIndicator<MovingAverageConvergenceDivergenceSlope> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(MovingAverageConvergenceDivergenceSlope::class, $response);
        return $technicalIndicator;
    }

    /** @return TechnicalIndicator<MovingAverageConvergenceDivergence> */
    public function movingAverageConvergenceDivergenceExtension(
        string $symbol,
        IntervalEnum $interval = IntervalEnum::OneDay,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $fastPeriod = null,
        ?MaTypeEnum $fastMaType = null,
        ?int $slowPeriod = null,
        ?MaTypeEnum $slowMaType = null,
        ?int $signalPeriod = null,
        ?MaTypeEnum $signalMaType = null,
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
        $response = $this->client->get(
            path: '/macdext',
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
                'fast_ma_type' => $fastMaType?->value,
                'slow_period' => $slowPeriod,
                'slow_ma_type' => $slowMaType?->value,
                'signal_period' => $signalPeriod,
                'signal_ma_type' => $signalMaType?->value,
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
        );

        /** @var TechnicalIndicator<MovingAverageConvergenceDivergence> $technicalIndicator */
        $technicalIndicator = TechnicalIndicator::fromJson(MovingAverageConvergenceDivergence::class, $response);
        return $technicalIndicator;
    }
}
