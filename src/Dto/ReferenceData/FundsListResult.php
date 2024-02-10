<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class FundsListResult
{
    /** @param list<FundsListList> $list */
    public function __construct(public int $count, public array $list)
    {
    }

    /**
     * @param array{
     *     count: int,
     *     list: list<array{
     *         symbol: string,
     *         name: string,
     *         country: string,
     *         currency: string,
     *         exchange: string,
     *         type: string,
     *     }>,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            count: $data['count'],
            list: array_map(fn (array $item): FundsListList => FundsListList::fromArray($item), $data['list']),
        );
    }
}
