<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type ParabolicStopAndReverseType array{
 *     datetime: string,
 *     sar: string,
 * }
 * @implements ValueInterface<ParabolicStopAndReverse, ParabolicStopAndReverseType>
 */
readonly class ParabolicStopAndReverse implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $sar)
    {
    }

    /** @param ParabolicStopAndReverseType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            sar: $data['sar'],
        );
    }
}
