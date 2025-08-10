<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators;

/**
 * @phpstan-type MetaIndicatorType array{
 *     name: string,
 *     series_type?: string,
 *     time_period?: int,
 *     sd?: int,
 *     ma_type?: string,
 *     conversion_line_period?: int,
 *     base_line_period?: int,
 *     leading_span_b_period?: int,
 *     lagging_span_period?: int,
 *     include_ahead_span_period?: bool,
 * }
 */
readonly class MetaIndicator
{
    public function __construct(
        public string $name,
        public ?string $seriesType,
        public ?int $timePeriod,
        public ?int $sd,
        public ?string $maType,
        public ?int $conversionLinePeriod,
        public ?int $base_line_period,
        public ?int $leading_span_b_period,
        public ?int $laggingSpanPeriod,
        public ?bool $includeAheadSpanPeriod,
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
            maType: $data['ma_type'] ?? null,
            conversionLinePeriod: $data['conversion_line_period'] ?? null,
            base_line_period: $data['base_line_period'] ?? null,
            leading_span_b_period: $data['leading_span_b_period'] ?? null,
            laggingSpanPeriod: $data['lagging_span_period'] ?? null,
            includeAheadSpanPeriod: $data['include_ahead_span_period'] ?? null,
        );
    }
}
