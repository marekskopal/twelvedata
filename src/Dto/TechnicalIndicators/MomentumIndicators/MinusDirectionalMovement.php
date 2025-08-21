<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MinusDirectionalMovementType array{
 *     datetime: string,
 *     minus_dm: string,
 * }
 * @implements ValueInterface<MinusDirectionalMovement, MinusDirectionalMovementType>
 */
readonly class MinusDirectionalMovement implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $minusDm)
    {
    }

    /** @param MinusDirectionalMovementType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            minusDm: $data['minus_dm'],
        );
    }
}
