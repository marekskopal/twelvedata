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
    /** @return BatchableRequest<MutualFundList> */
    public function listRequest(
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
    ): BatchableRequest {
        return new BatchableRequest(
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
            responseFactory: MutualFundList::fromJson(...),
        );
    }

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
        return $this->listRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $cik,
            $country,
            $fundFamily,
            $fundType,
            $performanceRating,
            $riskRating,
            $page,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<MutualFundAllData> */
    public function allDataRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/mutual_funds/world',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: MutualFundAllData::fromJson(...),
        );
    }

    public function allData(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundAllData {
        return $this->allDataRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<MutualFundSummary> */
    public function summaryRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/mutual_funds/world/summary',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: MutualFundSummary::fromJson(...),
        );
    }

    public function summary(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundSummary {
        return $this->summaryRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<MutualFundPerformance> */
    public function performanceRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/mutual_funds/world/performance',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: MutualFundPerformance::fromJson(...),
        );
    }

    public function performance(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundPerformance {
        return $this->performanceRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<MutualFundRisk> */
    public function riskRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/mutual_funds/world/risk',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: MutualFundRisk::fromJson(...),
        );
    }

    public function risk(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundRisk {
        return $this->riskRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<MutualFundRatings> */
    public function ratingsRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/mutual_funds/world/ratings',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: MutualFundRatings::fromJson(...),
        );
    }

    public function ratings(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundRatings {
        return $this->ratingsRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<MutualFundComposition> */
    public function compositionRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/mutual_funds/world/composition',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: MutualFundComposition::fromJson(...),
        );
    }

    public function composition(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundComposition {
        return $this->compositionRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<MutualFundPurchaseInfo> */
    public function purchaseInfoRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/mutual_funds/world/purchase_info',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: MutualFundPurchaseInfo::fromJson(...),
        );
    }

    public function purchaseInfo(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundPurchaseInfo {
        return $this->purchaseInfoRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<MutualFundSustainability> */
    public function sustainabilityRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/mutual_funds/world/sustainability',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: MutualFundSustainability::fromJson(...),
        );
    }

    public function sustainability(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): MutualFundSustainability {
        return $this->sustainabilityRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<MutualFundFamilyList> */
    public function familyListRequest(?string $country = null): BatchableRequest
    {
        return new BatchableRequest(
            path: '/mutual_funds/family',
            queryParams: [
                'country' => $country,
            ],
            responseFactory: MutualFundFamilyList::fromJson(...),
        );
    }

    public function familyList(?string $country = null): MutualFundFamilyList
    {
        return $this->familyListRequest($country)->execute($this->client);
    }

    /** @return BatchableRequest<MutualFundTypeList> */
    public function typeListRequest(?string $country = null): BatchableRequest
    {
        return new BatchableRequest(
            path: '/mutual_funds/type',
            queryParams: [
                'country' => $country,
            ],
            responseFactory: MutualFundTypeList::fromJson(...),
        );
    }

    public function typeList(?string $country = null): MutualFundTypeList
    {
        return $this->typeListRequest($country)->execute($this->client);
    }
}
