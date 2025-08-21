<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type NaturalLogarithmType array{
 *     datetime: string,
 *     ln: string,
 * }
 * @implements ValueInterface<NaturalLogarithm, NaturalLogarithmType>
 */
readonly class NaturalLogarithm implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $ln)
    {
    }

    /** @param NaturalLogarithmType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            ln: $data['ln'],
        );
    }
}
