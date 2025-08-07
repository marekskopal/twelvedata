<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type BondsResultListType from BondsResultList
 * @phpstan-type BondsResultType array{
 *     count: int,
 *     list: list<BondsResultListType>,
 * }
 */
readonly class BondsResult
{
    /** @param list<BondsResultList> $list */
    public function __construct(public int $count, public array $list)
    {
    }

    /** @param BondsResultType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            count: $data['count'],
            list: array_map(fn (array $item): BondsResultList => BondsResultList::fromArray($item), $data['list']),
        );
    }
}
