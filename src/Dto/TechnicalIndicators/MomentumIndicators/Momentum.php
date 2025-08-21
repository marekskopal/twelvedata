<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MomentumType array{
 *     datetime: string,
 *     mom: string,
 * }
 * @implements ValueInterface<Momentum, MomentumType>
 */
readonly class Momentum implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $mom)
    {
    }

    /** @param MomentumType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            mom: $data['mom'],
        );
    }
}
