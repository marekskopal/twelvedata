<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

readonly class StatisticsStockStatistics
{
    public function __construct(
        public ?int $sharesOutstanding,
        public ?int $floatShares,
        public int $avg10Volume,
        public int $avg90Volume,
        public ?int $sharesShort,
        public ?float $shortRatio,
        public ?float $shortPercentOfSharesOutstanding,
        public ?float $percentHeldByInsiders,
        public ?float $percentHeldByInstitutions,
    ) {
    }

    /**
     * @param array{
     *     shares_outstanding: int|null,
     *     float_shares: int|null,
     *     avg_10_volume: int,
     *     avg_90_volume: int,
     *     shares_short: int|null,
     *     short_ratio: float|null,
     *     short_percent_of_shares_outstanding: float|null,
     *     percent_held_by_insiders: float|null,
     *     percent_held_by_institutions: float|null,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            sharesOutstanding: $data['shares_outstanding'],
            floatShares: $data['float_shares'],
            avg10Volume: $data['avg_10_volume'],
            avg90Volume: $data['avg_90_volume'],
            sharesShort: $data['shares_short'],
            shortRatio: $data['short_ratio'],
            shortPercentOfSharesOutstanding: $data['short_percent_of_shares_outstanding'],
            percentHeldByInsiders: $data['percent_held_by_insiders'],
            percentHeldByInstitutions: $data['percent_held_by_institutions'],
        );
    }
}
