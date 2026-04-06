<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-import-type EtfSummaryDataType from EtfSummaryData
 * @phpstan-import-type EtfTrailingReturnType from EtfTrailingReturn
 * @phpstan-import-type EtfAnnualTotalReturnType from EtfAnnualTotalReturn
 * @phpstan-import-type EtfVolatilityMeasureType from EtfVolatilityMeasure
 * @phpstan-import-type EtfValuationMetricsType from EtfValuationMetrics
 * @phpstan-import-type EtfSectorType from EtfSector
 * @phpstan-import-type EtfCountryAllocationType from EtfCountryAllocation
 * @phpstan-import-type EtfAssetAllocationType from EtfAssetAllocation
 * @phpstan-import-type EtfHoldingType from EtfHolding
 * @phpstan-import-type EtfBondBreakdownType from EtfBondBreakdown
 * @phpstan-type EtfAllDataPerformanceType array{
 *     trailing_returns: list<EtfTrailingReturnType>,
 *     annual_total_returns: list<EtfAnnualTotalReturnType>,
 * }
 * @phpstan-type EtfAllDataRiskType array{
 *     volatility_measures: list<EtfVolatilityMeasureType>,
 *     valuation_metrics: EtfValuationMetricsType,
 * }
 * @phpstan-type EtfAllDataCompositionType array{
 *     major_market_sectors: list<EtfSectorType>,
 *     country_allocation: list<EtfCountryAllocationType>,
 *     asset_allocation: EtfAssetAllocationType,
 *     top_holdings: list<EtfHoldingType>,
 *     bond_breakdown: EtfBondBreakdownType,
 * }
 * @phpstan-type EtfAllDataType array{
 *     etf: array{
 *         summary: EtfSummaryDataType,
 *         performance: EtfAllDataPerformanceType,
 *         risk: EtfAllDataRiskType,
 *         composition: EtfAllDataCompositionType,
 *     },
 *     status: string,
 * }
 */
readonly class EtfAllData
{
    /**
     * @param list<EtfTrailingReturn> $trailingReturns
     * @param list<EtfAnnualTotalReturn> $annualTotalReturns
     * @param list<EtfVolatilityMeasure> $volatilityMeasures
     * @param list<EtfSector> $majorMarketSectors
     * @param list<EtfCountryAllocation> $countryAllocation
     * @param list<EtfHolding> $topHoldings
     */
    public function __construct(
        public EtfSummaryData $summary,
        public array $trailingReturns,
        public array $annualTotalReturns,
        public array $volatilityMeasures,
        public EtfValuationMetrics $valuationMetrics,
        public array $majorMarketSectors,
        public array $countryAllocation,
        public EtfAssetAllocation $assetAllocation,
        public array $topHoldings,
        public EtfBondBreakdown $bondBreakdown,
        public string $status,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /** @var EtfAllDataType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EtfAllDataType $data */
    public static function fromArray(array $data): self
    {
        $etf = $data['etf'];

        return new self(
            summary: EtfSummaryData::fromArray($etf['summary']),
            trailingReturns: array_map(
                fn (array $item): EtfTrailingReturn => EtfTrailingReturn::fromArray($item),
                $etf['performance']['trailing_returns'],
            ),
            annualTotalReturns: array_map(
                fn (array $item): EtfAnnualTotalReturn => EtfAnnualTotalReturn::fromArray($item),
                $etf['performance']['annual_total_returns'],
            ),
            volatilityMeasures: array_map(
                fn (array $item): EtfVolatilityMeasure => EtfVolatilityMeasure::fromArray($item),
                $etf['risk']['volatility_measures'],
            ),
            valuationMetrics: EtfValuationMetrics::fromArray($etf['risk']['valuation_metrics']),
            majorMarketSectors: array_map(
                fn (array $item): EtfSector => EtfSector::fromArray($item),
                $etf['composition']['major_market_sectors'],
            ),
            countryAllocation: array_map(
                fn (array $item): EtfCountryAllocation => EtfCountryAllocation::fromArray($item),
                $etf['composition']['country_allocation'],
            ),
            assetAllocation: EtfAssetAllocation::fromArray($etf['composition']['asset_allocation']),
            topHoldings: array_map(
                fn (array $item): EtfHolding => EtfHolding::fromArray($item),
                $etf['composition']['top_holdings'],
            ),
            bondBreakdown: EtfBondBreakdown::fromArray($etf['composition']['bond_breakdown']),
            status: $data['status'],
        );
    }
}
