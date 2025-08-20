<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type CorrelationType array{
 *     datetime: string,
 *     correl: string,
 * }
 * @implements ValueInterface<Correlation, CorrelationType>
 */
readonly class Correlation implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $correl)
    {
    }

    /** @param CorrelationType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            correl: $data['correl'],
        );
    }
}
