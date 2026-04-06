<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfAnnualTotalReturnType array{
 *     year: int,
 *     share_class_return: float|null,
 *     category_return: float|null,
 * }
 */
readonly class EtfAnnualTotalReturn
{
    public function __construct(public int $year, public ?float $shareClassReturn, public ?float $categoryReturn,)
    {
    }

    /** @param EtfAnnualTotalReturnType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            year: $data['year'],
            shareClassReturn: $data['share_class_return'] ?? null,
            categoryReturn: $data['category_return'] ?? null,
        );
    }
}
