<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Dto\Analysis\EarningsEstimate;
use MarekSkopal\TwelveData\Dto\Analysis\EpsRevisions;
use MarekSkopal\TwelveData\Dto\Analysis\EpsTrend;
use MarekSkopal\TwelveData\Dto\Analysis\GrowthEstimates;
use MarekSkopal\TwelveData\Dto\Analysis\PriceTarget;
use MarekSkopal\TwelveData\Dto\Analysis\Recommendations;
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

    public function epsTrend(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): EpsTrend {
        $response = $this->client->get(
            path: '/eps_trend',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
        );

        return EpsTrend::fromJson($response);
    }

    public function epsRevisions(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): EpsRevisions {
        $response = $this->client->get(
            path: '/eps_revisions',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
        );

        return EpsRevisions::fromJson($response);
    }

    public function growthEstimates(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): GrowthEstimates {
        $response = $this->client->get(
            path: '/growth_estimates',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
        );

        return GrowthEstimates::fromJson($response);
    }

    public function recommendations(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): Recommendations {
        $response = $this->client->get(
            path: '/recommendations',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
        );

        return Recommendations::fromJson($response);
    }

    public function priceTarget(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): PriceTarget {
        $response = $this->client->get(
            path: '/price_target',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
        );

        return PriceTarget::fromJson($response);
    }
}
