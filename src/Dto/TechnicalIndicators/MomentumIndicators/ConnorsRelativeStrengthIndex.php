<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type ConnorsRelativeStrengthIndexType array{
 *     datetime: string,
 *     crsi: string,
 * }
 * @implements ValueInterface<ConnorsRelativeStrengthIndex, ConnorsRelativeStrengthIndexType>
 */
readonly class ConnorsRelativeStrengthIndex implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $crsi)
    {
    }

    /** @param ConnorsRelativeStrengthIndexType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            crsi: $data['crsi'],
        );
    }
}
