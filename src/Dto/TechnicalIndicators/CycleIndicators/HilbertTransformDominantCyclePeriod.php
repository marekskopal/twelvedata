<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type HilbertTransformDominantCyclePeriodType array{
 *     datetime: string,
 *     ht_dcperiod: string,
 * }
 * @implements ValueInterface<HilbertTransformDominantCyclePeriod, HilbertTransformDominantCyclePeriodType>
 */
readonly class HilbertTransformDominantCyclePeriod implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $htDcperiod)
    {
    }

    /** @param HilbertTransformDominantCyclePeriodType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            htDcperiod: $data['ht_dcperiod'],
        );
    }
}
