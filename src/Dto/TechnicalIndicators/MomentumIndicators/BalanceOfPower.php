<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type BalanceOfPowerType array{
 *     datetime: string,
 *     bop: string,
 * }
 * @implements ValueInterface<BalanceOfPower, BalanceOfPowerType>
 */
readonly class BalanceOfPower implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $bop)
    {
    }

    /** @param BalanceOfPowerType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            bop: $data['bop'],
        );
    }
}
