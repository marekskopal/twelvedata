<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type CashFlowConsolidatedDirectMethodCashFlowType array{
 *     classes_of_cash_receipts_from_operating_activities: int,
 *     other_cash_receipts_from_operating_activities: int,
 *     receipts_from_government_grants: int,
 *     receipts_from_customers: int,
 *     classes_of_cash_payments: int,
 *     other_cash_payments_from_operating_activities: int,
 *     payments_on_behalf_of_employees: int,
 *     payments_to_suppliers_for_goods_and_services: int,
 * }
 */
readonly class CashFlowConsolidatedDirectMethodCashFlow
{
    public function __construct(
        public int $classesOfCashReceiptsFromOperatingActivities,
        public int $otherCashReceiptsFromOperatingActivities,
        public int $receiptsFromGovernmentGrants,
        public int $receiptsFromCustomers,
        public int $classesOfCashPayments,
        public int $otherCashPaymentsFromOperatingActivities,
        public int $paymentsOnBehalfOfEmployees,
        public int $paymentsToSuppliersForGoodsAndServices,
    ) {
    }

    /** @param CashFlowConsolidatedDirectMethodCashFlowType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            classesOfCashReceiptsFromOperatingActivities: $data['classes_of_cash_receipts_from_operating_activities'],
            otherCashReceiptsFromOperatingActivities: $data['other_cash_receipts_from_operating_activities'],
            receiptsFromGovernmentGrants: $data['receipts_from_government_grants'],
            receiptsFromCustomers: $data['receipts_from_customers'],
            classesOfCashPayments: $data['classes_of_cash_payments'],
            otherCashPaymentsFromOperatingActivities: $data['other_cash_payments_from_operating_activities'],
            paymentsOnBehalfOfEmployees: $data['payments_on_behalf_of_employees'],
            paymentsToSuppliersForGoodsAndServices: $data['payments_to_suppliers_for_goods_and_services'],
        );
    }
}
