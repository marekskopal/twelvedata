<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type McGinleyDynamicIndicatorType array{
 *     datetime: string,
 *     mcginley_dynamic: string,
 * }
 * @implements ValueInterface<McGinleyDynamicIndicator, McGinleyDynamicIndicatorType>
 */
readonly class McGinleyDynamicIndicator implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $mcginleyDynamic)
    {
    }

    /** @param McGinleyDynamicIndicatorType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            mcginleyDynamic: $data['mcginley_dynamic'],
        );
    }
}
