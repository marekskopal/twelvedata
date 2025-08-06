<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\Regulatory\DirectHolders;
use MarekSkopal\TwelveData\Dto\Regulatory\EdgarFillings;
use MarekSkopal\TwelveData\Dto\Regulatory\FundHolders;
use MarekSkopal\TwelveData\Dto\Regulatory\InsiderTransactions;
use MarekSkopal\TwelveData\Dto\Regulatory\InstitutionalHolders;

class Regulatory extends TwelveDataApi
{
    public function edgarFilligs(
        string $symbol,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $formType = null,
        ?DateTimeImmutable $filledFrom = null,
        ?DateTimeImmutable $filledTo = null,
        ?int $page = null,
        ?int $pageSize = null,
    ): EdgarFillings {
        $response = $this->client->get(
            path: '/edgar_filings/archive',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'form_type' => $formType,
                'filled_from' => $filledFrom?->format('Y-m-d'),
                'filled_to' => $filledTo?->format('Y-m-d'),
                'page' => $page,
                'page_size' => $pageSize,
            ],
        );

        return EdgarFillings::fromJson($response);
    }

    public function insiderTransactions(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): InsiderTransactions {
        $response = $this->client->get(
            path: '/insider_transactions',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return InsiderTransactions::fromJson($response);
    }

    public function institutionalHolders(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): InstitutionalHolders {
        $response = $this->client->get(
            path: '/institutional_holders',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return InstitutionalHolders::fromJson($response);
    }

    public function fundHolders(string $symbol, ?string $exchange = null, ?string $micCode = null, ?string $country = null,): FundHolders
    {
        $response = $this->client->get(
            path: '/fund_holders',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return FundHolders::fromJson($response);
    }

    public function directHolders(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): DirectHolders {
        $response = $this->client->get(
            path: '/direct_holders',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return DirectHolders::fromJson($response);
    }
}
