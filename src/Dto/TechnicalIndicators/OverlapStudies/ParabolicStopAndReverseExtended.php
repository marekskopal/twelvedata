<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type ParabolicStopAndReverseExtendedType array{
 *     datetime: string,
 *     sarext: string,
 * }
 * @implements ValueInterface<ParabolicStopAndReverseExtended, ParabolicStopAndReverseExtendedType>
 */
readonly class ParabolicStopAndReverseExtended implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $sarext)
    {
    }

    /** @param ParabolicStopAndReverseExtendedType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            sarext: $data['sarext'],
        );
    }
}
