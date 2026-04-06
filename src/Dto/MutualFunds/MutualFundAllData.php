<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundSummaryDataType from MutualFundSummaryData
 * @phpstan-import-type MutualFundTrailingReturnType from MutualFundTrailingReturn
 * @phpstan-import-type MutualFundAnnualTotalReturnType from MutualFundAnnualTotalReturn
 * @phpstan-import-type MutualFundQuarterlyTotalReturnType from MutualFundQuarterlyTotalReturn
 * @phpstan-import-type MutualFundLoadAdjustedReturnType from MutualFundLoadAdjustedReturn
 * @phpstan-import-type MutualFundVolatilityMeasureType from MutualFundVolatilityMeasure
 * @phpstan-import-type MutualFundValuationMetricsType from MutualFundValuationMetrics
 * @phpstan-import-type MutualFundRatingsDataType from MutualFundRatingsData
 * @phpstan-import-type MutualFundSectorType from MutualFundSector
 * @phpstan-import-type MutualFundAssetAllocationType from MutualFundAssetAllocation
 * @phpstan-import-type MutualFundHoldingType from MutualFundHolding
 * @phpstan-import-type MutualFundBondBreakdownType from MutualFundBondBreakdown
 * @phpstan-import-type MutualFundExpensesType from MutualFundExpenses
 * @phpstan-import-type MutualFundMinimumsType from MutualFundMinimums
 * @phpstan-import-type MutualFundPricingType from MutualFundPricing
 * @phpstan-import-type MutualFundEsgPillarsType from MutualFundEsgPillars
 * @phpstan-type MutualFundAllDataType array{
 *     mutual_fund: array{
 *         summary: MutualFundSummaryDataType,
 *         performance: array{
 *             trailing_returns: list<MutualFundTrailingReturnType>,
 *             annual_total_returns: list<MutualFundAnnualTotalReturnType>,
 *             quarterly_total_returns: list<MutualFundQuarterlyTotalReturnType>,
 *             load_adjusted_return: list<MutualFundLoadAdjustedReturnType>,
 *         },
 *         risk: array{
 *             volatility_measures: list<MutualFundVolatilityMeasureType>,
 *             valuation_metrics: MutualFundValuationMetricsType,
 *         },
 *         ratings: MutualFundRatingsDataType,
 *         composition: array{
 *             major_market_sectors: list<MutualFundSectorType>,
 *             asset_allocation: MutualFundAssetAllocationType,
 *             top_holdings: list<MutualFundHoldingType>,
 *             bond_breakdown: MutualFundBondBreakdownType,
 *         },
 *         purchase_info: array{
 *             expenses: MutualFundExpensesType,
 *             minimums: MutualFundMinimumsType,
 *             pricing: MutualFundPricingType,
 *             brokerages: list<string>,
 *         },
 *         sustainability: array{
 *             score: int|null,
 *             corporate_esg_pillars: MutualFundEsgPillarsType,
 *             sustainable_investment: bool,
 *             corporate_aum: float|null,
 *         },
 *     },
 *     status: string,
 * }
 */
readonly class MutualFundAllData
{
    /**
     * @param list<MutualFundTrailingReturn> $trailingReturns
     * @param list<MutualFundAnnualTotalReturn> $annualTotalReturns
     * @param list<MutualFundQuarterlyTotalReturn> $quarterlyTotalReturns
     * @param list<MutualFundLoadAdjustedReturn> $loadAdjustedReturn
     * @param list<MutualFundVolatilityMeasure> $volatilityMeasures
     * @param list<MutualFundSector> $majorMarketSectors
     * @param list<MutualFundHolding> $topHoldings
     * @param list<string> $brokerages
     */
    public function __construct(
        public MutualFundSummaryData $summary,
        public array $trailingReturns,
        public array $annualTotalReturns,
        public array $quarterlyTotalReturns,
        public array $loadAdjustedReturn,
        public array $volatilityMeasures,
        public MutualFundValuationMetrics $valuationMetrics,
        public MutualFundRatingsData $ratings,
        public array $majorMarketSectors,
        public MutualFundAssetAllocation $assetAllocation,
        public array $topHoldings,
        public MutualFundBondBreakdown $bondBreakdown,
        public MutualFundExpenses $expenses,
        public MutualFundMinimums $minimums,
        public MutualFundPricing $pricing,
        public array $brokerages,
        public ?int $sustainabilityScore,
        public MutualFundEsgPillars $corporateEsgPillars,
        public bool $sustainableInvestment,
        public ?float $corporateAum,
        public string $status,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /** @var MutualFundAllDataType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MutualFundAllDataType $data */
    public static function fromArray(array $data): self
    {
        $mf = $data['mutual_fund'];

        return new self(
            summary: MutualFundSummaryData::fromArray($mf['summary']),
            trailingReturns: array_map(
                fn (array $item): MutualFundTrailingReturn => MutualFundTrailingReturn::fromArray($item),
                $mf['performance']['trailing_returns'],
            ),
            annualTotalReturns: array_map(
                fn (array $item): MutualFundAnnualTotalReturn => MutualFundAnnualTotalReturn::fromArray($item),
                $mf['performance']['annual_total_returns'],
            ),
            quarterlyTotalReturns: array_map(
                fn (array $item): MutualFundQuarterlyTotalReturn => MutualFundQuarterlyTotalReturn::fromArray($item),
                $mf['performance']['quarterly_total_returns'],
            ),
            loadAdjustedReturn: array_map(
                fn (array $item): MutualFundLoadAdjustedReturn => MutualFundLoadAdjustedReturn::fromArray($item),
                $mf['performance']['load_adjusted_return'],
            ),
            volatilityMeasures: array_map(
                fn (array $item): MutualFundVolatilityMeasure => MutualFundVolatilityMeasure::fromArray($item),
                $mf['risk']['volatility_measures'],
            ),
            valuationMetrics: MutualFundValuationMetrics::fromArray($mf['risk']['valuation_metrics']),
            ratings: MutualFundRatingsData::fromArray($mf['ratings']),
            majorMarketSectors: array_map(
                fn (array $item): MutualFundSector => MutualFundSector::fromArray($item),
                $mf['composition']['major_market_sectors'],
            ),
            assetAllocation: MutualFundAssetAllocation::fromArray($mf['composition']['asset_allocation']),
            topHoldings: array_map(
                fn (array $item): MutualFundHolding => MutualFundHolding::fromArray($item),
                $mf['composition']['top_holdings'],
            ),
            bondBreakdown: MutualFundBondBreakdown::fromArray($mf['composition']['bond_breakdown']),
            expenses: MutualFundExpenses::fromArray($mf['purchase_info']['expenses']),
            minimums: MutualFundMinimums::fromArray($mf['purchase_info']['minimums']),
            pricing: MutualFundPricing::fromArray($mf['purchase_info']['pricing']),
            brokerages: $mf['purchase_info']['brokerages'],
            sustainabilityScore: $mf['sustainability']['score'] ?? null,
            corporateEsgPillars: MutualFundEsgPillars::fromArray($mf['sustainability']['corporate_esg_pillars']),
            sustainableInvestment: $mf['sustainability']['sustainable_investment'],
            corporateAum: $mf['sustainability']['corporate_aum'] ?? null,
            status: $data['status'],
        );
    }
}
