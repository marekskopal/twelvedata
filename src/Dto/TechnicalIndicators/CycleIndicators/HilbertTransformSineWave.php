<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type HilbertTransformSineWaveType array{
 *     datetime: string,
 *     ht_sine: string,
 *     ht_leadsine: string,
 * }
 * @implements ValueInterface<HilbertTransformSineWave, HilbertTransformSineWaveType>
 */
readonly class HilbertTransformSineWave implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $htSine, public string $htLeadsine)
    {
    }

    /** @param HilbertTransformSineWaveType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            htSine: $data['ht_sine'],
            htLeadsine: $data['ht_leadsine'],
        );
    }
}
