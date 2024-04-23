<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class StatisticsStockPriceSummary
{
    public function __construct(
        public float $fiftyTwoWeekLow,
        public float $fiftyTwoWeekHigh,
        public float $fiftyTwoWeekChange,
        public ?float $beta,
        public float $day50Ma,
        public float $day200Ma,
    ) {
    }

    /**
     * @param array{
     *     fifty_two_week_low: float,
     *     fifty_two_week_high: float,
     *     fifty_two_week_change: float,
     *     beta: float|null,
     *     day_50_ma: float,
     *     day_200_ma: float,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            fiftyTwoWeekLow: $data['fifty_two_week_low'],
            fiftyTwoWeekHigh: $data['fifty_two_week_high'],
            fiftyTwoWeekChange: $data['fifty_two_week_change'],
            beta: $data['beta'],
            day50Ma: $data['day_50_ma'],
            day200Ma: $data['day_200_ma'],
        );
    }
}
