<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type BalanceSheetConsolidatedGoodwillAndOtherIntangibleAssetsType from BalanceSheetConsolidatedGoodwillAndOtherIntangibleAssets
 * @phpstan-type BalanceSheetConsolidatedNonCurrentAssetsType array{
 *     total_non_current_assets: int,
 *     financial_assets?: int,
 *     investments_and_advances?: int,
 *     other_investments?: int,
 *     investment_in_financial_assets?: int,
 *     held_to_maturity_securities?: int,
 *     available_for_sale_securities?: int,
 *     financial_assets_designated_as_fair_value_through_profit_or_loss_total?: int,
 *     trading_securities?: int,
 *     long_term_equity_investment?: int,
 *     investments_in_joint_ventures_at_cost?: int,
 *     investments_in_other_ventures_under_equity_method?: int,
 *     investments_in_associates_at_cost?: int,
 *     investments_in_subsidiaries_at_cost?: int,
 *     investment_properties?: int,
 *     goodwill_and_other_intangible_assets?: BalanceSheetConsolidatedGoodwillAndOtherIntangibleAssetsType,
 *     net_ppe?: int,
 *     gross_ppe?: int,
 *     accumulated_depreciation?: int,
 *     leases?: int,
 *     construction_in_progress?: int,
 *     other_properties?: int,
 *     machinery_furniture_equipment?: int,
 *     buildings_and_improvements?: int,
 *     land_and_improvements?: int,
 *     properties?: int,
 *     non_current_accounts_receivable?: int,
 *     non_current_note_receivables?: int,
 *     due_from_related_parties_non_current?: int,
 *     non_current_prepaid_assets?: int,
 *     non_current_deferred_assets?: int,
 *     non_current_deferred_taxes_assets?: int,
 *     defined_pension_benefit?: int,
 *     other_non_current_assets?: int,
 * }
 */
readonly class BalanceSheetConsolidatedNonCurrentAssets
{
    public function __construct(
        public int $totalNonCurrentAssets,
        public ?int $financialAssets,
        public ?int $investmentsAndAdvances,
        public ?int $otherInvestments,
        public ?int $investmentInFinancialAssets,
        public ?int $heldToMaturitySecurities,
        public ?int $availableForSaleSecurities,
        public ?int $financialAssetsDesignatedAsFairValueThroughProfitOrLossTotal,
        public ?int $tradingSecurities,
        public ?int $longTermEquityInvestment,
        public ?int $investmentsInJointVenturesAtCost,
        public ?int $investmentsInOtherVenturesUnderEquityMethod,
        public ?int $investmentsInAssociatesAtCost,
        public ?int $investmentsInSubsidiariesAtCost,
        public ?int $investmentProperties,
        public ?BalanceSheetConsolidatedGoodwillAndOtherIntangibleAssets $goodwillAndOther,
        public ?int $netPpe,
        public ?int $grossPpe,
        public ?int $accumulatedDepreciation,
        public ?int $leases,
        public ?int $constructionInProgress,
        public ?int $otherProperties,
        public ?int $machineryFurnitureEquipment,
        public ?int $buildingsAndImprovements,
        public ?int $landAndImprovements,
        public ?int $properties,
        public ?int $nonCurrentAccountsReceivable,
        public ?int $nonCurrentNoteReceivables,
        public ?int $dueFromRelatedPartiesNonCurrent,
        public ?int $nonCurrentPrepaidAssets,
        public ?int $nonCurrentDeferredAssets,
        public ?int $nonCurrentDeferredTaxesAssets,
        public ?int $definedPensionBenefit,
        public ?int $otherNonCurrentAssets,
    ) {
    }

    /** @param BalanceSheetConsolidatedNonCurrentAssetsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalNonCurrentAssets: $data['total_non_current_assets'],
            financialAssets: $data['financial_assets'] ?? null,
            investmentsAndAdvances: $data['investments_and_advances'] ?? null,
            otherInvestments: $data['other_investments'] ?? null,
            investmentInFinancialAssets: $data['investment_in_financial_assets'] ?? null,
            heldToMaturitySecurities: $data['held_to_maturity_securities'] ?? null,
            availableForSaleSecurities: $data['available_for_sale_securities'] ?? null,
            financialAssetsDesignatedAsFairValueThroughProfitOrLossTotal: $data['financial_assets_designated_as_fair_value_through_profit_or_loss_total'] ?? null,
            tradingSecurities: $data['trading_securities'] ?? null,
            longTermEquityInvestment: $data['long_term_equity_investment'] ?? null,
            investmentsInJointVenturesAtCost: $data['investments_in_joint_ventures_at_cost'] ?? null,
            investmentsInOtherVenturesUnderEquityMethod: $data['investments_in_other_ventures_under_equity_method'] ?? null,
            investmentsInAssociatesAtCost: $data['investments_in_associates_at_cost'] ?? null,
            investmentsInSubsidiariesAtCost: $data['investments_in_subsidiaries_at_cost'] ?? null,
            investmentProperties: $data['investment_properties'] ?? null,
            goodwillAndOther: ($data['goodwill_and_other_intangible_assets'] ?? null) !== null ? BalanceSheetConsolidatedGoodwillAndOtherIntangibleAssets::fromArray(
                $data['goodwill_and_other_intangible_assets'],
            ) : null,
            netPpe: $data['net_ppe'] ?? null,
            grossPpe: $data['gross_ppe'] ?? null,
            accumulatedDepreciation: $data['accumulated_depreciation'] ?? null,
            leases: $data['leases'] ?? null,
            constructionInProgress: $data['construction_in_progress'] ?? null,
            otherProperties: $data['other_properties'] ?? null,
            machineryFurnitureEquipment: $data['machinery_furniture_equipment'] ?? null,
            buildingsAndImprovements: $data['buildings_and_improvements'] ?? null,
            landAndImprovements: $data['land_and_improvements'] ?? null,
            properties: $data['properties'] ?? null,
            nonCurrentAccountsReceivable: $data['non_current_accounts_receivable'] ?? null,
            nonCurrentNoteReceivables: $data['non_current_note_receivables'] ?? null,
            dueFromRelatedPartiesNonCurrent: $data['due_from_related_parties_non_current'] ?? null,
            nonCurrentPrepaidAssets: $data['non_current_prepaid_assets'] ?? null,
            nonCurrentDeferredAssets: $data['non_current_deferred_assets'] ?? null,
            nonCurrentDeferredTaxesAssets: $data['non_current_deferred_taxes_assets'] ?? null,
            definedPensionBenefit: $data['defined_pension_benefit'] ?? null,
            otherNonCurrentAssets: $data['other_non_current_assets'] ?? null,
        );
    }
}
