<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type EarningsEstimateEarningsEstimateType from EarningsEstimateEarningsEstimate
 * @phpstan-type EarningsEstimateType array{
 *     meta: MetaType,
 *     earnings_estimate: list<EarningsEstimateEarningsEstimateType>,
 * }
 */
readonly class EarningsEstimate
{
    /** @param list<EarningsEstimateEarningsEstimate> $earningsEstimate */
    public function __construct(public Meta $meta, public array $earningsEstimate)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EarningsEstimateType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EarningsEstimateType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            earningsEstimate: array_map(
                fn (array $item) => EarningsEstimateEarningsEstimate::fromArray($item),
                $data['earnings_estimate'],
            ),
        );
    }
}
