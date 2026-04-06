<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfSectorType array{
 *     sector: string,
 *     weight: float,
 * }
 */
readonly class EtfSector
{
    public function __construct(public string $sector, public float $weight,)
    {
    }

    /** @param EtfSectorType $data */
    public static function fromArray(array $data): self
    {
        return new self(sector: $data['sector'], weight: $data['weight']);
    }
}
