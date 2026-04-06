<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundSectorType array{
 *     sector: string,
 *     weight: float,
 * }
 */
readonly class MutualFundSector
{
    public function __construct(public string $sector, public float $weight,)
    {
    }

    /** @param MutualFundSectorType $data */
    public static function fromArray(array $data): self
    {
        return new self(sector: $data['sector'], weight: $data['weight']);
    }
}
