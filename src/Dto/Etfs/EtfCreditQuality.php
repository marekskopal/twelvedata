<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfCreditQualityType array{
 *     grade: string,
 *     weight: float,
 * }
 */
readonly class EtfCreditQuality
{
    public function __construct(public string $grade, public float $weight,)
    {
    }

    /** @param EtfCreditQualityType $data */
    public static function fromArray(array $data): self
    {
        return new self(grade: $data['grade'], weight: $data['weight']);
    }
}
