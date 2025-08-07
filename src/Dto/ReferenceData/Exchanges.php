<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type ExchangesDataType from ExchangesData
 * @phpstan-type ExchangesType array{
 *     data: list<ExchangesDataType>,
 *     status: string,
 * }
 */
readonly class Exchanges
{
    /** @param list<ExchangesData> $data */
    public function __construct(public array $data, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var ExchangesType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param ExchangesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(fn (array $item): ExchangesData => ExchangesData::fromArray($item), $data['data']),
            status: $data['status'],
        );
    }
}
