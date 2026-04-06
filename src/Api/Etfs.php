<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Dto\Etfs\EtfAllData;
use MarekSkopal\TwelveData\Dto\Etfs\EtfComposition;
use MarekSkopal\TwelveData\Dto\Etfs\EtfFamilyList;
use MarekSkopal\TwelveData\Dto\Etfs\EtfList;
use MarekSkopal\TwelveData\Dto\Etfs\EtfPerformance;
use MarekSkopal\TwelveData\Dto\Etfs\EtfRisk;
use MarekSkopal\TwelveData\Dto\Etfs\EtfSummary;
use MarekSkopal\TwelveData\Dto\Etfs\EtfTypeList;
use MarekSkopal\TwelveData\Utils\Guard;

readonly class Etfs extends TwelveDataApi
{
    /** @return BatchableRequest<EtfList> */
    public function listRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $cik = null,
        ?string $country = null,
        ?string $fundFamily = null,
        ?string $fundType = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/etfs/list',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'cik' => $cik,
                'country' => $country,
                'fund_family' => $fundFamily,
                'fund_type' => $fundType,
                'page' => $page !== null ? (string) $page : null,
                'outputsize' => $outputsize,
            ],
            responseFactory: EtfList::fromJson(...),
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
        ?int $page = null,
        ?int $outputsize = null,
    ): EtfList {
        return $this->listRequest($symbol, $figi, $isin, $cusip, $cik, $country, $fundFamily, $fundType, $page, $outputsize)->execute(
            $this->client,
        );
    }

    /** @return BatchableRequest<EtfAllData> */
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
            path: '/etfs/world',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: EtfAllData::fromJson(...),
        );
    }

    public function allData(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): EtfAllData {
        return $this->allDataRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<EtfSummary> */
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
            path: '/etfs/world/summary',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: EtfSummary::fromJson(...),
        );
    }

    public function summary(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): EtfSummary {
        return $this->summaryRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<EtfPerformance> */
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
            path: '/etfs/world/performance',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: EtfPerformance::fromJson(...),
        );
    }

    public function performance(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): EtfPerformance {
        return $this->performanceRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<EtfRisk> */
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
            path: '/etfs/world/risk',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: EtfRisk::fromJson(...),
        );
    }

    public function risk(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): EtfRisk {
        return $this->riskRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<EtfComposition> */
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
            path: '/etfs/world/composition',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
            responseFactory: EtfComposition::fromJson(...),
        );
    }

    public function composition(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): EtfComposition {
        return $this->compositionRequest($symbol, $figi, $isin, $cusip, $country, $dp)->execute($this->client);
    }

    /** @return BatchableRequest<EtfFamilyList> */
    public function familyListRequest(?string $country = null): BatchableRequest
    {
        return new BatchableRequest(
            path: '/etfs/family',
            queryParams: [
                'country' => $country,
            ],
            responseFactory: EtfFamilyList::fromJson(...),
        );
    }

    public function familyList(?string $country = null): EtfFamilyList
    {
        return $this->familyListRequest($country)->execute($this->client);
    }

    /** @return BatchableRequest<EtfTypeList> */
    public function typeListRequest(?string $country = null): BatchableRequest
    {
        return new BatchableRequest(
            path: '/etfs/type',
            queryParams: [
                'country' => $country,
            ],
            responseFactory: EtfTypeList::fromJson(...),
        );
    }

    public function typeList(?string $country = null): EtfTypeList
    {
        return $this->typeListRequest($country)->execute($this->client);
    }
}
