<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-import-type EtfListItemType from EtfListItem
 * @phpstan-type EtfListResultType array{
 *     count: int,
 *     list: list<EtfListItemType>,
 * }
 * @phpstan-type EtfListType array{
 *     result: EtfListResultType,
 *     status: string,
 * }
 */
readonly class EtfList
{
    /** @param list<EtfListItem> $list */
    public function __construct(public int $count, public array $list, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EtfListType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EtfListType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            count: $data['result']['count'],
            list: array_map(
                fn (array $item): EtfListItem => EtfListItem::fromArray($item),
                $data['result']['list'],
            ),
            status: $data['status'],
        );
    }
}
