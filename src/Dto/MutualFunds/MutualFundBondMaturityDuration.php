<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundBondMaturityDurationType array{
 *     fund: float|null,
 *     category: float|null,
 * }
 */
readonly class MutualFundBondMaturityDuration
{
    public function __construct(public ?float $fund, public ?float $category,)
    {
    }

    /** @param MutualFundBondMaturityDurationType $data */
    public static function fromArray(array $data): self
    {
        return new self(fund: $data['fund'] ?? null, category: $data['category'] ?? null);
    }
}
