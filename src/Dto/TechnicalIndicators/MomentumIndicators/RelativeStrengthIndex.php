<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type RelativeStrengthIndexType array{
 *     datetime: string,
 *     rsi: string,
 * }
 * @implements ValueInterface<RelativeStrengthIndex, RelativeStrengthIndexType>
 */
readonly class RelativeStrengthIndex implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $rsi)
    {
    }

    /** @param RelativeStrengthIndexType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            rsi: $data['rsi'],
        );
    }
}
