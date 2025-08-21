<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type SquareRootType array{
 *     datetime: string,
 *     sqrt: string,
 * }
 * @implements ValueInterface<SquareRoot, SquareRootType>
 */
readonly class SquareRoot implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $sqrt)
    {
    }

    /** @param SquareRootType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            sqrt: $data['sqrt'],
        );
    }
}
