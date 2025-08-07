<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type BalanceSheetConsolidatedReceivablesType from BalanceSheetConsolidatedReceivables
 * @phpstan-import-type BalanceSheetConsolidatedInventoryType from BalanceSheetConsolidatedInventory
 * @phpstan-type BalanceSheetConsolidatedCurrentAssetsType array{
 *     total_current_assets: int,
 *     cash_cash_equivalents_and_short_term_investments: int,
 *     cash_and_cash_equivalents: int,
 *     cash_equivalents: int,
 *     cash_financial: int,
 *     other_short_term_investments: int,
 *     restricted_cash?: int,
 *     receivables: BalanceSheetConsolidatedReceivablesType,
 *     inventory: BalanceSheetConsolidatedInventoryType,
 *     prepaid_assets?: int,
 *     current_deferred_assets?: int,
 *     current_deferred_taxes_assets?: int,
 *     assets_held_for_sale_current?: int,
 *     hedging_assets_current?: int,
 *     other_current_assets: int,
 * }
 */
readonly class BalanceSheetConsolidatedCurrentAssets
{
    public function __construct(
        public int $totalCurrentAssets,
        public int $cashCashEquivalentsAndShortTermInvestments,
        public int $cashAndCashEquivalents,
        public int $cashEquivalents,
        public int $cashFinancial,
        public int $otherShortTermInvestments,
        public ?int $restrictedCash,
        public BalanceSheetConsolidatedReceivables $receivables,
        public BalanceSheetConsolidatedInventory $inventory,
        public ?int $prepaidAssets,
        public ?int $currentDeferredAssets,
        public ?int $currentDeferredTaxesAssets,
        public ?int $assetsHeldForSaleCurrent,
        public ?int $hedgingAssetsCurrent,
        public int $otherCurrentAssets,
    ) {
    }

    /** @param BalanceSheetConsolidatedCurrentAssetsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalCurrentAssets: $data['total_current_assets'],
            cashCashEquivalentsAndShortTermInvestments: $data['cash_cash_equivalents_and_short_term_investments'],
            cashAndCashEquivalents: $data['cash_and_cash_equivalents'],
            cashEquivalents: $data['cash_equivalents'],
            cashFinancial: $data['cash_financial'],
            otherShortTermInvestments: $data['other_short_term_investments'],
            restrictedCash: $data['restricted_cash'] ?? null,
            receivables: BalanceSheetConsolidatedReceivables::fromArray($data['receivables']),
            inventory: BalanceSheetConsolidatedInventory::fromArray($data['inventory']),
            prepaidAssets: $data['prepaid_assets'] ?? null,
            currentDeferredAssets: $data['current_deferred_assets'] ?? null,
            currentDeferredTaxesAssets: $data['current_deferred_taxes_assets'] ?? null,
            assetsHeldForSaleCurrent: $data['assets_held_for_sale_current'] ?? null,
            hedgingAssetsCurrent: $data['hedging_assets_current'] ?? null,
            otherCurrentAssets: $data['other_current_assets'],
        );
    }
}
