<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-type LastChangesDataType array{
 *     symbol: string,
 *     mic_code: string,
 *     last_change: string,
 * }
 */
readonly class LastChangesData
{
    public function __construct(public string $symbol, public string $micCode, public DateTimeImmutable $lastChange,)
    {
    }

    /** @param LastChangesDataType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            micCode: $data['mic_code'],
            lastChange: new DateTimeImmutable($data['last_change']),
        );
    }
}
