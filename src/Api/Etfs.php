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
        $response = $this->client->get(
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
        );

        return EtfList::fromJson($response);
    }

    public function allData(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): EtfAllData {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/etfs/world',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return EtfAllData::fromJson($response);
    }

    public function summary(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): EtfSummary {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/etfs/world/summary',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return EtfSummary::fromJson($response);
    }

    public function performance(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): EtfPerformance {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/etfs/world/performance',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return EtfPerformance::fromJson($response);
    }

    public function risk(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): EtfRisk {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/etfs/world/risk',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return EtfRisk::fromJson($response);
    }

    public function composition(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $country = null,
        ?int $dp = null,
    ): EtfComposition {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        $response = $this->client->get(
            path: '/etfs/world/composition',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'country' => $country,
                'dp' => $dp,
            ],
        );

        return EtfComposition::fromJson($response);
    }

    public function familyList(?string $country = null): EtfFamilyList
    {
        $response = $this->client->get(
            path: '/etfs/family',
            queryParams: [
                'country' => $country,
            ],
        );

        return EtfFamilyList::fromJson($response);
    }

    public function typeList(?string $country = null): EtfTypeList
    {
        $response = $this->client->get(
            path: '/etfs/type',
            queryParams: [
                'country' => $country,
            ],
        );

        return EtfTypeList::fromJson($response);
    }
}
