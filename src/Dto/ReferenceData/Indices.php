<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type IndicesDataType from IndicesData
 * @phpstan-type IndicesType array{
 *     data: list<IndicesDataType>,
 *     status: string,
 * }
 */
readonly class Indices
{
    /** @param list<IndicesData> $data */
    public function __construct(public array $data, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var IndicesType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param IndicesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(fn (array $item): IndicesData => IndicesData::fromArray($item), $data['data']),
            status: $data['status'],
        );
    }
}
