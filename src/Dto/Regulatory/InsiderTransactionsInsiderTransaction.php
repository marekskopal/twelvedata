<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

use DateTimeImmutable;

readonly class InsiderTransactionsInsiderTransaction
{
    public function __construct(
        public string $full_name,
        public string $position,
        public DateTimeImmutable $date_reported,
        public bool $is_direct,
        public int $shares,
        public ?int $value,
        public string $description,
    ) {
    }

    /**
     * @param array{
     *     full_name: string,
     *     position: string,
     *     date_reported: string,
     *     is_direct: bool,
     *     shares: int,
     *     value: int|null,
     *     description: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            full_name: $data['full_name'],
            position: $data['position'],
            date_reported: new DateTimeImmutable($data['date_reported']),
            is_direct: $data['is_direct'],
            shares: $data['shares'],
            value: $data['value'],
            description: $data['description'],
        );
    }
}
