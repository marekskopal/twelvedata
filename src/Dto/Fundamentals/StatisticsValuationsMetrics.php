<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class StatisticsValuationsMetrics
{
    public function __construct(
        public int $marketCapitalization,
        public int $enterpriseValue,
        public ?float $trailingPe,
        public ?float $forwardPe,
        public ?float $pegRatio,
        public ?float $priceToSalesTtm,
        public ?float $priceToBookMrq,
        public ?float $enterpriseToRevenue,
        public ?float $enterpriseToEbitda,
    ) {
    }

    /**
     * @param array{
     *     market_capitalization: int,
     *     enterprise_value: int,
     *     trailing_pe: float|null,
     *     forward_pe: float|null,
     *     peg_ratio: float|null,
     *     price_to_sales_ttm: float|null,
     *     price_to_book_mrq: float|null,
     *     enterprise_to_revenue: float|null,
     *     enterprise_to_ebitda: float|null,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            marketCapitalization: $data['market_capitalization'],
            enterpriseValue: $data['enterprise_value'],
            trailingPe: $data['trailing_pe'],
            forwardPe: $data['forward_pe'],
            pegRatio: $data['peg_ratio'],
            priceToSalesTtm: $data['price_to_sales_ttm'],
            priceToBookMrq: $data['price_to_book_mrq'],
            enterpriseToRevenue: $data['enterprise_to_revenue'],
            enterpriseToEbitda: $data['enterprise_to_ebitda'],
        );
    }
}
