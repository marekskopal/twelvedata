<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type RecommendationsTrendsType from RecommendationsTrends
 * @phpstan-type RecommendationsType array{
 *     meta: MetaType,
 *     trends: RecommendationsTrendsType,
 *     rating: float,
 *     status: string,
 * }
 */
readonly class Recommendations
{

    public function __construct(
        public Meta $meta,
        public RecommendationsTrends $trends,
        public float $rating,
        public string $status,
    ) {
    }

    public static function fromJson(string $json): self
    {
        /** @var RecommendationsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param RecommendationsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            trends: RecommendationsTrends::fromArray($data['trends']),
            rating: $data['rating'],
            status: $data['status'],
        );
    }
}
