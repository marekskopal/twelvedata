<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type PlusDirectionalIndicatorType array{
 *     datetime: string,
 *     plus_di: string,
 * }
 * @implements ValueInterface<PlusDirectionalIndicator, PlusDirectionalIndicatorType>
 */
readonly class PlusDirectionalIndicator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $plusDi)
    {
    }

    /** @param PlusDirectionalIndicatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            plusDi: $data['plus_di'],
        );
    }
}
