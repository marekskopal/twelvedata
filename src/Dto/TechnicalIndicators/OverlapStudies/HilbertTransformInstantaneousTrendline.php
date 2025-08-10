<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type HilbertTransformInstantaneousTrendlineType array{
 *     datetime: string,
 *     ht_trendline: string,
 * }
 * @implements ValueInterface<HilbertTransformInstantaneousTrendline, HilbertTransformInstantaneousTrendlineType>
 */
readonly class HilbertTransformInstantaneousTrendline implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $htTrendline)
    {
    }

    /** @param HilbertTransformInstantaneousTrendlineType $data */
    public static function fromArray(array $data): self
    {
        return new self(datetime: new DateTimeImmutable($data['datetime']), htTrendline: $data['ht_trendline']);
    }
}
