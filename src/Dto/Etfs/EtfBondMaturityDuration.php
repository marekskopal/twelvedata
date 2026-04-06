<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfBondMaturityDurationType array{
 *     fund: float|null,
 *     category: float|null,
 * }
 */
readonly class EtfBondMaturityDuration
{
    public function __construct(public ?float $fund, public ?float $category,)
    {
    }

    /** @param EtfBondMaturityDurationType $data */
    public static function fromArray(array $data): self
    {
        return new self(fund: $data['fund'] ?? null, category: $data['category'] ?? null);
    }
}
