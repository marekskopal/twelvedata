<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type Base10LogarithmType array{
 *     datetime: string,
 *     log10: string,
 * }
 * @implements ValueInterface<Base10Logarithm, Base10LogarithmType>
 */
readonly class Base10Logarithm implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $log10)
    {
    }

    /** @param Base10LogarithmType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            log10: $data['log10'],
        );
    }
}
