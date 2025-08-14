<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type WilliamsPercentRType array{
 *     datetime: string,
 *     willr: string,
 * }
 * @implements ValueInterface<WilliamsPercentR, WilliamsPercentRType>
 */
readonly class WilliamsPercentR implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $willr)
    {
    }

    /** @param WilliamsPercentRType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            willr: $data['willr'],
        );
    }
}
