<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

class BalanceSheetLiabilities
{
    public function __construct(
        public BalanceSheetCurrentLiabilities $currentLiabilities,
        public BalanceSheetNonCurrentLiabilities $nonCurrentLiabilities,
        public int $totalLiabilities,
    ) {
    }

    /**
     * @param array{
     *     current_liabilities: array{
     *         accounts_payable: int|null,
     *         accrued_expenses: int|null,
     *         short_term_debt:int|null,
     *         deferred_revenue:int|null,
     *         tax_payable:int|null,
     *         pensions:int|null,
     *         other_current_liabilities:int|null,
     *         total_current_liabilities:int|null,
     *     },
     *     non_current_liabilities: array{
     *         long_term_provisions: int|null,
     *         long_term_debt: int|null,
     *         provision_for_risks_and_charges:int|null,
     *         deferred_liabilities:int|null,
     *         derivative_product_liabilities:int|null,
     *         other_non_current_liabilities:int|null,
     *         total_non_current_liabilities:int|null,
     *     },
     *     total_liabilities: int,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            currentLiabilities: BalanceSheetCurrentLiabilities::fromArray($data['current_liabilities']),
            nonCurrentLiabilities: BalanceSheetNonCurrentLiabilities::fromArray($data['non_current_liabilities']),
            totalLiabilities: $data['total_liabilities'],
        );
    }
}
