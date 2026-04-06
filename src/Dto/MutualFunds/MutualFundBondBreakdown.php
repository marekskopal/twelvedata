<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundBondMaturityDurationType from MutualFundBondMaturityDuration
 * @phpstan-import-type MutualFundCreditQualityType from MutualFundCreditQuality
 * @phpstan-type MutualFundBondBreakdownType array{
 *     average_maturity: MutualFundBondMaturityDurationType,
 *     average_duration: MutualFundBondMaturityDurationType,
 *     credit_quality: list<MutualFundCreditQualityType>,
 * }
 */
readonly class MutualFundBondBreakdown
{
    /** @param list<MutualFundCreditQuality> $creditQuality */
    public function __construct(
        public MutualFundBondMaturityDuration $averageMaturity,
        public MutualFundBondMaturityDuration $averageDuration,
        public array $creditQuality,
    ) {
    }

    /** @param MutualFundBondBreakdownType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            averageMaturity: MutualFundBondMaturityDuration::fromArray($data['average_maturity']),
            averageDuration: MutualFundBondMaturityDuration::fromArray($data['average_duration']),
            creditQuality: array_map(
                fn (array $item): MutualFundCreditQuality => MutualFundCreditQuality::fromArray($item),
                $data['credit_quality'],
            ),
        );
    }
}
