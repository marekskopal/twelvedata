<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type TripleExponentialMovingAverageTEMAType array{
 *     datetime: string,
 *     tema: string,
 * }
 * @implements ValueInterface<TripleExponentialMovingAverageTEMA, TripleExponentialMovingAverageTEMAType>
 */
readonly class TripleExponentialMovingAverageTEMA implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $tema)
    {
    }

    /** @param TripleExponentialMovingAverageTEMAType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            tema: $data['tema'],
        );
    }
}
