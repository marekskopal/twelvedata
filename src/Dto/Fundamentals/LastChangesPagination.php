<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type LastChangesPaginationType array{
 *     current_page: int,
 *     per_page: int,
 * }
 */
readonly class LastChangesPagination
{
    public function __construct(public int $currentPage, public int $perPage,)
    {
    }

    /** @param LastChangesPaginationType $data */
    public static function fromArray(array $data): self
    {
        return new self(currentPage: $data['current_page'], perPage: $data['per_page']);
    }
}
