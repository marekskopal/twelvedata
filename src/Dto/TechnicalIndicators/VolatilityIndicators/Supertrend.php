<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type SupertrendType array{
 *     datetime: string,
 *     supertrend: string,
 * }
 * @implements ValueInterface<Supertrend, SupertrendType>
 */
readonly class Supertrend implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $supertrend)
    {
    }

    /** @param SupertrendType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            supertrend: $data['supertrend'],
        );
    }
}
