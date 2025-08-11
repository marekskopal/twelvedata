<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AverageDirectionalIndexType array{
 *     datetime: string,
 *     adx: string,
 * }
 * @implements ValueInterface<AverageDirectionalIndex, AverageDirectionalIndexType>
 */
readonly class AverageDirectionalIndex implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $adx,)
    {
    }

    /** @param AverageDirectionalIndexType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            adx: $data['adx'],
        );
    }
}
