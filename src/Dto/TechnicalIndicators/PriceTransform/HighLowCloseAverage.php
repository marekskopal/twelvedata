<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type HighLowCloseAverageType array{
 *     datetime: string,
 *     hlc3: string,
 * }
 * @implements ValueInterface<HighLowCloseAverage, HighLowCloseAverageType>
 */
readonly class HighLowCloseAverage implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $hlc3)
    {
    }

    /** @param HighLowCloseAverageType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            hlc3: $data['hlc3'],
        );
    }
}
