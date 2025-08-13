<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type MoneyFlowIndexType array{
 *     datetime: string,
 *     mfi: string,
 * }
 * @implements ValueInterface<MoneyFlowIndex, MoneyFlowIndexType>
 */
readonly class MoneyFlowIndex implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $mfi)
    {
    }

    /** @param MoneyFlowIndexType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            mfi: $data['mfi'],
        );
    }
}
