<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type RateOfChangeType array{
 *     datetime: string,
 *     roc: string,
 * }
 * @implements ValueInterface<RateOfChange, RateOfChangeType>
 */
readonly class RateOfChange implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $roc)
    {
    }

    /** @param RateOfChangeType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            roc: $data['roc'],
        );
    }
}
