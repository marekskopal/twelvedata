<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundCreditQualityType array{
 *     grade: string,
 *     weight: float,
 * }
 */
readonly class MutualFundCreditQuality
{
    public function __construct(public string $grade, public float $weight,)
    {
    }

    /** @param MutualFundCreditQualityType $data */
    public static function fromArray(array $data): self
    {
        return new self(grade: $data['grade'], weight: $data['weight']);
    }
}
