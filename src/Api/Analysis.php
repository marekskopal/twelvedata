<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Dto\Analysis\EarningsEstimate;
use MarekSkopal\TwelveData\Dto\Analysis\RevenueEstimate;

readonly class Analysis extends TwelveDataApi
{
    public function earningsEstimate(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $country = null,
    ): EarningsEstimate {
        $response = $this->client->get(
            path: '/earnings_estimate',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
        );

        return EarningsEstimate::fromJson($response);
    }

    public function revenueEstimate(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
        ?int $dp = null,
    ): RevenueEstimate {
        $response = $this->client->get(
            path: '/revenue_estimate',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'exchange' => $exchange,
                'dp' => $dp,
            ],
        );

        return RevenueEstimate::fromJson($response);
    }
}
