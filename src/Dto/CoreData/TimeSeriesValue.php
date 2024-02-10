<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

use DateTimeImmutable;

readonly class TimeSeriesValue
{
    public function __construct(
        public DateTimeImmutable $datetime,
        public string $open,
        public string $high,
        public string $low,
        public string $close,
        public string $volume,
    ) {
    }

    /**
     * @param array{
     *     datetime: string,
     *     open: string,
     *     high: string,
     *     low: string,
     *     close: string,
     *     volume: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            open: $data['open'],
            high: $data['high'],
            low: $data['low'],
            close: $data['close'],
            volume: $data['volume'],
        );
    }
}
