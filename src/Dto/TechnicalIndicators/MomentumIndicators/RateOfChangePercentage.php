<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type RateOfChangePercentageType array{
 *     datetime: string,
 *     rocp: string,
 * }
 * @implements ValueInterface<RateOfChangePercentage, RateOfChangePercentageType>
 */
readonly class RateOfChangePercentage implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $rocp)
    {
    }

    /** @param RateOfChangePercentageType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            rocp: $data['rocp'],
        );
    }
}
