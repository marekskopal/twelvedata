<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundListItemType array{
 *     symbol: string,
 *     name: string,
 *     country: string,
 *     fund_family: string,
 *     fund_type: string,
 *     performance_rating: int|null,
 *     risk_rating: int|null,
 *     currency: string,
 *     exchange: string,
 *     mic_code: string,
 * }
 */
readonly class MutualFundListItem
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $country,
        public string $fundFamily,
        public string $fundType,
        public ?int $performanceRating,
        public ?int $riskRating,
        public string $currency,
        public string $exchange,
        public string $micCode,
    ) {
    }

    /** @param MutualFundListItemType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            country: $data['country'],
            fundFamily: $data['fund_family'],
            fundType: $data['fund_type'],
            performanceRating: $data['performance_rating'] ?? null,
            riskRating: $data['risk_rating'] ?? null,
            currency: $data['currency'],
            exchange: $data['exchange'],
            micCode: $data['mic_code'],
        );
    }
}
