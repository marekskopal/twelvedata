<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-import-type MutualFundListItemType from MutualFundListItem
 * @phpstan-type MutualFundListResultType array{
 *     count: int,
 *     list: list<MutualFundListItemType>,
 * }
 * @phpstan-type MutualFundListType array{
 *     result: MutualFundListResultType,
 *     status: string,
 * }
 */
readonly class MutualFundList
{
    /** @param list<MutualFundListItem> $list */
    public function __construct(public int $count, public array $list, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var MutualFundListType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param MutualFundListType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            count: $data['result']['count'],
            list: array_map(
                fn (array $item): MutualFundListItem => MutualFundListItem::fromArray($item),
                $data['result']['list'],
            ),
            status: $data['status'],
        );
    }
}
