<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfCountryAllocationType array{
 *     country: string,
 *     allocation: float,
 * }
 */
readonly class EtfCountryAllocation
{
    public function __construct(public string $country, public float $allocation,)
    {
    }

    /** @param EtfCountryAllocationType $data */
    public static function fromArray(array $data): self
    {
        return new self(country: $data['country'], allocation: $data['allocation']);
    }
}
