<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedOperatingIncomeType array{
 *     operating_income_value: int,
 *     total_operating_income_as_reported: int,
 *     operating_expense: int,
 *     other_operating_expenses?: int,
 *     total_expenses: int,
 * }
 */
readonly class IncomeStatementConsolidatedOperatingIncome
{
    public function __construct(
        public int $operatingIncomeValue,
        public int $totalOperatingIncomeAsReported,
        public int $operatingExpense,
        public ?int $otherOperatingExpenses,
        public int $totalExpenses,
    ) {
    }

    /** @param IncomeStatementConsolidatedOperatingIncomeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            operatingIncomeValue: $data['operating_income_value'],
            totalOperatingIncomeAsReported: $data['total_operating_income_as_reported'],
            operatingExpense: $data['operating_expense'],
            otherOperatingExpenses: $data['other_operating_expenses'] ?? null,
            totalExpenses: $data['total_expenses'],
        );
    }
}
