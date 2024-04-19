<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class BalanceSheetAssets
{
    public function __construct(
        public BalanceSheetCurrentAssets $currentAssets,
        public BalanceSheetNonCurrentAssets $nonCurrentAssets,
        public int $totalAssets,
    ) {
    }

    /**
     * @param array{
     *     current_assets: array{
     *         cash: int,
     *         cash_equivalents: int,
     *         cash_and_cash_equivalents:int,
     *         other_short_term_investments:int,
     *         accounts_receivable:int,
     *         other_receivables:int,
     *         inventory:int,
     *         prepaid_assets:int|null,
     *         restricted_cash:int|null,
     *         assets_held_for_sale:int|null,
     *         hedging_assets:int|null,
     *         other_current_assets:int|null,
     *         total_current_assets:int|null,
     *     },
     *     non_current_assets: array{
     *         properties: int|null,
     *         land_and_improvements: int|null,
     *         machinery_furniture_equipment:int|null,
     *         construction_in_progress:int|null,
     *         leases:int|null,
     *         accumulated_depreciation:int|null,
     *         goodwill:int|null,
     *         investment_properties:int|null,
     *         financial_assets:int|null,
     *         intangible_assets:int|null,
     *         investments_and_advances:int|null,
     *         other_non_current_assets:int|null,
     *         total_non_current_assets:int|null,
     *     },
     *     total_assets: int,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            currentAssets: BalanceSheetCurrentAssets::fromArray($data['current_assets']),
            nonCurrentAssets: BalanceSheetNonCurrentAssets::fromArray($data['non_current_assets']),
            totalAssets: $data['total_assets'],
        );
    }
}
