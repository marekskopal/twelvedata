<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type AroonIndicatorType array{
 *     datetime: string,
 *     aroon_up: string,
 * }
 * @implements ValueInterface<AroonIndicator, AroonIndicatorType>
 */
readonly class AroonIndicator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $aroonUp)
    {
    }

    /** @param AroonIndicatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            aroonUp: $data['aroon_up'],
        );
    }
}
