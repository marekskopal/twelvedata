<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type HilbertTransformTrendVsCycleModeType array{
 *     datetime: string,
 *     ht_trendmode: string,
 * }
 * @implements ValueInterface<HilbertTransformTrendVsCycleMode, HilbertTransformTrendVsCycleModeType>
 */
readonly class HilbertTransformTrendVsCycleMode implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $htTrendmode)
    {
    }

    /** @param HilbertTransformTrendVsCycleModeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            htTrendmode: $data['ht_trendmode'],
        );
    }
}
