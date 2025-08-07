<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

/**
 * @phpstan-type AccessType array{
 *     global: string,
 *     plan: string,
 * }
 */
readonly class Access
{
    public function __construct(public string $global, public string $plan,)
    {
    }

    /** @param AccessType $data */
    public static function fromArray(array $data): self
    {
        return new self(global: $data['global'], plan: $data['plan']);
    }
}
