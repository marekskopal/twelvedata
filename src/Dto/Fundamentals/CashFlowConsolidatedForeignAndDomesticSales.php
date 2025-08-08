<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type CashFlowConsolidatedForeignAndDomesticSalesType array{
 *     foreign_sales: int,
 *     domestic_sales: int,
 *     adjusted_geography_segment_data: int,
 * }
 */
readonly class CashFlowConsolidatedForeignAndDomesticSales
{
    public function __construct(public int $foreignSales, public int $domesticSales, public int $adjustedGeographySegmentData,)
    {
    }

    /** @param CashFlowConsolidatedForeignAndDomesticSalesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            foreignSales: $data['foreign_sales'],
            domesticSales: $data['domestic_sales'],
            adjustedGeographySegmentData: $data['adjusted_geography_segment_data'],
        );
    }
}
