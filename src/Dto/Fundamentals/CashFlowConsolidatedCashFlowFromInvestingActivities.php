<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type CashFlowConsolidatedCashFlowFromInvestingActivitiesType array{
 *     investing_cash_flow: int,
 *     cash_flow_from_continuing_investing_activities?: int,
 *     cash_from_discontinued_investing_activities?: int,
 *     net_other_investing_changes?: int,
 *     interest_received_cfi?: int,
 *     dividends_received_cfi?: int,
 *     net_investment_purchase_and_sale?: int,
 *     sale_of_investment?: int,
 *     purchase_of_investment?: int,
 *     net_investment_properties_purchase_and_sale?: int,
 *     sale_of_investment_properties?: int,
 *     purchase_of_investment_properties?: int,
 *     net_business_purchase_and_sale?: int,
 *     sale_of_business?: int,
 *     purchase_of_business?: int,
 *     net_intangibles_purchase_and_sale?: int,
 *     sale_of_intangibles?: int,
 *     purchase_of_intangibles?: int,
 *     net_ppe_purchase_and_sale?: int,
 *     sale_of_ppe?: int,
 *     purchase_of_ppe?: int,
 *     capital_expenditure_reported?: int,
 *     capital_expenditure?: int,
 * }
 */
readonly class CashFlowConsolidatedCashFlowFromInvestingActivities
{
    public function __construct(
        public int $investingCashFlow,
        public ?int $cashFlowFromContinuingInvestingActivities,
        public ?int $cashFromDiscontinuedInvestingActivities,
        public ?int $netOtherInvestingChanges,
        public ?int $interestReceivedCfi,
        public ?int $dividendsReceivedCfi,
        public ?int $netInvestmentPurchaseAndSale,
        public ?int $saleOfInvestment,
        public ?int $purchaseOfInvestment,
        public ?int $netInvestmentPropertiesPurchaseAndSale,
        public ?int $saleOfInvestmentProperties,
        public ?int $purchaseOfInvestmentProperties,
        public ?int $netBusinessPurchaseAndSale,
        public ?int $saleOfBusiness,
        public ?int $purchaseOfBusiness,
        public ?int $netIntangiblesPurchaseAndSale,
        public ?int $saleOfIntangibles,
        public ?int $purchaseOfIntangibles,
        public ?int $netPpePurchaseAndSale,
        public ?int $saleOfPpe,
        public ?int $purchaseOfPpe,
        public ?int $capitalExpenditureReported,
        public ?int $capitalExpenditure,
    ) {
    }

    /** @param CashFlowConsolidatedCashFlowFromInvestingActivitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            investingCashFlow: $data['investing_cash_flow'],
            cashFlowFromContinuingInvestingActivities: $data['cash_flow_from_continuing_investing_activities'] ?? null,
            cashFromDiscontinuedInvestingActivities: $data['cash_from_discontinued_investing_activities'] ?? null,
            netOtherInvestingChanges: $data['net_other_investing_changes'] ?? null,
            interestReceivedCfi: $data['interest_received_cfi'] ?? null,
            dividendsReceivedCfi: $data['dividends_received_cfi'] ?? null,
            netInvestmentPurchaseAndSale: $data['net_investment_purchase_and_sale'] ?? null,
            saleOfInvestment: $data['sale_of_investment'] ?? null,
            purchaseOfInvestment: $data['purchase_of_investment'] ?? null,
            netInvestmentPropertiesPurchaseAndSale: $data['net_investment_properties_purchase_and_sale'] ?? null,
            saleOfInvestmentProperties: $data['sale_of_investment_properties'] ?? null,
            purchaseOfInvestmentProperties: $data['purchase_of_investment_properties'] ?? null,
            netBusinessPurchaseAndSale: $data['net_business_purchase_and_sale'] ?? null,
            saleOfBusiness: $data['sale_of_business'] ?? null,
            purchaseOfBusiness: $data['purchase_of_business'] ?? null,
            netIntangiblesPurchaseAndSale: $data['net_intangibles_purchase_and_sale'] ?? null,
            saleOfIntangibles: $data['sale_of_intangibles'] ?? null,
            purchaseOfIntangibles: $data['purchase_of_intangibles'] ?? null,
            netPpePurchaseAndSale: $data['net_ppe_purchase_and_sale'] ?? null,
            saleOfPpe: $data['sale_of_ppe'] ?? null,
            purchaseOfPpe: $data['purchase_of_ppe'] ?? null,
            capitalExpenditureReported: $data['capital_expenditure_reported'] ?? null,
            capitalExpenditure: $data['capital_expenditure'] ?? null,
        );
    }
}
