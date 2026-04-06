<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundSummaryDataType from MutualFundSummaryData
 * @phpstan-type MutualFundSummaryType array{
 *     mutual_fund: array{summary: MutualFundSummaryDataType},
 *     status: string,
 * }
 */
readonly class MutualFundSummary
{
    public function __construct(public MutualFundSummaryData $summary, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var MutualFundSummaryType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MutualFundSummaryType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            summary: MutualFundSummaryData::fromArray($data['mutual_fund']['summary']),
            status: $data['status'],
        );
    }
}
