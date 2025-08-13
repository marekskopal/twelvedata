<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type PlusDirectionalMovementType array{
 *     datetime: string,
 *     plus_dm: string,
 * }
 * @implements ValueInterface<PlusDirectionalMovement, PlusDirectionalMovementType>
 */
readonly class PlusDirectionalMovement implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $plusDm)
    {
    }

    /** @param PlusDirectionalMovementType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            plusDm: $data['plus_dm'],
        );
    }
}
