<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\CoreData;

readonly class QuoteFiftyTwoWeek
{
    public function __construct(
        public string $low,
        public string $high,
        public string $lowChange,
        public string $highChange,
        public string $lowChangePercent,
        public string $highChangePercent,
        public string $range,
    ) {
    }

    /**
     * @param array{
     *     low: string,
     *     high: string,
     *     low_change: string,
     *     high_change: string,
     *     low_change_percent: string,
     *     high_change_percent: string,
     *     range: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            low: $data['low'],
            high: $data['high'],
            lowChange: $data['low_change'],
            highChange: $data['high_change'],
            lowChangePercent: $data['low_change_percent'],
            highChangePercent: $data['high_change_percent'],
            range: $data['range'],
        );
    }
}
