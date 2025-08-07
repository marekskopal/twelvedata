<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

use DateTimeImmutable;

/**
 * @phpstan-type SanctionedEntitiesSanctionSanctionListType array{
 *     name: string,
 *     published_at: string,
 * }
 */
readonly class SanctionedEntitiesSanctionSanctionList
{
    public function __construct(public string $name, public DateTimeImmutable $publishedAt,)
    {
    }

    /** @param SanctionedEntitiesSanctionSanctionListType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            publishedAt: new DateTimeImmutable($data['published_at']),
        );
    }
}
