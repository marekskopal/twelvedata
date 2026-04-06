<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-import-type EtfSummaryDataType from EtfSummaryData
 * @phpstan-type EtfSummaryType array{
 *     etf: array{summary: EtfSummaryDataType},
 *     status: string,
 * }
 */
readonly class EtfSummary
{
    public function __construct(public EtfSummaryData $summary, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EtfSummaryType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EtfSummaryType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            summary: EtfSummaryData::fromArray($data['etf']['summary']),
            status: $data['status'],
        );
    }
}
