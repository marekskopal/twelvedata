<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class BalanceSheetCurrentAssets
{
    public function __construct(
        public int $cash,
        public int $cashEquivalents,
        public int $cashAndCashEquivalents,
        public int $otherShortTermInvestments,
        public int $accountsReceivable,
        public int $otherReceivables,
        public int $inventory,
        public ?int $prepaidAssets,
        public ?int $restrictedCash,
        public ?int $assetsHeldForSale,
        public ?int $hedgingAssets,
        public ?int $otherCurrentAssets,
        public ?int $totalCurrentAssets,
    ) {
    }

    /**
     * @param array{
     *     cash: int,
     *     cash_equivalents: int,
     *     cash_and_cash_equivalents:int,
     *     other_short_term_investments:int,
     *     accounts_receivable:int,
     *     other_receivables:int,
     *     inventory:int,
     *     prepaid_assets:int|null,
     *     restricted_cash:int|null,
     *     assets_held_for_sale:int|null,
     *     hedging_assets:int|null,
     *     other_current_assets:int|null,
     *     total_current_assets:int|null,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            cash: $data['cash'],
            cashEquivalents: $data['cash_equivalents'],
            cashAndCashEquivalents: $data['cash_and_cash_equivalents'],
            otherShortTermInvestments: $data['other_short_term_investments'],
            accountsReceivable: $data['accounts_receivable'],
            otherReceivables: $data['other_receivables'],
            inventory: $data['inventory'],
            prepaidAssets: $data['prepaid_assets'],
            restrictedCash: $data['restricted_cash'],
            assetsHeldForSale: $data['assets_held_for_sale'],
            hedgingAssets: $data['hedging_assets'],
            otherCurrentAssets: $data['other_current_assets'],
            totalCurrentAssets: $data['total_current_assets'],
        );
    }
}
