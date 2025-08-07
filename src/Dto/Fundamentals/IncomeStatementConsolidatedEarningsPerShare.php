<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedEarningsPerShareType array{
 *     diluted_eps: float,
 *     basic_eps: float,
 *     continuing_and_discontinued_diluted_eps?: float,
 *     continuing_and_discontinued_basic_eps?: float,
 *     normalized_diluted_eps?: float,
 *     normalized_basic_eps?: float,
 *     reported_normalized_diluted_eps?: float,
 *     reported_normalized_basic_eps?: float,
 *     diluted_eps_other_gains_losses?: float,
 *     tax_loss_carryforward_diluted_eps?: float,
 *     diluted_accounting_change?: float,
 *     diluted_extraordinary?: float,
 *     diluted_discontinuous_operations?: float,
 *     diluted_continuous_operations?: float,
 *     basic_eps_other_gains_losses?: float,
 *     tax_loss_carryforward_basic_eps?: float,
 *     basic_accounting_change?: float,
 *     basic_extraordinary?: float,
 *     basic_discontinuous_operations?: float,
 *     basic_continuous_operations?: float,
 *     diluted_ni_avail_to_common_stockholders: int,
 *     average_dilution_earnings?: int,
 * }
 */
readonly class IncomeStatementConsolidatedEarningsPerShare
{
    public function __construct(
        public float $dilutedEps,
        public float $basicEps,
        public ?float $continuingAndDiscontinuedDilutedEps,
        public ?float $continuingAndDiscontinuedBasicEps,
        public ?float $normalizedDilutedEps,
        public ?float $normalizedBasicEps,
        public ?float $reportedNormalizedDilutedEps,
        public ?float $reportedNormalizedBasicEps,
        public ?float $dilutedEpsOtherGainsLosses,
        public ?float $taxLossCarryforwardDilutedEps,
        public ?float $dilutedAccountingChange,
        public ?float $dilutedExtraordinary,
        public ?float $dilutedDiscontinuousOperations,
        public ?float $dilutedContinuousOperations,
        public ?float $basicEpsOtherGainsLosses,
        public ?float $taxLossCarryforwardBasicEps,
        public ?float $basicAccountingChange,
        public ?float $basicExtraordinary,
        public ?float $basicDiscontinuousOperations,
        public ?float $basicContinuousOperations,
        public int $dilutedNiAvailToCommonStockholders,
        public ?int $averageDilutionEarnings,
    ) {
    }

    /** @param IncomeStatementConsolidatedEarningsPerShareType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            dilutedEps: $data['diluted_eps'],
            basicEps: $data['basic_eps'],
            continuingAndDiscontinuedDilutedEps: $data['continuing_and_discontinued_diluted_eps'] ?? null,
            continuingAndDiscontinuedBasicEps: $data['continuing_and_discontinued_basic_eps'] ?? null,
            normalizedDilutedEps: $data['normalized_diluted_eps'] ?? null,
            normalizedBasicEps: $data['normalized_basic_eps'] ?? null,
            reportedNormalizedDilutedEps: $data['reported_normalized_diluted_eps'] ?? null,
            reportedNormalizedBasicEps: $data['reported_normalized_basic_eps'] ?? null,
            dilutedEpsOtherGainsLosses: $data['diluted_eps_other_gains_losses'] ?? null,
            taxLossCarryforwardDilutedEps: $data['tax_loss_carryforward_diluted_eps'] ?? null,
            dilutedAccountingChange: $data['diluted_accounting_change'] ?? null,
            dilutedExtraordinary: $data['diluted_extraordinary'] ?? null,
            dilutedDiscontinuousOperations: $data['diluted_discontinuous_operations'] ?? null,
            dilutedContinuousOperations: $data['diluted_continuous_operations'] ?? null,
            basicEpsOtherGainsLosses: $data['basic_eps_other_gains_losses'] ?? null,
            taxLossCarryforwardBasicEps: $data['tax_loss_carryforward_basic_eps'] ?? null,
            basicAccountingChange: $data['basic_accounting_change'] ?? null,
            basicExtraordinary: $data['basic_extraordinary'] ?? null,
            basicDiscontinuousOperations: $data['basic_discontinuous_operations'] ?? null,
            basicContinuousOperations: $data['basic_continuous_operations'] ?? null,
            dilutedNiAvailToCommonStockholders: $data['diluted_ni_avail_to_common_stockholders'],
            averageDilutionEarnings: $data['average_dilution_earnings'] ?? null,
        );
    }
}
