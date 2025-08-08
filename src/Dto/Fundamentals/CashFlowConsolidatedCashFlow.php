<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-import-type CashFlowConsolidatedCashFlowFromOperatingActivitiesType from CashFlowConsolidatedCashFlowFromOperatingActivities
 * @phpstan-import-type CashFlowConsolidatedCashFlowFromInvestingActivitiesType from CashFlowConsolidatedCashFlowFromInvestingActivities
 * @phpstan-import-type CashFlowConsolidatedCashFlowFromFinancingActivitiesType from CashFlowConsolidatedCashFlowFromFinancingActivities
 * @phpstan-import-type CashFlowConsolidatedSupplementalDataType from CashFlowConsolidatedSupplementalData
 * @phpstan-import-type CashFlowConsolidatedForeignAndDomesticSalesType from CashFlowConsolidatedForeignAndDomesticSales
 * @phpstan-import-type CashFlowConsolidatedCashPositionType from CashFlowConsolidatedCashPosition
 * @phpstan-import-type CashFlowConsolidatedDirectMethodCashFlowType from CashFlowConsolidatedDirectMethodCashFlow
 * @phpstan-type CashFlowConsolidatedCashFlowType array{
 *     fiscal_date: string,
 *     cash_flow_from_operating_activities: CashFlowConsolidatedCashFlowFromOperatingActivitiesType,
 *     cash_flow_from_investing_activities: CashFlowConsolidatedCashFlowFromInvestingActivitiesType,
 *     cash_flow_from_financing_activities: CashFlowConsolidatedCashFlowFromFinancingActivitiesType,
 *     supplemental_data: CashFlowConsolidatedSupplementalDataType,
 *     foreign_and_domestic_sales?: CashFlowConsolidatedForeignAndDomesticSalesType,
 *     cash_position: CashFlowConsolidatedCashPositionType,
 *     direct_method_cash_flow?: CashFlowConsolidatedDirectMethodCashFlowType
 * }
 */
readonly class CashFlowConsolidatedCashFlow
{
    public function __construct(
        public DateTimeImmutable $fiscalDate,
        public CashFlowConsolidatedCashFlowFromOperatingActivities $cashFlowFromOperatingActivities,
        public CashFlowConsolidatedCashFlowFromInvestingActivities $cashFlowFromInvestingActivities,
        public CashFlowConsolidatedCashFlowFromFinancingActivities $cashFlowFromFinancingActivities,
        public CashFlowConsolidatedSupplementalData $supplementalData,
        public ?CashFlowConsolidatedForeignAndDomesticSales $foreignAndDomesticSales,
        public CashFlowConsolidatedCashPosition $cashPosition,
        public ?CashFlowConsolidatedDirectMethodCashFlow $directMethodCashFlow,
    ) {
    }

    /** @param CashFlowConsolidatedCashFlowType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            fiscalDate: new DateTimeImmutable($data['fiscal_date']),
            cashFlowFromOperatingActivities: CashFlowConsolidatedCashFlowFromOperatingActivities::fromArray(
                $data['cash_flow_from_operating_activities'],
            ),
            cashFlowFromInvestingActivities: CashFlowConsolidatedCashFlowFromInvestingActivities::fromArray(
                $data['cash_flow_from_investing_activities'],
            ),
            cashFlowFromFinancingActivities: CashFlowConsolidatedCashFlowFromFinancingActivities::fromArray(
                $data['cash_flow_from_financing_activities'],
            ),
            supplementalData: CashFlowConsolidatedSupplementalData::fromArray($data['supplemental_data']),
            foreignAndDomesticSales: ($data['foreign_and_domestic_sales'] ?? null) !== null ? CashFlowConsolidatedForeignAndDomesticSales::fromArray(
                $data['foreign_and_domestic_sales'],
            ) : null,
            cashPosition: CashFlowConsolidatedCashPosition::fromArray($data['cash_position']),
            directMethodCashFlow: ($data['direct_method_cash_flow'] ?? null) !== null ? CashFlowConsolidatedDirectMethodCashFlow::fromArray(
                $data['direct_method_cash_flow'],
            ) : null,
        );
    }
}
