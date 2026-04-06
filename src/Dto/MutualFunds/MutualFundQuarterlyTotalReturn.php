<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundQuarterlyTotalReturnType array{
 *     year: int,
 *     q1: float|null,
 *     q2: float|null,
 *     q3: float|null,
 *     q4: float|null,
 * }
 */
readonly class MutualFundQuarterlyTotalReturn
{
    public function __construct(public int $year, public ?float $q1, public ?float $q2, public ?float $q3, public ?float $q4,)
    {
    }

    /** @param MutualFundQuarterlyTotalReturnType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            year: $data['year'],
            q1: $data['q1'] ?? null,
            q2: $data['q2'] ?? null,
            q3: $data['q3'] ?? null,
            q4: $data['q4'] ?? null,
        );
    }
}
