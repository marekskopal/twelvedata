<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MovingAverageConvergenceDivergenceSlopeType array{
 *     datetime: string,
 *     macd_slope: string,
 *     macd_signal_slope: string,
 *     macd_hist_slope: string,
 * }
 * @implements ValueInterface<MovingAverageConvergenceDivergenceSlope, MovingAverageConvergenceDivergenceSlopeType>
 */
readonly class MovingAverageConvergenceDivergenceSlope implements ValueInterface
{
    public function __construct(
        public DateTimeImmutable $datetime,
        public string $macdSlope,
        public string $macdSignalSlope,
        public string $macdHistSlope,
    ) {
    }

    /** @param MovingAverageConvergenceDivergenceSlopeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            macdSlope: $data['macd_slope'],
            macdSignalSlope: $data['macd_signal_slope'],
            macdHistSlope: $data['macd_hist_slope'],
        );
    }
}
