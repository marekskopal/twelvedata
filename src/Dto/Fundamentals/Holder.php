<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class Holder
{
    public function __construct(
        public string $entityName,
        public string $dateReported,
        public int $shares,
        public int $value,
        public float $percentHeld,
    ) {
    }

    /**
     * @param array{
     *     entity_name: string,
     *     date_reported: string,
     *     shares: int,
     *     value: int,
     *     percent_held: float,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            entityName: $data['entity_name'],
            dateReported: $data['date_reported'],
            shares: $data['shares'],
            value: $data['value'],
            percentHeld: $data['percent_held'],
        );
    }
}
