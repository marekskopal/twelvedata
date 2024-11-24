<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class CrossListingsResult
{
    /** @param list<CrossListingsList> $list */
    public function __construct(public int $count, public array $list)
    {
    }

    /**
     * @param array{
     *     count: int,
     *     list: list<array{
     *         symbol: string,
     *         name: string,
     *         exchange: string,
     *         mic_code: string,
     *     }>,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            count: $data['count'],
            list: array_map(fn (array $item): CrossListingsList => CrossListingsList::fromArray($item), $data['list']),
        );
    }
}
