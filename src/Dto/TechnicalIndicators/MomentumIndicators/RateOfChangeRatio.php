<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type RateOfChangeRatioType array{
 *     datetime: string,
 *     rocr: string,
 * }
 * @implements ValueInterface<RateOfChangeRatio, RateOfChangeRatioType>
 */
readonly class RateOfChangeRatio implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $rocr)
    {
    }

    /** @param RateOfChangeRatioType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            rocr: $data['rocr'],
        );
    }
}
