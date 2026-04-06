<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundSectorType from MutualFundSector
 * @phpstan-import-type MutualFundAssetAllocationType from MutualFundAssetAllocation
 * @phpstan-import-type MutualFundHoldingType from MutualFundHolding
 * @phpstan-import-type MutualFundBondBreakdownType from MutualFundBondBreakdown
 * @phpstan-type MutualFundCompositionDataType array{
 *     major_market_sectors: list<MutualFundSectorType>,
 *     asset_allocation: MutualFundAssetAllocationType,
 *     top_holdings: list<MutualFundHoldingType>,
 *     bond_breakdown: MutualFundBondBreakdownType,
 * }
 * @phpstan-type MutualFundCompositionType array{
 *     mutual_fund: array{composition: MutualFundCompositionDataType},
 *     status: string,
 * }
 */
readonly class MutualFundComposition
{
    /**
     * @param list<MutualFundSector> $majorMarketSectors
     * @param list<MutualFundHolding> $topHoldings
     */
    public function __construct(
        public array $majorMarketSectors,
        public MutualFundAssetAllocation $assetAllocation,
        public array $topHoldings,
        public MutualFundBondBreakdown $bondBreakdown,
        public string $status,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /** @var MutualFundCompositionType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MutualFundCompositionType $data */
    public static function fromArray(array $data): self
    {
        $composition = $data['mutual_fund']['composition'];

        return new self(
            majorMarketSectors: array_map(
                fn (array $item): MutualFundSector => MutualFundSector::fromArray($item),
                $composition['major_market_sectors'],
            ),
            assetAllocation: MutualFundAssetAllocation::fromArray($composition['asset_allocation']),
            topHoldings: array_map(
                fn (array $item): MutualFundHolding => MutualFundHolding::fromArray($item),
                $composition['top_holdings'],
            ),
            bondBreakdown: MutualFundBondBreakdown::fromArray($composition['bond_breakdown']),
            status: $data['status'],
        );
    }
}
