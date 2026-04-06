<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundVolatilityMeasureType array{
 *     period: string,
 *     alpha: float|null,
 *     alpha_category: float|null,
 *     beta: float|null,
 *     beta_category: float|null,
 *     mean_annual_return: float|null,
 *     mean_annual_return_category: float|null,
 *     r_squared: float|null,
 *     r_squared_category: float|null,
 *     std: float|null,
 *     std_category: float|null,
 *     sharpe_ratio: float|null,
 *     sharpe_ratio_category: float|null,
 *     treynor_ratio: float|null,
 *     treynor_ratio_category: float|null,
 * }
 */
readonly class MutualFundVolatilityMeasure
{
    public function __construct(
        public string $period,
        public ?float $alpha,
        public ?float $alphaCategory,
        public ?float $beta,
        public ?float $betaCategory,
        public ?float $meanAnnualReturn,
        public ?float $meanAnnualReturnCategory,
        public ?float $rSquared,
        public ?float $rSquaredCategory,
        public ?float $std,
        public ?float $stdCategory,
        public ?float $sharpeRatio,
        public ?float $sharpeRatioCategory,
        public ?float $treynorRatio,
        public ?float $treynorRatioCategory,
    ) {
    }

    /** @param MutualFundVolatilityMeasureType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            period: $data['period'],
            alpha: $data['alpha'] ?? null,
            alphaCategory: $data['alpha_category'] ?? null,
            beta: $data['beta'] ?? null,
            betaCategory: $data['beta_category'] ?? null,
            meanAnnualReturn: $data['mean_annual_return'] ?? null,
            meanAnnualReturnCategory: $data['mean_annual_return_category'] ?? null,
            rSquared: $data['r_squared'] ?? null,
            rSquaredCategory: $data['r_squared_category'] ?? null,
            std: $data['std'] ?? null,
            stdCategory: $data['std_category'] ?? null,
            sharpeRatio: $data['sharpe_ratio'] ?? null,
            sharpeRatioCategory: $data['sharpe_ratio_category'] ?? null,
            treynorRatio: $data['treynor_ratio'] ?? null,
            treynorRatioCategory: $data['treynor_ratio_category'] ?? null,
        );
    }
}
