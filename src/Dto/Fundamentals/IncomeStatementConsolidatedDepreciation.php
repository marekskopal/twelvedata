<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedDepreciationType array{
 *     reconciled_depreciation: int,
 * }
 */
readonly class IncomeStatementConsolidatedDepreciation
{
    public function __construct(public int $reconciledDepreciation,)
    {
    }

    /** @param IncomeStatementConsolidatedDepreciationType $data */
    public static function fromArray(array $data): self
    {
        return new self(reconciledDepreciation: $data['reconciled_depreciation']);
    }
}
