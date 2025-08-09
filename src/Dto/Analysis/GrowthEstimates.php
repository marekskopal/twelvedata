<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type GrowthEstimatesGrowthEstimatesType from GrowthEstimatesGrowthEstimates
 * @phpstan-type GrowthEstimatesType array{
 *     meta: MetaType,
 *     growth_estimates: GrowthEstimatesGrowthEstimatesType,
 *     status: string,
 * }
 */
readonly class GrowthEstimates
{
    public function __construct(public Meta $meta, public GrowthEstimatesGrowthEstimates $growthEstimates, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var GrowthEstimatesType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param GrowthEstimatesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            growthEstimates: GrowthEstimatesGrowthEstimates::fromArray($data['growth_estimates']),
            status: $data['status'],
        );
    }
}
