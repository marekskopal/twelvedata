<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type SupertrendHeikinAshiCandlesType array{
 *     datetime: string,
 *     supertrend: string,
 *     heikinhighs: string,
 *     heikinopens: string,
 *     heikincloses: string,
 *     heikinlows: string,
 * }
 * @implements ValueInterface<SupertrendHeikinAshiCandles, SupertrendHeikinAshiCandlesType>
 */
readonly class SupertrendHeikinAshiCandles implements ValueInterface
{
    public function __construct(
        public DateTimeImmutable $datetime,
        public string $supertrend,
        public string $heikinhighs,
        public string $heikinopens,
        public string $heikincloses,
        public string $heikinlows,
    ) {
    }

    /** @param SupertrendHeikinAshiCandlesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            supertrend: $data['supertrend'],
            heikinhighs: $data['heikinhighs'],
            heikinopens: $data['heikinopens'],
            heikincloses: $data['heikincloses'],
            heikinlows: $data['heikinlows'],
        );
    }
}
