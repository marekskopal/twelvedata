<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type RelativeVolumeType array{
 *     datetime: string,
 *     rvol: string,
 * }
 * @implements ValueInterface<RelativeVolume, RelativeVolumeType>
 */
readonly class RelativeVolume implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $rvol)
    {
    }

    /** @param RelativeVolumeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            rvol: $data['rvol'],
        );
    }
}
