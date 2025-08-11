<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators;

/**
 * @phpstan-type MetaIndicatorType array{
 *     name: string,
 *     series_type?: string,
 *     time_period?: int,
 *     sd?: int,
 *     sd_time_period?: int,
 *     ma_type?: string,
 *     conversion_line_period?: int,
 *     base_line_period?: int,
 *     leading_span_b_period?: int,
 *     lagging_span_period?: int,
 *     include_ahead_span_period?: bool,
 *     fast_limit?: float,
 *     slow_limit?: float,
 *     acceleration?: float,
 *     maximum?: float,
 *     start_value?: float,
 *     offset_on_reverse?: float,
 *     acceleration_limit_long?: float,
 *     acceleration_long?: float,
 *     acceleration_max_long?: float,
 *     acceleration_limit_short?: float,
 *     acceleration_short?: float,
 *     acceleration_max_short?: float,
 * }
 */
readonly class MetaIndicator
{
    public function __construct(
        public string $name,
        public ?string $seriesType,
        public ?int $timePeriod,
        public ?int $sd,
        public ?int $sdTimePeriod,
        public ?string $maType,
        public ?int $conversionLinePeriod,
        public ?int $base_line_period,
        public ?int $leading_span_b_period,
        public ?int $laggingSpanPeriod,
        public ?bool $includeAheadSpanPeriod,
        public ?float $fastLimit,
        public ?float $slowLimit,
        public ?float $acceleration,
        public ?float $maximum,
        public ?float $startValue,
        public ?float $offsetOnReverse,
        public ?float $accelerationLimitLong,
        public ?float $accelerationLong,
        public ?float $accelerationMaxLong,
        public ?float $accelerationLimitShort,
        public ?float $accelerationShort,
        public ?float $accelerationMaxShort,
    ) {
    }

    /** @param MetaIndicatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            seriesType: $data['series_type'] ?? null,
            timePeriod: $data['time_period'] ?? null,
            sd: $data['sd'] ?? null,
            sdTimePeriod: $data['sd_time_period'] ?? null,
            maType: $data['ma_type'] ?? null,
            conversionLinePeriod: $data['conversion_line_period'] ?? null,
            base_line_period: $data['base_line_period'] ?? null,
            leading_span_b_period: $data['leading_span_b_period'] ?? null,
            laggingSpanPeriod: $data['lagging_span_period'] ?? null,
            includeAheadSpanPeriod: $data['include_ahead_span_period'] ?? null,
            fastLimit: $data['fast_limit'] ?? null,
            slowLimit: $data['slow_limit'] ?? null,
            acceleration: $data['acceleration'] ?? null,
            maximum: $data['maximum'] ?? null,
            startValue: $data['start_value'] ?? null,
            offsetOnReverse: $data['offset_on_reverse'] ?? null,
            accelerationLimitLong: $data['acceleration_limit_long'] ?? null,
            accelerationLong: $data['acceleration_long'] ?? null,
            accelerationMaxLong: $data['acceleration_max_long'] ?? null,
            accelerationLimitShort: $data['acceleration_limit_short'] ?? null,
            accelerationShort: $data['acceleration_short'] ?? null,
            accelerationMaxShort: $data['acceleration_max_short'] ?? null,
        );
    }
}
