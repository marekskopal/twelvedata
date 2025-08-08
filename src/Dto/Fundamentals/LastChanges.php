<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type LastChangesPaginationType from LastChangesPagination
 * @phpstan-import-type LastChangesDataType from LastChangesData
 * @phpstan-type LastChangesType array{
 *     pagination: LastChangesPaginationType,
 *     data: list<LastChangesDataType>,
 * }
 */
readonly class LastChanges
{
    /** @param list<LastChangesData> $data */
    public function __construct(public LastChangesPagination $pagination, public array $data,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var LastChangesType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param LastChangesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            pagination: LastChangesPagination::fromArray($data['pagination']),
            data: array_map(
                static fn(array $item): LastChangesData => LastChangesData::fromArray($item),
                $data['data'],
            ),
        );
    }
}
