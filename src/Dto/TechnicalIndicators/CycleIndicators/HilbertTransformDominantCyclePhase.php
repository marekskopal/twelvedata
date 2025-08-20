<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type HilbertTransformDominantCyclePhaseType array{
 *     datetime: string,
 *     ht_dcphase: string,
 * }
 * @implements ValueInterface<HilbertTransformDominantCyclePhase, HilbertTransformDominantCyclePhaseType>
 */
readonly class HilbertTransformDominantCyclePhase implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $htDcphase)
    {
    }

    /** @param HilbertTransformDominantCyclePhaseType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            htDcphase: $data['ht_dcphase'],
        );
    }
}
