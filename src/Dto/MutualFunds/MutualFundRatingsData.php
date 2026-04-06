<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundRatingsDataType array{
 *     performance_rating: int|null,
 *     risk_rating: int|null,
 *     return_rating: int|null,
 * }
 */
readonly class MutualFundRatingsData
{
    public function __construct(public ?int $performanceRating, public ?int $riskRating, public ?int $returnRating,)
    {
    }

    /** @param MutualFundRatingsDataType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            performanceRating: $data['performance_rating'] ?? null,
            riskRating: $data['risk_rating'] ?? null,
            returnRating: $data['return_rating'] ?? null,
        );
    }
}
