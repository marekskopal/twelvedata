<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

readonly class BalanceSheetBalanceSheet
{
    public function __construct(
        public DateTimeImmutable $fiscalDate,
        public BalanceSheetAssets $assets,
        public BalanceSheetLiabilities $liabilities,
        public BalanceSheetShareholdersEquity $shareholdersEquity,
    ) {
    }

    /**
     * @param array{
     *     fiscal_date: string,
     *     assets: array{
     *         current_assets: array{
     *             cash: int,
     *             cash_equivalents: int,
     *             cash_and_cash_equivalents:int,
     *             other_short_term_investments:int,
     *             accounts_receivable:int,
     *             other_receivables:int,
     *             inventory:int,
     *             prepaid_assets:int|null,
     *             restricted_cash:int|null,
     *             assets_held_for_sale:int|null,
     *             hedging_assets:int|null,
     *             other_current_assets:int|null,
     *             total_current_assets:int|null,
     *         },
     *         non_current_assets: array{
     *             properties: int|null,
     *             land_and_improvements: int|null,
     *             machinery_furniture_equipment:int|null,
     *             construction_in_progress:int|null,
     *             leases:int|null,
     *             accumulated_depreciation:int|null,
     *             goodwill:int|null,
     *             investment_properties:int|null,
     *             financial_assets:int|null,
     *             intangible_assets:int|null,
     *             investments_and_advances:int|null,
     *             other_non_current_assets:int|null,
     *             total_non_current_assets:int|null,
     *         },
     *         total_assets: int,
     *     },
     *     liabilities: array{
     *         current_liabilities: array{
     *             accounts_payable: int|null,
     *             accrued_expenses: int|null,
     *             short_term_debt:int|null,
     *             deferred_revenue:int|null,
     *             tax_payable:int|null,
     *             pensions:int|null,
     *             other_current_liabilities:int|null,
     *             total_current_liabilities:int|null,
     *         },
     *         non_current_liabilities: array{
     *             long_term_provisions: int|null,
     *             long_term_debt: int|null,
     *             provision_for_risks_and_charges:int|null,
     *             deferred_liabilities:int|null,
     *             derivative_product_liabilities:int|null,
     *             other_non_current_liabilities:int|null,
     *             total_non_current_liabilities:int|null,
     *         },
     *         total_liabilities: int,
     *     },
     *     shareholders_equity: array{
     *         common_stock: int,
     *         retained_earnings: int,
     *         other_shareholders_equity:int,
     *         total_shareholders_equity:int,
     *         additional_paid_in_capital:int|null,
     *         treasury_stock:int|null,
     *         minority_interest:int|null,
     *     },
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            fiscalDate: new DateTimeImmutable($data['fiscal_date']),
            assets: BalanceSheetAssets::fromArray($data['assets']),
            liabilities: BalanceSheetLiabilities::fromArray($data['liabilities']),
            shareholdersEquity: BalanceSheetShareholdersEquity::fromArray($data['shareholders_equity']),
        );
    }
}
