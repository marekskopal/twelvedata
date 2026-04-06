<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundEsgPillarsType array{
 *     environmental: float|null,
 *     social: float|null,
 *     governance: float|null,
 * }
 */
readonly class MutualFundEsgPillars
{
    public function __construct(public ?float $environmental, public ?float $social, public ?float $governance,)
    {
    }

    /** @param MutualFundEsgPillarsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            environmental: $data['environmental'] ?? null,
            social: $data['social'] ?? null,
            governance: $data['governance'] ?? null,
        );
    }
}
