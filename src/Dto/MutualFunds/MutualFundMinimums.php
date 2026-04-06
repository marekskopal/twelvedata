<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundMinimumsType array{
 *     initial_investment: float|null,
 *     additional_investment: float|null,
 *     initial_ira_investment: float|null,
 *     additional_ira_investment: float|null,
 * }
 */
readonly class MutualFundMinimums
{
    public function __construct(
        public ?float $initialInvestment,
        public ?float $additionalInvestment,
        public ?float $initialIraInvestment,
        public ?float $additionalIraInvestment,
    ) {
    }

    /** @param MutualFundMinimumsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            initialInvestment: $data['initial_investment'] ?? null,
            additionalInvestment: $data['additional_investment'] ?? null,
            initialIraInvestment: $data['initial_ira_investment'] ?? null,
            additionalIraInvestment: $data['additional_ira_investment'] ?? null,
        );
    }
}
