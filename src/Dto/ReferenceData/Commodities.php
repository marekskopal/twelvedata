<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type CommoditiesDataType from CommoditiesData
 * @phpstan-type CommoditiesType array{
 *     data: list<CommoditiesDataType>,
 *     status: string,
 * }
 */
readonly class Commodities
{
    /** @param list<CommoditiesData> $data */
    public function __construct(public array $data, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var CommoditiesType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param CommoditiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(fn (array $item): CommoditiesData => CommoditiesData::fromArray($item), $data['data']),
            status: $data['status'],
        );
    }
}
