<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-type PriceTargetPriceTargetType array{
 *     high: float,
 *     median: float,
 *     low: float,
 *     average: float,
 *     current: float,
 *     currency: string,
 * }
 */
readonly class PriceTargetPriceTarget
{
    public function __construct(
        public float $high,
        public float $median,
        public float $low,
        public float $average,
        public float $current,
        public string $currency,
    ) {
    }

    /** @param PriceTargetPriceTargetType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            high: $data['high'],
            median: $data['median'],
            low: $data['low'],
            average: $data['average'],
            current: $data['current'],
            currency: $data['currency'],
        );
    }
}
