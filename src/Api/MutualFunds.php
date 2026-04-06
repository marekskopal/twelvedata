<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundAllData;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundComposition;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundFamilyList;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundList;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundPerformance;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundPurchaseInfo;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundRatings;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundRisk;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundSummary;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundSustainability;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundTypeList;
use MarekSkopal\TwelveData\Utils\Guard;

readonly class MutualFunds extends TwelveDataApi
{
    public function list(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $cik = null,
        ?string $country = null,
        ?string $fundFamily = null,
        ?string $fundType = null,
        ?int $performanceRating = null,
        ?int $riskRating = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): MutualFundList {
        $response = $this->client->get(
            path: '/mutual_funds/list',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'cik' => $cik,
                'country' => $country,
                'fund_family' => $fundFamily,
                'fund_type' => $fundType,
                'performance_rating' => $performanceRating,
                'risk_rating' => $riskRating,
                'page' => $page !== null ? (string) $page : null,
                'outputsize' => $outputsize,
            ],
        );

        return MutualFundList::fromJson($response);
    }

    public function allData(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundAllData {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/mutual_funds/world',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return MutualFundAllData::fromJson($response);
    }

    public function summary(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundSummary {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/mutual_funds/world/summary',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return MutualFundSummary::fromJson($response);
    }

    public function performance(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundPerformance {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/mutual_funds/world/performance',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return MutualFundPerformance::fromJson($response);
    }

    public function risk(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundRisk {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/mutual_funds/world/risk',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return MutualFundRisk::fromJson($response);
    }

    public function ratings(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundRatings {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/mutual_funds/world/ratings',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return MutualFundRatings::fromJson($response);
    }

    public function composition(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundComposition {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/mutual_funds/world/composition',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return MutualFundComposition::fromJson($response);
    }

    public function purchaseInfo(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundPurchaseInfo {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/mutual_funds/world/purchase_info',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return MutualFundPurchaseInfo::fromJson($response);
    }

    public function sustainability(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundSustainability {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/mutual_funds/world/sustainability',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return MutualFundSustainability::fromJson($response);
    }

    public function familyList(?string $country = null): MutualFundFamilyList
    {
        $response = $this->client->get(
            path: '/mutual_funds/family',
            queryParams: [
                'country' => $country,
            ],
        );

        return MutualFundFamilyList::fromJson($response);
    }

    public function typeList(?string $country = null): MutualFundTypeList
    {
        $response = $this->client->get(
            path: '/mutual_funds/type',
            queryParams: [
                'country' => $country,
            ],
        );

        return MutualFundTypeList::fromJson($response);
    }
}
