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
use MarekSkopal\TwelveData\Enum\TypeEnum;
use MarekSkopal\TwelveData\Exception\InvalidArgumentException;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

readonly class CoreData extends TwelveDataApi
{
    public function timeSeries(
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
        ?string $timezone = null,
        ?DateTimeImmutable $date = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $previousClose = null,
        ?AdjustEnum $adjust = null,
    ): TimeSeries {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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

        return TimeSeries::fromJson($response);
    }

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
        ?bool $adjust = null,
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
                'start_date' => DateUtils::formatDateTime($startDate),
                'end_date' => DateUtils::formatDateTime($endDate),
                'adjust' => QueryParamsUtils::booleanAsString($adjust),
                'dp' => $dp,
                'timezone' => $timezone,
            ],
        );

        return TimeSeriesCross::fromJson($response);
    }

    public function quote(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
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
    ): Quote {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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

        return Quote::fromJson($response);
    }

    public function latestPrice(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
    ): LatestPrice {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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
                'type' => $type?->value,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'prepost' => $prepost?->value,
                'dp' => $dp,
            ],
        );

        return LatestPrice::fromJson($response);
    }

    public function endOfDayPrice(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?DateTimeImmutable $date = null,
        ?PrepostEnum $prepost = null,
        ?int $dp = null,
    ): EndOfDayPrice {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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
                'type' => $type?->value,
                'date' => DateUtils::formatDate($date),
                'prepost' => $prepost?->value,
                'dp' => $dp,
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
                'price_greater_than' => $priceGreaterThan,
                'dp' => $dp,
            ],
        );

        return MarketMovers::fromJson($response);
    }
}
