<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type PivotPointsHighLowType array{
 *     datetime: string,
 *     pivot_point_h: int,
 *     pivot_point_l: int,
 * }
 * @implements ValueInterface<PivotPointsHighLow, PivotPointsHighLowType>
 */
readonly class PivotPointsHighLow implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public int $pivotPointH, public int $pivotPointL)
    {
    }

    /** @param PivotPointsHighLowType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            pivotPointH: $data['pivot_point_h'],
            pivotPointL: $data['pivot_point_l'],
        );
    }
}
