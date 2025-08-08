<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

use DateTimeImmutable;

/**
 * @phpstan-type EpsRevisionsEpsRevisionType array{
 *     date: string,
 *     period: string,
 *     up_last_week: int,
 *     up_last_month: int,
 *     down_last_week: int,
 *     down_last_month: int
 * }
 */
readonly class EpsRevisionsEpsRevision
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $period,
        public int $upLastWeek,
        public int $upLastMonth,
        public int $downLastWeek,
        public int $downLastMonth,
    ) {
    }

    /** @param EpsRevisionsEpsRevisionType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: new DateTimeImmutable($data['date']),
            period: $data['period'],
            upLastWeek: $data['up_last_week'],
            upLastMonth: $data['up_last_month'],
            downLastWeek: $data['down_last_week'],
            downLastMonth: $data['down_last_month'],
        );
    }
}
