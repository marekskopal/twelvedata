<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Etfs;

/**
 * @phpstan-type EtfSummaryDataType array{
 *     symbol: string,
 *     name: string,
 *     fund_family: string,
 *     fund_type: string,
 *     currency: string,
 *     share_class_inception_date: string,
 *     ytd_return: float|null,
 *     expense_ratio_net: float|null,
 *     yield: float|null,
 *     nav: float|null,
 *     last_price: float|null,
 *     turnover_rate: float|null,
 *     net_assets: float|null,
 *     overview: string|null,
 * }
 */
readonly class EtfSummaryData
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $fundFamily,
        public string $fundType,
        public string $currency,
        public string $shareClassInceptionDate,
        public ?float $ytdReturn,
        public ?float $expenseRatioNet,
        public ?float $yield,
        public ?float $nav,
        public ?float $lastPrice,
        public ?float $turnoverRate,
        public ?float $netAssets,
        public ?string $overview,
    ) {
    }

    /** @param EtfSummaryDataType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            symbol: $data['symbol'],
            name: $data['name'],
            fundFamily: $data['fund_family'],
            fundType: $data['fund_type'],
            currency: $data['currency'],
            shareClassInceptionDate: $data['share_class_inception_date'],
            ytdReturn: $data['ytd_return'] ?? null,
            expenseRatioNet: $data['expense_ratio_net'] ?? null,
            yield: $data['yield'] ?? null,
            nav: $data['nav'] ?? null,
            lastPrice: $data['last_price'] ?? null,
            turnoverRate: $data['turnover_rate'] ?? null,
            netAssets: $data['net_assets'] ?? null,
            overview: $data['overview'] ?? null,
        );
    }
}
