<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type CashFlowConsolidatedCashPositionType array{
 *     beginning_cash_position: int,
 *     end_cash_position: int,
 *     changes_in_cash: int,
 *     other_cash_adjustment_outside_change_in_cash?: int,
 *     other_cash_adjustment_inside_change_in_cash?: int,
 *     effect_of_exchange_rate_changes?: int,
 * }
 */
readonly class CashFlowConsolidatedCashPosition
{
    public function __construct(
        public int $beginningCashPosition,
        public int $endCashPosition,
        public int $changesInCash,
        public ?int $otherCashAdjustmentOutsideChangeInCash,
        public ?int $otherCashAdjustmentInsideChangeInCash,
        public ?int $effectOfExchangeRateChanges,
    ) {
    }

    /** @param CashFlowConsolidatedCashPositionType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            beginningCashPosition: $data['beginning_cash_position'],
            endCashPosition: $data['end_cash_position'],
            changesInCash: $data['changes_in_cash'],
            otherCashAdjustmentOutsideChangeInCash: $data['other_cash_adjustment_outside_change_in_cash'] ?? null,
            otherCashAdjustmentInsideChangeInCash: $data['other_cash_adjustment_inside_change_in_cash'] ?? null,
            effectOfExchangeRateChanges: $data['effect_of_exchange_rate_changes'] ?? null,
        );
    }
}
