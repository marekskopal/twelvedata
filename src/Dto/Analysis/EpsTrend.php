<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type EpsTrendEpsTrendType from EpsTrendEpsTrend
 * @phpstan-type EpsTrendType array{
 *     meta: MetaType,
 *     eps_trend: list<EpsTrendEpsTrendType>,
 *     status: string,
 * }
 */
readonly class EpsTrend
{
    /** @param list<EpsTrendEpsTrend> $epsTrend */
    public function __construct(public Meta $meta, public array $epsTrend, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EpsTrendType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EpsTrendType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            epsTrend: array_map(
                fn (array $item) => EpsTrendEpsTrend::fromArray($item),
                $data['eps_trend'],
            ),
            status: $data['status'],
        );
    }
}
