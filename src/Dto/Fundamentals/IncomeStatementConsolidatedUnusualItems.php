<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedUnusualItemsType array{
 *     total_unusual_items: int,
 *     total_unusual_items_excluding_goodwill: int,
 * }
 */
readonly class IncomeStatementConsolidatedUnusualItems
{
    public function __construct(public int $totalUnusualItems, public int $totalUnusualItemsExcludingGoodwill,)
    {
    }

    /** @param IncomeStatementConsolidatedUnusualItemsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            totalUnusualItems: $data['total_unusual_items'],
            totalUnusualItemsExcludingGoodwill: $data['total_unusual_items_excluding_goodwill'],
        );
    }
}
