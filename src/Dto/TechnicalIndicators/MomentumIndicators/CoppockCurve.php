<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type CoppockCurveType array{
 *     datetime: string,
 *     coppock: string,
 * }
 * @implements ValueInterface<CoppockCurve, CoppockCurveType>
 */
readonly class CoppockCurve implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $coppock)
    {
    }

    /** @param CoppockCurveType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            coppock: $data['coppock'],
        );
    }
}
