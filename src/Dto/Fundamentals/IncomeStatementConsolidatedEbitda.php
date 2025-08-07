<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedEbitdaType array{
 *     ebitda_value: int,
 *     normalized_ebitda_value: int,
 *     ebit_value: int,
 * }
 */
readonly class IncomeStatementConsolidatedEbitda
{
    public function __construct(public int $ebitdaValue, public int $normalizedEbitdaValue, public int $ebitValue,)
    {
    }

    /** @param IncomeStatementConsolidatedEbitdaType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            ebitdaValue: $data['ebitda_value'],
            normalizedEbitdaValue: $data['normalized_ebitda_value'],
            ebitValue: $data['ebit_value'],
        );
    }
}
