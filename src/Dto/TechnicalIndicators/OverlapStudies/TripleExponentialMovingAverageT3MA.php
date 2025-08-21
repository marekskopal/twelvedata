<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type TripleExponentialMovingAverageT3MAType array{
 *     datetime: string,
 *     t3ma: string,
 * }
 * @implements ValueInterface<TripleExponentialMovingAverageT3MA, TripleExponentialMovingAverageT3MAType>
 */
readonly class TripleExponentialMovingAverageT3MA implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $t3ma)
    {
    }

    /** @param TripleExponentialMovingAverageT3MAType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            t3ma: $data['t3ma'],
        );
    }
}
