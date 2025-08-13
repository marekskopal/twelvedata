<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type RateOfChangeRatio100Type array{
 *     datetime: string,
 *     rocr100: string,
 * }
 * @implements ValueInterface<RateOfChangeRatio100, RateOfChangeRatio100Type>
 */
readonly class RateOfChangeRatio100 implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $rocr100)
    {
    }

    /** @param RateOfChangeRatio100Type $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            rocr100: $data['rocr100'],
        );
    }
}
