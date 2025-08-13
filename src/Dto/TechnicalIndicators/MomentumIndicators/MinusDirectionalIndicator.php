<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MinusDirectionalIndicatorType array{
 *     datetime: string,
 *     minus_di: string,
 * }
 * @implements ValueInterface<MinusDirectionalIndicator, MinusDirectionalIndicatorType>
 */
readonly class MinusDirectionalIndicator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $minusDi)
    {
    }

    /** @param MinusDirectionalIndicatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            minusDi: $data['minus_di'],
        );
    }
}
