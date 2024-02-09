<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto;

use DateTimeImmutable;

readonly class SplitsSplit
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $description,
        public float $ratio,
        public float $fromFactor,
        public float $toFactor,
    ) {
    }

    /**
     * @param array{
     *     date: string,
     *     description: string,
     *     ratio: float,
     *     from_factor: float,
     *     to_factor: float,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            description: $data['description'],
            ratio: $data['ratio'],
            fromFactor: $data['from_factor'],
            toFactor: $data['to_factor'],
        );
    }
}
