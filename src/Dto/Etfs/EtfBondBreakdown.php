<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-import-type EtfBondMaturityDurationType from EtfBondMaturityDuration
 * @phpstan-import-type EtfCreditQualityType from EtfCreditQuality
 * @phpstan-type EtfBondBreakdownType array{
 *     average_maturity: EtfBondMaturityDurationType,
 *     average_duration: EtfBondMaturityDurationType,
 *     credit_quality: list<EtfCreditQualityType>,
 * }
 */
readonly class EtfBondBreakdown
{
    /** @param list<EtfCreditQuality> $creditQuality */
    public function __construct(
        public EtfBondMaturityDuration $averageMaturity,
        public EtfBondMaturityDuration $averageDuration,
        public array $creditQuality,
    ) {
    }

    /** @param EtfBondBreakdownType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            averageMaturity: EtfBondMaturityDuration::fromArray($data['average_maturity']),
            averageDuration: EtfBondMaturityDuration::fromArray($data['average_duration']),
            creditQuality: array_map(
                fn (array $item): EtfCreditQuality => EtfCreditQuality::fromArray($item),
                $data['credit_quality'],
            ),
        );
    }
}
