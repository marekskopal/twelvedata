<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

readonly class TimeSeries
{
    /** @param list<TimeSeriesValue> $values */
    public function __construct(public TimeSeriesMeta $meta, public array $values, public string $status,)
    {
    }

    /**
     * @param array{
     *     meta: array{
     *         symbol: string,
     *         interval: string,
     *         currency: string,
     *         exchange_timezone: string,
     *         exchange: string,
     *         mic_code: string,
     *         type: string,
     *     },
     *     values: list<array{
     *         datetime: string,
     *         open: string,
     *         high: string,
     *         low: string,
     *         close: string,
     *         volume: string,
     *     }>,
     *     status: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: TimeSeriesMeta::fromArray($data['meta']),
            values: array_map(fn (array $item): TimeSeriesValue => TimeSeriesValue::fromArray($item), $data['values']),
            status: $data['status'],
        );
    }
}
