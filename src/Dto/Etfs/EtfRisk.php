<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-import-type EtfVolatilityMeasureType from EtfVolatilityMeasure
 * @phpstan-import-type EtfValuationMetricsType from EtfValuationMetrics
 * @phpstan-type EtfRiskDataType array{
 *     volatility_measures: list<EtfVolatilityMeasureType>,
 *     valuation_metrics: EtfValuationMetricsType,
 * }
 * @phpstan-type EtfRiskType array{
 *     etf: array{risk: EtfRiskDataType},
 *     status: string,
 * }
 */
readonly class EtfRisk
{
    /** @param list<EtfVolatilityMeasure> $volatilityMeasures */
    public function __construct(public array $volatilityMeasures, public EtfValuationMetrics $valuationMetrics, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EtfRiskType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EtfRiskType $data */
    public static function fromArray(array $data): self
    {
        $risk = $data['etf']['risk'];

        return new self(
            volatilityMeasures: array_map(
                fn (array $item): EtfVolatilityMeasure => EtfVolatilityMeasure::fromArray($item),
                $risk['volatility_measures'],
            ),
            valuationMetrics: EtfValuationMetrics::fromArray($risk['valuation_metrics']),
            status: $data['status'],
        );
    }
}
