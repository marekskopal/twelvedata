<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedPretaxIncomeType array{
 *     pretax_income_value: int,
 * }
 */
readonly class IncomeStatementConsolidatedPretaxIncome
{
    public function __construct(public int $pretaxIncomeValue,)
    {
    }

    /** @param IncomeStatementConsolidatedPretaxIncomeType $data */
    public static function fromArray(array $data): self
    {
        return new self(pretaxIncomeValue: $data['pretax_income_value']);
    }
}
