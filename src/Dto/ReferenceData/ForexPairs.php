<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type ForexPairsDataType from ForexPairsData
 * @phpstan-type ForexPairsType array{
 *     data: list<ForexPairsDataType>,
 *     status: string,
 * }
 */
readonly class ForexPairs
{
    /** @param list<ForexPairsData> $data */
    public function __construct(public array $data, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var ForexPairsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param ForexPairsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(fn (array $item): ForexPairsData => ForexPairsData::fromArray($item), $data['data']),
            status: $data['status'],
        );
    }
}
