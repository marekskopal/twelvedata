<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type BalanceSheetConsolidatedReceivablesType array{
 *     total_receivables: int,
 *     accounts_receivable: int,
 *     gross_accounts_receivable?: int,
 *     allowance_for_doubtful_accounts_receivable?: int,
 *     receivables_adjustments_allowances?: int,
 *     other_receivables: int,
 *     due_from_related_parties_current?: int,
 *     taxes_receivable?: int,
 *     accrued_interest_receivable?: int,
 *     notes_receivable?: int,
 *     loans_receivable?: int,
 * }
 */
readonly class BalanceSheetConsolidatedReceivables
{
    public function __construct(
        public int $totalReceivables,
        public int $accountsReceivable,
        public ?int $grossAccountsReceivable,
        public ?int $allowanceForDoubtfulAccountsReceivable,
        public ?int $receivablesAdjustmentsAllowances,
        public int $otherReceivables,
        public ?int $dueFromRelatedPartiesCurrent,
        public ?int $taxesReceivable,
        public ?int $accruedInterestReceivable,
        public ?int $notesReceivable,
        public ?int $loansReceivable,
    ) {
    }

    /** @param BalanceSheetConsolidatedReceivablesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalReceivables: $data['total_receivables'],
            accountsReceivable: $data['accounts_receivable'],
            grossAccountsReceivable: $data['gross_accounts_receivable'] ?? null,
            allowanceForDoubtfulAccountsReceivable: $data['allowance_for_doubtful_accounts_receivable'] ?? null,
            receivablesAdjustmentsAllowances: $data['receivables_adjustments_allowances'] ?? null,
            otherReceivables: $data['other_receivables'],
            dueFromRelatedPartiesCurrent: $data['due_from_related_parties_current'] ?? null,
            taxesReceivable: $data['taxes_receivable'] ?? null,
            accruedInterestReceivable: $data['accrued_interest_receivable'] ?? null,
            notesReceivable: $data['notes_receivable'] ?? null,
            loansReceivable: $data['loans_receivable'] ?? null,
        );
    }
}
