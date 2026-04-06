<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundValuationMetricsType array{
 *     price_to_earnings: float|null,
 *     price_to_earnings_category: float|null,
 *     price_to_book: float|null,
 *     price_to_book_category: float|null,
 *     price_to_sales: float|null,
 *     price_to_sales_category: float|null,
 *     price_to_cashflow: float|null,
 *     price_to_cashflow_category: float|null,
 *     median_market_capitalization: float|null,
 *     median_market_capitalization_category: float|null,
 *     '3_year_earnings_growth': float|null,
 *     '3_year_earnings_growths_category': float|null,
 * }
 */
readonly class MutualFundValuationMetrics
{
    public function __construct(
        public ?float $priceToEarnings,
        public ?float $priceToEarningsCategory,
        public ?float $priceToBook,
        public ?float $priceToBookCategory,
        public ?float $priceToSales,
        public ?float $priceToSalesCategory,
        public ?float $priceToCashflow,
        public ?float $priceToCashflowCategory,
        public ?float $medianMarketCapitalization,
        public ?float $medianMarketCapitalizationCategory,
        public ?float $threeYearEarningsGrowth,
        public ?float $threeYearEarningsGrowthsCategory,
    ) {
    }

    /** @param MutualFundValuationMetricsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            priceToEarnings: $data['price_to_earnings'] ?? null,
            priceToEarningsCategory: $data['price_to_earnings_category'] ?? null,
            priceToBook: $data['price_to_book'] ?? null,
            priceToBookCategory: $data['price_to_book_category'] ?? null,
            priceToSales: $data['price_to_sales'] ?? null,
            priceToSalesCategory: $data['price_to_sales_category'] ?? null,
            priceToCashflow: $data['price_to_cashflow'] ?? null,
            priceToCashflowCategory: $data['price_to_cashflow_category'] ?? null,
            medianMarketCapitalization: $data['median_market_capitalization'] ?? null,
            medianMarketCapitalizationCategory: $data['median_market_capitalization_category'] ?? null,
            threeYearEarningsGrowth: $data['3_year_earnings_growth'] ?? null,
            threeYearEarningsGrowthsCategory: $data['3_year_earnings_growths_category'] ?? null,
        );
    }
}
