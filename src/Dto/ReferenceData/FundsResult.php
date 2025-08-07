<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-import-type FundsResultListType from FundsResultList
 * @phpstan-type FundsResultType array{
 *     count: int,
 *     list: list<FundsResultListType>,
 * }
 */
readonly class FundsResult
{
    /** @param list<FundsResultList> $list */
    public function __construct(public int $count, public array $list)
    {
    }

    /** @param FundsResultType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            count: $data['count'],
            list: array_map(fn (array $item): FundsResultList => FundsResultList::fromArray($item), $data['list']),
        );
    }
}
