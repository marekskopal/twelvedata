<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type AnalystRatingsUsEquitiesRatingType from AnalystRatingsUsEquitiesRating
 * @phpstan-type AnalystRatingsUsEquitiesType array{
 *     meta: MetaType,
 *     ratings: list<AnalystRatingsUsEquitiesRatingType>,
 *     status: string,
 * }
 */
readonly class AnalystRatingsUsEquities
{
    /** @param list<AnalystRatingsUsEquitiesRating> $ratings */
    public function __construct(public Meta $meta, public array $ratings, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var AnalystRatingsUsEquitiesType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param AnalystRatingsUsEquitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            ratings: array_map(
                fn (array $item) => AnalystRatingsUsEquitiesRating::fromArray($item),
                $data['ratings'],
            ),
            status: $data['status'],
        );
    }
}
