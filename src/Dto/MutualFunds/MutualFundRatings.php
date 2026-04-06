<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundRatingsDataType from MutualFundRatingsData
 * @phpstan-type MutualFundRatingsType array{
 *     mutual_fund: array{ratings: MutualFundRatingsDataType},
 *     status: string,
 * }
 */
readonly class MutualFundRatings
{
    public function __construct(public MutualFundRatingsData $ratings, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var MutualFundRatingsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MutualFundRatingsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            ratings: MutualFundRatingsData::fromArray($data['mutual_fund']['ratings']),
            status: $data['status'],
        );
    }
}
