<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-type IncomeStatementConsolidatedDividendsAndSharesType array{
 *     dividend_per_share?: int,
 *     diluted_average_shares: int,
 *     basic_average_shares: int,
 *     preferred_stock_dividends?: int,
 *     other_under_preferred_stock_dividend?: int,
 * }
 */
readonly class IncomeStatementConsolidatedDividendsAndShares
{
    public function __construct(
        public ?int $dividendPerShare,
        public int $dilutedAverageShares,
        public int $basicAverageShares,
        public ?int $preferredStockDividends,
        public ?int $otherUnderPreferredStockDividend,
    ) {
    }

    /** @param IncomeStatementConsolidatedDividendsAndSharesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            dividendPerShare: $data['dividend_per_share'] ?? null,
            dilutedAverageShares: $data['diluted_average_shares'],
            basicAverageShares: $data['basic_average_shares'],
            preferredStockDividends: $data['preferred_stock_dividends'] ?? null,
            otherUnderPreferredStockDividend: $data['other_under_preferred_stock_dividend'] ?? null,
        );
    }
}
