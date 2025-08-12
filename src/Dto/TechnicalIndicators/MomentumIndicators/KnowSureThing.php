<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type KnowSureThingType array{
 *     datetime: string,
 *     kst: string,
 *     kst_signal: string,
 * }
 * @implements ValueInterface<KnowSureThing, KnowSureThingType>
 */
readonly class KnowSureThing implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $kst, public string $kstSignal,)
    {
    }

    /** @param KnowSureThingType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            kst: $data['kst'],
            kstSignal: $data['kst_signal'],
        );
    }
}
