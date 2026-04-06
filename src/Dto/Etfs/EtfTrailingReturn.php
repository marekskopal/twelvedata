<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfTrailingReturnType array{
 *     period: string,
 *     share_class_return: float|null,
 *     category_return: float|null,
 * }
 */
readonly class EtfTrailingReturn
{
    public function __construct(public string $period, public ?float $shareClassReturn, public ?float $categoryReturn,)
    {
    }

    /** @param EtfTrailingReturnType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            period: $data['period'],
            shareClassReturn: $data['share_class_return'] ?? null,
            categoryReturn: $data['category_return'] ?? null,
        );
    }
}
