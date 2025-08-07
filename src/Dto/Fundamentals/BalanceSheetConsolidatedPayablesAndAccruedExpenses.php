<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type BalanceSheetConsolidatedPayablesAndAccruedExpensesType array{
 *     total_payables_and_accrued_expenses: int,
 *     accounts_payable?: int,
 *     current_accrued_expenses?: int,
 *     interest_payable?: int,
 *     payables?: int,
 *     other_payable?: int,
 *     due_to_related_parties_current?: int,
 *     dividends_payable?: int,
 *     total_tax_payable?: int,
 *     income_tax_payable?: int,
 * }
 */
readonly class BalanceSheetConsolidatedPayablesAndAccruedExpenses
{
    public function __construct(
        public int $totalPayablesAndAccruedExpenses,
        public ?int $accountsPayable,
        public ?int $currentAccruedExpenses,
        public ?int $interestPayable,
        public ?int $payables,
        public ?int $otherPayable,
        public ?int $dueToRelatedPartiesCurrent,
        public ?int $dividendsPayable,
        public ?int $totalTaxPayable,
        public ?int $incomeTaxPayable,
    ) {
    }

    /** @param BalanceSheetConsolidatedPayablesAndAccruedExpensesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalPayablesAndAccruedExpenses: $data['total_payables_and_accrued_expenses'],
            accountsPayable: $data['accounts_payable'] ?? null,
            currentAccruedExpenses: $data['current_accrued_expenses'] ?? null,
            interestPayable: $data['interest_payable'] ?? null,
            payables: $data['payables'] ?? null,
            otherPayable: $data['other_payable'] ?? null,
            dueToRelatedPartiesCurrent: $data['due_to_related_parties_current'] ?? null,
            dividendsPayable: $data['dividends_payable'] ?? null,
            totalTaxPayable: $data['total_tax_payable'] ?? null,
            incomeTaxPayable: $data['income_tax_payable'] ?? null,
        );
    }
}
