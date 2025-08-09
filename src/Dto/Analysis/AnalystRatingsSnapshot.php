<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type AnalystRatingsSnapshotRatingType from AnalystRatingsSnapshotRating
 * @phpstan-type AnalystRatingsSnapshotType array{
 *     meta: MetaType,
 *     ratings: list<AnalystRatingsSnapshotRatingType>,
 *     status: string,
 * }
 */
readonly class AnalystRatingsSnapshot
{
    /** @param list<AnalystRatingsSnapshotRating> $ratings */
    public function __construct(public Meta $meta, public array $ratings, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var AnalystRatingsSnapshotType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param AnalystRatingsSnapshotType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            ratings: array_map(
                fn (array $item) => AnalystRatingsSnapshotRating::fromArray($item),
                $data['ratings'],
            ),
            status: $data['status'],
        );
    }
}
