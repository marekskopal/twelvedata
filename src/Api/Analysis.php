<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Dto\Analysis\AnalystRatingsSnapshot;
use MarekSkopal\TwelveData\Dto\Analysis\AnalystRatingsUsEquities;
use MarekSkopal\TwelveData\Dto\Analysis\EarningsEstimate;
use MarekSkopal\TwelveData\Dto\Analysis\EpsRevisions;
use MarekSkopal\TwelveData\Dto\Analysis\EpsTrend;
use MarekSkopal\TwelveData\Dto\Analysis\GrowthEstimates;
use MarekSkopal\TwelveData\Dto\Analysis\PriceTarget;
use MarekSkopal\TwelveData\Dto\Analysis\Recommendations;
use MarekSkopal\TwelveData\Dto\Analysis\RevenueEstimate;
use MarekSkopal\TwelveData\Enum\RatingChangeEnum;
use MarekSkopal\TwelveData\Exception\InvalidArgumentException;

readonly class Analysis extends TwelveDataApi
{
    public function earningsEstimate(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $country = null,
    ): EarningsEstimate {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
        ?int $dp = null,
    ): RevenueEstimate {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): EpsTrend {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): EpsRevisions {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): GrowthEstimates {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): Recommendations {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): PriceTarget {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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

    public function analystRatingsSnapshot(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
        ?RatingChangeEnum $ratingChange = null,
        ?int $outputsize = null,
    ): AnalystRatingsSnapshot {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/analyst_ratings/light',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
                'rating_change' => $ratingChange?->value,
                'outputsize' => $outputsize,
            ],
        );

        return AnalystRatingsSnapshot::fromJson($response);
    }

    public function analystRatingsUsEquities(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
        ?RatingChangeEnum $ratingChange = null,
        ?int $outputsize = null,
    ): AnalystRatingsUsEquities {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/analyst_ratings/light',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
                'rating_change' => $ratingChange?->value,
                'outputsize' => $outputsize,
            ],
        );

        return AnalystRatingsUsEquities::fromJson($response);
    }
}
