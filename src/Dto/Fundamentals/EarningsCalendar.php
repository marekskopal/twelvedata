<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type EarningsCalendarEarningType from EarningsCalendarEarning
 * @phpstan-type EarningsCalendarType array{
 *     earnings: array<string, list<EarningsCalendarEarningType>>
 * }
 */
readonly class EarningsCalendar
{
    /** @param array<string, list<EarningsCalendarEarning>> $earnings */
    public function __construct(public array $earnings,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EarningsCalendarType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EarningsCalendarType $data */
    public static function fromArray(array $data): self
    {
        $earnings = [];
        foreach ($data['earnings'] as $date => $items) {
            foreach ($items as $item) {
                $item['date'] = $date;
                $earnings[$date][] = EarningsCalendarEarning::fromArray($item);
            }
        }

        return new self(earnings: $earnings);
    }
}
