<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type BalanceSheetConsolidatedEquityAdjustmentsType array{
 *     gains_losses_not_affecting_retained_earnings: int,
 *     other_equity_adjustments: int,
 *     fixed_assets_revaluation_reserve?: int,
 *     foreign_currency_translation_adjustments?: int,
 *     minimum_pension_liabilities?: int,
 *     unrealized_gain_loss?: int,
 * }
 */
readonly class BalanceSheetConsolidatedEquityAdjustments
{
    public function __construct(
        public int $gainsLossesNotAffectingRetainedEarnings,
        public int $otherEquityAdjustments,
        public ?int $fixedAssetsRevaluationReserve,
        public ?int $foreignCurrencyTranslationAdjustments,
        public ?int $minimumPensionLiabilities,
        public ?int $unrealizedGainLoss,
    ) {
    }

    /** @param BalanceSheetConsolidatedEquityAdjustmentsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            gainsLossesNotAffectingRetainedEarnings: $data['gains_losses_not_affecting_retained_earnings'],
            otherEquityAdjustments: $data['other_equity_adjustments'],
            fixedAssetsRevaluationReserve: $data['fixed_assets_revaluation_reserve'] ?? null,
            foreignCurrencyTranslationAdjustments: $data['foreign_currency_translation_adjustments'] ?? null,
            minimumPensionLiabilities: $data['minimum_pension_liabilities'] ?? null,
            unrealizedGainLoss: $data['unrealized_gain_loss'] ?? null,
        );
    }
}
