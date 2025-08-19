<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type ExponentialType array{
 *     datetime: string,
 *     exp: string,
 * }
 * @implements ValueInterface<Exponential, ExponentialType>
 */
readonly class Exponential implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $exp)
    {
    }

    /** @param ExponentialType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            exp: $data['exp'],
        );
    }
}
