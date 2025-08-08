<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Dto\Analysis\EarningsEstimate;

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
}
