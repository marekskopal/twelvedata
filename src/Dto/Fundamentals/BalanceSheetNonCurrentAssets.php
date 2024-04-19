<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

class BalanceSheetNonCurrentAssets
{
    public function __construct(
        public ?int $properties,
        public ?int $landAndImprovements,
        public ?int $machineryFurnitureEquipment,
        public ?int $constructionInProgress,
        public ?int $leases,
        public ?int $accumulatedDepreciation,
        public ?int $goodwill,
        public ?int $investmentProperties,
        public ?int $financialAssets,
        public ?int $intangibleAssets,
        public ?int $investmentsAndAdvances,
        public ?int $otherNonCurrentAssets,
        public ?int $totalNonCurrentAssets,
    ) {
    }

    /**
     * @param array{
     *     properties: int|null,
     *     land_and_improvements: int|null,
     *     machinery_furniture_equipment:int|null,
     *     construction_in_progress:int|null,
     *     leases:int|null,
     *     accumulated_depreciation:int|null,
     *     goodwill:int|null,
     *     investment_properties:int|null,
     *     financial_assets:int|null,
     *     intangible_assets:int|null,
     *     investments_and_advances:int|null,
     *     other_non_current_assets:int|null,
     *     total_non_current_assets:int|null,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            properties: $data['properties'],
            landAndImprovements: $data['land_and_improvements'],
            machineryFurnitureEquipment: $data['machinery_furniture_equipment'],
            constructionInProgress: $data['construction_in_progress'],
            leases: $data['leases'],
            accumulatedDepreciation: $data['accumulated_depreciation'],
            goodwill: $data['goodwill'],
            investmentProperties: $data['investment_properties'],
            financialAssets: $data['financial_assets'],
            intangibleAssets: $data['intangible_assets'],
            investmentsAndAdvances: $data['investments_and_advances'],
            otherNonCurrentAssets: $data['other_non_current_assets'],
            totalNonCurrentAssets: $data['total_non_current_assets'],
        );
    }
}
