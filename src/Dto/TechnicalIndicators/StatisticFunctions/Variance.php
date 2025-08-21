<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type VarianceType array{
 *     datetime: string,
 *     var: string,
 * }
 * @implements ValueInterface<Variance, VarianceType>
 */
readonly class Variance implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $var)
    {
    }

    /** @param VarianceType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            var: $data['var'],
        );
    }
}
