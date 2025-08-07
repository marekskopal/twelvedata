<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type StocksDataType from StocksData
 * @phpstan-type StocksType array{
 *     data: list<StocksDataType>,
 *     status: string,
 * }
 */
readonly class Stocks
{
    /** @param list<StocksData> $data */
    public function __construct(public array $data, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var StocksType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param StocksType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(fn (array $item): StocksData => StocksData::fromArray($item), $data['data']),
            status: $data['status'],
        );
    }
}
