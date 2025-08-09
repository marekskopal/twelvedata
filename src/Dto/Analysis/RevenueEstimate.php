<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type RevenueEstimateRevenueEstimateType from RevenueEstimateRevenueEstimate
 * @phpstan-type RevenueEstimateType array{
 *     meta: MetaType,
 *     revenue_estimate: list<RevenueEstimateRevenueEstimateType>,
 *     status: string,
 * }
 */
readonly class RevenueEstimate
{
    /** @param list<RevenueEstimateRevenueEstimate> $revenueEstimate */
    public function __construct(public Meta $meta, public array $revenueEstimate, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var RevenueEstimateType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param RevenueEstimateType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            revenueEstimate: array_map(
                fn (array $item) => RevenueEstimateRevenueEstimate::fromArray($item),
                $data['revenue_estimate'],
            ),
            status: $data['status'],
        );
    }
}
