<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-import-type EtfSectorType from EtfSector
 * @phpstan-import-type EtfCountryAllocationType from EtfCountryAllocation
 * @phpstan-import-type EtfAssetAllocationType from EtfAssetAllocation
 * @phpstan-import-type EtfHoldingType from EtfHolding
 * @phpstan-import-type EtfBondBreakdownType from EtfBondBreakdown
 * @phpstan-type EtfCompositionDataType array{
 *     major_market_sectors: list<EtfSectorType>,
 *     country_allocation: list<EtfCountryAllocationType>,
 *     asset_allocation: EtfAssetAllocationType,
 *     top_holdings: list<EtfHoldingType>,
 *     bond_breakdown: EtfBondBreakdownType,
 * }
 * @phpstan-type EtfCompositionType array{
 *     etf: array{composition: EtfCompositionDataType},
 *     status: string,
 * }
 */
readonly class EtfComposition
{
    /**
     * @param list<EtfSector> $majorMarketSectors
     * @param list<EtfCountryAllocation> $countryAllocation
     * @param list<EtfHolding> $topHoldings
     */
    public function __construct(
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
        /** @var EtfCompositionType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EtfCompositionType $data */
    public static function fromArray(array $data): self
    {
        $composition = $data['etf']['composition'];

        return new self(
            majorMarketSectors: array_map(
                fn (array $item): EtfSector => EtfSector::fromArray($item),
                $composition['major_market_sectors'],
            ),
            countryAllocation: array_map(
                fn (array $item): EtfCountryAllocation => EtfCountryAllocation::fromArray($item),
                $composition['country_allocation'],
            ),
            assetAllocation: EtfAssetAllocation::fromArray($composition['asset_allocation']),
            topHoldings: array_map(
                fn (array $item): EtfHolding => EtfHolding::fromArray($item),
                $composition['top_holdings'],
            ),
            bondBreakdown: EtfBondBreakdown::fromArray($composition['bond_breakdown']),
            status: $data['status'],
        );
    }
}
