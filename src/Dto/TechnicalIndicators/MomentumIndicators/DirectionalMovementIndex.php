<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type DirectionalMovementIndexType array{
 *     datetime: string,
 *     dx: string,
 * }
 * @implements ValueInterface<DirectionalMovementIndex, DirectionalMovementIndexType>
 */
readonly class DirectionalMovementIndex implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $dx)
    {
    }

    /** @param DirectionalMovementIndexType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            dx: $data['dx'],
        );
    }
}
