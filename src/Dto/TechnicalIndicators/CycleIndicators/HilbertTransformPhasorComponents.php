<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\TechnicalIndicators\CycleIndicators;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\ValueInterface;

/**
 * @phpstan-type HilbertTransformPhasorComponentsType array{
 *     datetime: string,
 *     in_phase: string,
 *     quadrature: string,
 * }
 * @implements ValueInterface<HilbertTransformPhasorComponents, HilbertTransformPhasorComponentsType>
 */
readonly class HilbertTransformPhasorComponents implements ValueInterface
{
    public function __construct(public DateTimeImmutable $datetime, public string $inPhase, public string $quadrature)
    {
    }

    /** @param HilbertTransformPhasorComponentsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            datetime: new DateTimeImmutable($data['datetime']),
            inPhase: $data['in_phase'],
            quadrature: $data['quadrature'],
        );
    }
}
