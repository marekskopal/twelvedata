<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type CryptocurrencyPairsDataType from CryptocurrencyPairsData
 * @phpstan-type CryptocurrencyPairsType array{
 *     data: list<CryptocurrencyPairsDataType>,
 *     status: string,
 * }
 */
readonly class CryptocurrencyPairs
{
    /** @param list<CryptocurrencyPairsData> $data */
    public function __construct(public array $data, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var CryptocurrencyPairsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param CryptocurrencyPairsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(fn (array $item): CryptocurrencyPairsData => CryptocurrencyPairsData::fromArray($item), $data['data']),
            status: $data['status'],
        );
    }
}
