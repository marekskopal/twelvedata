<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

use DateTimeImmutable;

readonly class EarningsEarning
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $time,
        public ?float $epsEstimate,
        public ?float $epsActual,
        public ?float $difference,
        public ?float $surprisePrc,
    ) {
    }

    /**
     * @param array{
     *     date: string,
     *     time: string,
     *     eps_estimate: float|null,
     *     eps_actual: float|null,
     *     difference: float|null,
     *     surprise_prc: float|null,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            time: $data['time'],
            epsEstimate: $data['eps_estimate'],
            epsActual: $data['eps_actual'],
            difference: $data['difference'],
            surprisePrc: $data['surprise_prc'],
        );
    }
}
