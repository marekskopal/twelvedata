<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators;

/**
 * @phpstan-type MetaIndicatorType array{
 *     name: string,
 *     series_type: string,
 *     time_period: int,
 *     sd?: int,
 *     ma_type?: string,
 * }
 */
readonly class MetaIndicator
{
    public function __construct(
        public string $name,
        public string $seriesType,
        public int $timePeriod,
        public ?int $sd,
        public ?string $maType,
    ) {
    }

    /** @param MetaIndicatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            seriesType: $data['series_type'],
            timePeriod: $data['time_period'],
            sd: $data['sd'] ?? null,
            maType: $data['ma_type'] ?? null,
        );
    }
}
