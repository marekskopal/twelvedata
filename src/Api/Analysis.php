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
use MarekSkopal\TwelveData\Utils\Guard;

readonly class Analysis extends TwelveDataApi
{
    /** @return BatchableRequest<EarningsEstimate> */
    public function earningsEstimateRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $country = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/earnings_estimate',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
            responseFactory: EarningsEstimate::fromJson(...),
        );
    }

    public function earningsEstimate(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $country = null,
    ): EarningsEstimate {
        return $this->earningsEstimateRequest($symbol, $figi, $isin, $cusip, $exchange, $country)->execute($this->client);
    }

    /** @return BatchableRequest<RevenueEstimate> */
    public function revenueEstimateRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
        ?int $dp = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: RevenueEstimate::fromJson(...),
        );
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
        return $this->revenueEstimateRequest($symbol, $figi, $isin, $cusip, $country, $exchange, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<EpsTrend> */
    public function epsTrendRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/eps_trend',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
            responseFactory: EpsTrend::fromJson(...),
        );
    }

    public function epsTrend(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): EpsTrend {
        return $this->epsTrendRequest($symbol, $figi, $isin, $cusip, $country, $exchange)->execute($this->client);
    }

    /** @return BatchableRequest<EpsRevisions> */
    public function epsRevisionsRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/eps_revisions',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
            responseFactory: EpsRevisions::fromJson(...),
        );
    }

    public function epsRevisions(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): EpsRevisions {
        return $this->epsRevisionsRequest($symbol, $figi, $isin, $cusip, $country, $exchange)->execute($this->client);
    }

    /** @return BatchableRequest<GrowthEstimates> */
    public function growthEstimatesRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/growth_estimates',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
            responseFactory: GrowthEstimates::fromJson(...),
        );
    }

    public function growthEstimates(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): GrowthEstimates {
        return $this->growthEstimatesRequest($symbol, $figi, $isin, $cusip, $country, $exchange)->execute($this->client);
    }

    /** @return BatchableRequest<Recommendations> */
    public function recommendationsRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/recommendations',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
            responseFactory: Recommendations::fromJson(...),
        );
    }

    public function recommendations(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): Recommendations {
        return $this->recommendationsRequest($symbol, $figi, $isin, $cusip, $country, $exchange)->execute($this->client);
    }

    /** @return BatchableRequest<PriceTarget> */
    public function priceTargetRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/price_target',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'country' => $country,
            ],
            responseFactory: PriceTarget::fromJson(...),
        );
    }

    public function priceTarget(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
    ): PriceTarget {
        return $this->priceTargetRequest($symbol, $figi, $isin, $cusip, $country, $exchange)->execute($this->client);
    }

    /** @return BatchableRequest<AnalystRatingsSnapshot> */
    public function analystRatingsSnapshotRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
        ?RatingChangeEnum $ratingChange = null,
        ?int $outputsize = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: AnalystRatingsSnapshot::fromJson(...),
        );
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
        return $this->analystRatingsSnapshotRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $country,
            $exchange,
            $ratingChange,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<AnalystRatingsUsEquities> */
    public function analystRatingsUsEquitiesRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?string $exchange = null,
        ?RatingChangeEnum $ratingChange = null,
        ?int $outputsize = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: AnalystRatingsUsEquities::fromJson(...),
        );
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
        return $this->analystRatingsUsEquitiesRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $country,
            $exchange,
            $ratingChange,
            $outputsize,
        )->execute($this->client);
    }
}
