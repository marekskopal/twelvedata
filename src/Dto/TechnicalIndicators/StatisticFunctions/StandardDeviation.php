<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type StandardDeviationType array{
 *     datetime: string,
 *     stddev: string,
 * }
 * @implements ValueInterface<StandardDeviation, StandardDeviationType>
 */
readonly class StandardDeviation implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $stddev)
    {
    }

    /** @param StandardDeviationType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            stddev: $data['stddev'],
        );
    }
}
