<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

class BalanceSheetCurrentLiabilities
{
    public function __construct(
        public ?int $accountsPayable,
        public ?int $accruedExpenses,
        public ?int $shortTermDebt,
        public ?int $deferredRevenue,
        public ?int $taxPayable,
        public ?int $pensions,
        public ?int $otherCurrentLiabilities,
        public ?int $totalCurrentLiabilities,
    ) {
    }

    /**
     * @param array{
     *     accounts_payable: int|null,
     *     accrued_expenses: int|null,
     *     short_term_debt:int|null,
     *     deferred_revenue:int|null,
     *     tax_payable:int|null,
     *     pensions:int|null,
     *     other_current_liabilities:int|null,
     *     total_current_liabilities:int|null,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            accountsPayable: $data['accounts_payable'],
            accruedExpenses: $data['accrued_expenses'],
            shortTermDebt: $data['short_term_debt'],
            deferredRevenue: $data['deferred_revenue'],
            taxPayable: $data['tax_payable'],
            pensions: $data['pensions'],
            otherCurrentLiabilities: $data['other_current_liabilities'],
            totalCurrentLiabilities: $data['total_current_liabilities'],
        );
    }
}
