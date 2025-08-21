<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type OnBalanceVolumeType array{
 *     datetime: string,
 *     obv: string,
 * }
 * @implements ValueInterface<OnBalanceVolume, OnBalanceVolumeType>
 */
readonly class OnBalanceVolume implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $obv)
    {
    }

    /** @param OnBalanceVolumeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            obv: $data['obv'],
        );
    }
}
