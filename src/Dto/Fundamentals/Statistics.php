<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type StatisticsStatisticsType from StatisticsStatistics
 * @phpstan-type StatisticsType array{
 *     meta: MetaType,
 *     statistics: StatisticsStatisticsType,
 * }
 */
readonly class Statistics
{
    public function __construct(public Meta $meta, public StatisticsStatistics $statistics)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var StatisticsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param StatisticsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            statistics: StatisticsStatistics::fromArray($data['statistics']),
        );
    }
}
