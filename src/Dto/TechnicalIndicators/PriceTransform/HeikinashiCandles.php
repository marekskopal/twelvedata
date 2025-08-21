<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type HeikinashiCandlesType array{
 *     datetime: string,
 *     heikinhighs: string,
 *     heikinopens: string,
 *     heikincloses: string,
 *     heikinlows: string,
 * }
 * @implements ValueInterface<HeikinashiCandles, HeikinashiCandlesType>
 */
readonly class HeikinashiCandles implements ValueInterface
{
    public function __construct(
        public DateTimeImmutable $datetime,
        public string $heikinhighs,
        public string $heikinopens,
        public string $heikincloses,
        public string $heikinlows,
    ) {
    }

    /** @param HeikinashiCandlesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            heikinhighs: $data['heikinhighs'],
            heikinopens: $data['heikinopens'],
            heikincloses: $data['heikincloses'],
            heikinlows: $data['heikinlows'],
        );
    }
}
