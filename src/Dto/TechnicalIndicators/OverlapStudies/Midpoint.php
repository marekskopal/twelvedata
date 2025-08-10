<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MidpointType array{
 *     datetime: string,
 *     midpoint: string,
 * }
 * @implements ValueInterface<Midpoint, MidpointType>
 */
readonly class Midpoint implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $midpoint)
    {
    }

    /** @param MidpointType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            midpoint: $data['midpoint'],
        );
    }
}
