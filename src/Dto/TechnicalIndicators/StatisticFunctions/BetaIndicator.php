<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type BetaIndicatorType array{
 *     datetime: string,
 *     beta: string,
 * }
 * @implements ValueInterface<BetaIndicator, BetaIndicatorType>
 */
readonly class BetaIndicator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $beta)
    {
    }

    /** @param BetaIndicatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            beta: $data['beta'],
        );
    }
}
