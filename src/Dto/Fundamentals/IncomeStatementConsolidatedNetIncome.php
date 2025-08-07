<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedNetIncomeType array{
 *     net_income_value: int,
 *     net_income_common_stockholders: int,
 *     net_income_including_noncontrolling_interests?: int,
 *     net_income_from_tax_loss_carryforward?: int,
 *     net_income_extraordinary?: int,
 *     net_income_discontinuous_operations?: int,
 *     net_income_continuous_operations: int,
 *     net_income_from_continuing_operation_net_minority_interest: int,
 *     net_income_from_continuing_and_discontinued_operation: int,
 *     normalized_income: int,
 *     minority_interests?: int,
 * }
 */
readonly class IncomeStatementConsolidatedNetIncome
{
    public function __construct(
        public int $netIncomeValue,
        public int $netIncomeCommonStockholders,
        public ?int $netIncomeIncludingNoncontrollingInterests,
        public ?int $netIncomeFromTaxLossCarryforward,
        public ?int $netIncomeExtraordinary,
        public ?int $netIncomeDiscontinuousOperations,
        public int $netIncomeContinuousOperations,
        public int $netIncomeFromContinuingOperationNetMinorityInterest,
        public int $netIncomeFromContinuingAndDiscontinuedOperation,
        public int $normalizedIncome,
        public ?int $minorityInterests,
    ) {
    }

    /** @param IncomeStatementConsolidatedNetIncomeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            netIncomeValue: $data['net_income_value'],
            netIncomeCommonStockholders: $data['net_income_common_stockholders'],
            netIncomeIncludingNoncontrollingInterests: $data['net_income_including_noncontrolling_interests'] ?? null,
            netIncomeFromTaxLossCarryforward: $data['net_income_from_tax_loss_carryforward'] ?? null,
            netIncomeExtraordinary: $data['net_income_extraordinary'] ?? null,
            netIncomeDiscontinuousOperations: $data['net_income_discontinuous_operations'] ?? null,
            netIncomeContinuousOperations: $data['net_income_continuous_operations'],
            netIncomeFromContinuingOperationNetMinorityInterest: $data['net_income_from_continuing_operation_net_minority_interest'],
            netIncomeFromContinuingAndDiscontinuedOperation: $data['net_income_from_continuing_and_discontinued_operation'],
            normalizedIncome: $data['normalized_income'],
            minorityInterests: $data['minority_interests'] ?? null,
        );
    }
}
