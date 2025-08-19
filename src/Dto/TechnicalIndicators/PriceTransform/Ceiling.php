<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type CeilingType array{
 *     datetime: string,
 *     ceil: string,
 * }
 * @implements ValueInterface<Ceiling, CeilingType>
 */
readonly class Ceiling implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $ceil)
    {
    }

    /** @param CeilingType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            ceil: $data['ceil'],
        );
    }
}
