<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-import-type RecommendationsMonthType from RecommendationsMonth
 * @phpstan-type RecommendationsTrendsType array{
 *     current_month: RecommendationsMonthType,
 *     previous_month: RecommendationsMonthType,
 *     "2_months_ago": RecommendationsMonthType,
 *     "3_months_ago": RecommendationsMonthType,
 * }
 */
readonly class RecommendationsTrends
{
    public function __construct(
        public RecommendationsMonth $currentMonth,
        public RecommendationsMonth $previousMonth,
        public RecommendationsMonth $twoMonthsAgo,
        public RecommendationsMonth $threeMonthsAgo,
    ) {
    }

    /** @param RecommendationsTrendsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            currentMonth: RecommendationsMonth::fromArray($data['current_month']),
            previousMonth: RecommendationsMonth::fromArray($data['previous_month']),
            twoMonthsAgo: RecommendationsMonth::fromArray($data['2_months_ago']),
            threeMonthsAgo: RecommendationsMonth::fromArray($data['3_months_ago']),
        );
    }
}
