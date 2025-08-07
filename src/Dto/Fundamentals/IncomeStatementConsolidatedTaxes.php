<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedTaxesType array{
 *     tax_provision: int,
 *     tax_effect_of_unusual_items: int,
 *     tax_rate_for_calculations: float,
 *     other_taxes?: int,
 * }
 */
readonly class IncomeStatementConsolidatedTaxes
{
    public function __construct(
        public int $taxProvision,
        public int $taxEffectOfUnusualItems,
        public float $taxRateForCalculations,
        public ?int $otherTaxes,
    ) {
    }

    /** @param IncomeStatementConsolidatedTaxesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            taxProvision: $data['tax_provision'],
            taxEffectOfUnusualItems: $data['tax_effect_of_unusual_items'],
            taxRateForCalculations: $data['tax_rate_for_calculations'],
            otherTaxes: $data['other_taxes'] ?? null,
        );
    }
}
