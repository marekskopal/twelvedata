<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type EtfsDataType from EtfsData
 * @phpstan-type EtfsType array{
 *     data: list<EtfsDataType>,
 *     status: string,
 * }
 */
readonly class Etfs
{
    /** @param list<EtfsData> $data */
    public function __construct(public array $data, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EtfsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EtfsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(fn (array $item): EtfsData => EtfsData::fromArray($item), $data['data']),
            status: $data['status'],
        );
    }
}
