<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MovingAverageConvergenceDivergenceType array{
 *     datetime: string,
 *     macd: string,
 *     macd_signal: string,
 *     macd_hist: string,
 * }
 * @implements ValueInterface<MovingAverageConvergenceDivergence, MovingAverageConvergenceDivergenceType>
 */
readonly class MovingAverageConvergenceDivergence implements ValueInterface
{
    public function __construct(
        public DateTimeImmutable $datetime,
        public string $macd,
        public string $macdSignal,
        public string $macdHist,
    )
    {
    }

    /** @param MovingAverageConvergenceDivergenceType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            macd: $data['macd'],
            macdSignal: $data['macd_signal'],
            macdHist: $data['macd_hist'],
        );
    }
}
