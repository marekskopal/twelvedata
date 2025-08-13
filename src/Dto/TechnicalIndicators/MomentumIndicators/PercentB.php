<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type PercentBType array{
 *     datetime: string,
 *     percent_b: string,
 * }
 * @implements ValueInterface<PercentB, PercentBType>
 */
readonly class PercentB implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $percentB)
    {
    }

    /** @param PercentBType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            percentB: $data['percent_b'],
        );
    }
}
