<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundVolatilityMeasureType from MutualFundVolatilityMeasure
 * @phpstan-import-type MutualFundValuationMetricsType from MutualFundValuationMetrics
 * @phpstan-type MutualFundRiskDataType array{
 *     volatility_measures: list<MutualFundVolatilityMeasureType>,
 *     valuation_metrics: MutualFundValuationMetricsType,
 * }
 * @phpstan-type MutualFundRiskType array{
 *     mutual_fund: array{risk: MutualFundRiskDataType},
 *     status: string,
 * }
 */
readonly class MutualFundRisk
{
    /** @param list<MutualFundVolatilityMeasure> $volatilityMeasures */
    public function __construct(
        public array $volatilityMeasures,
        public MutualFundValuationMetrics $valuationMetrics,
        public string $status,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /** @var MutualFundRiskType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MutualFundRiskType $data */
    public static function fromArray(array $data): self
    {
        $risk = $data['mutual_fund']['risk'];

        return new self(
            volatilityMeasures: array_map(
                fn (array $item): MutualFundVolatilityMeasure => MutualFundVolatilityMeasure::fromArray($item),
                $risk['volatility_measures'],
            ),
            valuationMetrics: MutualFundValuationMetrics::fromArray($risk['valuation_metrics']),
            status: $data['status'],
        );
    }
}
