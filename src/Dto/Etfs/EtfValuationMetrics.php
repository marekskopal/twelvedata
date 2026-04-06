<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfValuationMetricsType array{
 *     price_to_earnings: float|null,
 *     price_to_book: float|null,
 *     price_to_sales: float|null,
 *     price_to_cashflow: float|null,
 * }
 */
readonly class EtfValuationMetrics
{
    public function __construct(
        public ?float $priceToEarnings,
        public ?float $priceToBook,
        public ?float $priceToSales,
        public ?float $priceToCashflow,
    ) {
    }

    /** @param EtfValuationMetricsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            priceToEarnings: $data['price_to_earnings'] ?? null,
            priceToBook: $data['price_to_book'] ?? null,
            priceToSales: $data['price_to_sales'] ?? null,
            priceToCashflow: $data['price_to_cashflow'] ?? null,
        );
    }
}
