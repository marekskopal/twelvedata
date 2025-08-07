<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type StatisticsValuationsMetricsType from StatisticsValuationsMetrics
 * @phpstan-import-type StatisticsFinancialsType from StatisticsFinancials
 * @phpstan-import-type StatisticsStockStatisticsType from StatisticsStockStatistics
 * @phpstan-import-type StatisticsStockPriceSummaryType from StatisticsStockPriceSummary
 * @phpstan-import-type StatisticsDividendsAndSplitsType from StatisticsDividendsAndSplits
 * @phpstan-type StatisticsStatisticsType array{
 *     valuations_metrics: StatisticsValuationsMetricsType,
 *     financials: StatisticsFinancialsType,
 *     stock_statistics: StatisticsStockStatisticsType,
 *     stock_price_summary: StatisticsStockPriceSummaryType,
 *     dividends_and_splits: StatisticsDividendsAndSplitsType,
 * }
 */
readonly class StatisticsStatistics
{
    public function __construct(
        public StatisticsValuationsMetrics $valuationsMetrics,
        public StatisticsFinancials $financials,
        public StatisticsStockStatistics $stockStatistics,
        public StatisticsStockPriceSummary $stockPriceSummary,
        public StatisticsDividendsAndSplits $dividendsAndSplits,
    ) {
    }

    /** @param StatisticsStatisticsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            valuationsMetrics: StatisticsValuationsMetrics::fromArray($data['valuations_metrics']),
            financials: StatisticsFinancials::fromArray($data['financials']),
            stockStatistics: StatisticsStockStatistics::fromArray($data['stock_statistics']),
            stockPriceSummary: StatisticsStockPriceSummary::fromArray($data['stock_price_summary']),
            dividendsAndSplits: StatisticsDividendsAndSplits::fromArray($data['dividends_and_splits']),
        );
    }
}
