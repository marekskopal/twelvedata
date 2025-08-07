<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type BalanceSheetConsolidatedLongTermDebtAndCapitalLeaseObligationType array{
 *     total_long_term_debt_and_capital_lease_obligation: int,
 *     long_term_debt: int,
 *     long_term_capital_lease_obligation?: int,
 * }
 */
readonly class BalanceSheetConsolidatedLongTermDebtAndCapitalLeaseObligation
{
    public function __construct(
        public int $totalLongTermDebtAndCapitalLeaseObligation,
        public int $longTermDebt,
        public ?int $longTermCapitalLeaseObligation,
    ) {
    }

    /** @param BalanceSheetConsolidatedLongTermDebtAndCapitalLeaseObligationType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalLongTermDebtAndCapitalLeaseObligation: $data['total_long_term_debt_and_capital_lease_obligation'],
            longTermDebt: $data['long_term_debt'],
            longTermCapitalLeaseObligation: $data['long_term_capital_lease_obligation'] ?? null,
        );
    }
}
