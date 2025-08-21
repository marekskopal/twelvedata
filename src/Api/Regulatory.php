<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\Regulatory\DirectHolders;
use MarekSkopal\TwelveData\Dto\Regulatory\EdgarFillings;
use MarekSkopal\TwelveData\Dto\Regulatory\FundHolders;
use MarekSkopal\TwelveData\Dto\Regulatory\InsiderTransactions;
use MarekSkopal\TwelveData\Dto\Regulatory\InstitutionalHolders;
use MarekSkopal\TwelveData\Dto\Regulatory\SanctionedEntities;
use MarekSkopal\TwelveData\Dto\Regulatory\TaxInformation;
use MarekSkopal\TwelveData\Enum\SanctionsSourceEnum;
use MarekSkopal\TwelveData\Exception\InvalidArgumentException;
use MarekSkopal\TwelveData\Utils\DateUtils;

readonly class Regulatory extends TwelveDataApi
{
    public function edgarFilligs(
        ?string $symbol = null,
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
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

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
                'filled_from' => DateUtils::formatDate($filledFrom),
                'filled_to' => DateUtils::formatDate($filledTo),
                'page' => $page,
                'page_size' => $pageSize,
            ],
        );

        return EdgarFillings::fromJson($response);
    }

    public function insiderTransactions(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): InsiderTransactions {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/insider_transactions',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return InsiderTransactions::fromJson($response);
    }

    public function institutionalHolders(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): InstitutionalHolders {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/institutional_holders',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return InstitutionalHolders::fromJson($response);
    }

    public function fundHolders(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): FundHolders {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/fund_holders',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return FundHolders::fromJson($response);
    }

    public function directHolders(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): DirectHolders {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/direct_holders',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return DirectHolders::fromJson($response);
    }

    public function taxInformation(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
    ): TaxInformation {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/tax_info',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
            ],
        );

        return TaxInformation::fromJson($response);
    }

    public function sanctionedEntities(SanctionsSourceEnum $source,): SanctionedEntities
    {
        $response = $this->client->get(
            path: '/sanctions/' . $source->value,
            queryParams: [],
        );

        return SanctionedEntities::fromJson($response);
    }
}
