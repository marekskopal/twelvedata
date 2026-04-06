<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\MutualFunds;

/**
 * @phpstan-type MutualFundPersonType array{
 *     name: string,
 *     tenure_since: string,
 * }
 */
readonly class MutualFundPerson
{
    public function __construct(public string $name, public string $tenureSince,)
    {
    }

    /** @param MutualFundPersonType $data */
    public static function fromArray(array $data): self
    {
        return new self(name: $data['name'], tenureSince: $data['tenure_since']);
    }
}
