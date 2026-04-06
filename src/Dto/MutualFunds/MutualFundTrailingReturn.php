<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundTrailingReturnType array{
 *     period: string,
 *     share_class_return: float|null,
 *     category_return: float|null,
 *     rank_in_category: int|null,
 * }
 */
readonly class MutualFundTrailingReturn
{
    public function __construct(
        public string $period,
        public ?float $shareClassReturn,
        public ?float $categoryReturn,
        public ?int $rankInCategory,
    ) {
    }

    /** @param MutualFundTrailingReturnType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            period: $data['period'],
            shareClassReturn: $data['share_class_return'] ?? null,
            categoryReturn: $data['category_return'] ?? null,
            rankInCategory: $data['rank_in_category'] ?? null,
        );
    }
}
