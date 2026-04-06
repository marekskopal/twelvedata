<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundLoadAdjustedReturnType array{
 *     period: string,
 *     return: float|null,
 * }
 */
readonly class MutualFundLoadAdjustedReturn
{
    public function __construct(public string $period, public ?float $return,)
    {
    }

    /** @param MutualFundLoadAdjustedReturnType $data */
    public static function fromArray(array $data): self
    {
        return new self(period: $data['period'], return: $data['return'] ?? null);
    }
}
