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
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\Guard;

readonly class Regulatory extends TwelveDataApi
{
    /** @return BatchableRequest<EdgarFillings> */
    public function edgarFillingsRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: EdgarFillings::fromJson(...),
        );
    }

    public function edgarFillings(
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
        return $this->edgarFillingsRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $formType,
            $filledFrom,
            $filledTo,
            $page,
            $pageSize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<InsiderTransactions> */
    public function insiderTransactionsRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: InsiderTransactions::fromJson(...),
        );
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
        return $this->insiderTransactionsRequest($symbol, $figi, $isin, $cusip, $exchange, $micCode, $country)->execute($this->client);
    }

    /** @return BatchableRequest<InstitutionalHolders> */
    public function institutionalHoldersRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: InstitutionalHolders::fromJson(...),
        );
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
        return $this->institutionalHoldersRequest($symbol, $figi, $isin, $cusip, $exchange, $micCode, $country)->execute($this->client);
    }

    /** @return BatchableRequest<FundHolders> */
    public function fundHoldersRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: FundHolders::fromJson(...),
        );
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
        return $this->fundHoldersRequest($symbol, $figi, $isin, $cusip, $exchange, $micCode, $country)->execute($this->client);
    }

    /** @return BatchableRequest<DirectHolders> */
    public function directHoldersRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: DirectHolders::fromJson(...),
        );
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
        return $this->directHoldersRequest($symbol, $figi, $isin, $cusip, $exchange, $micCode, $country)->execute($this->client);
    }

    /** @return BatchableRequest<TaxInformation> */
    public function taxInformationRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/tax_info',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
            ],
            responseFactory: TaxInformation::fromJson(...),
        );
    }

    public function taxInformation(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
    ): TaxInformation {
        return $this->taxInformationRequest($symbol, $figi, $isin, $cusip, $exchange, $micCode)->execute($this->client);
    }

    /** @return BatchableRequest<SanctionedEntities> */
    public function sanctionedEntitiesRequest(SanctionsSourceEnum $source,): BatchableRequest
    {
        return new BatchableRequest(
            path: '/sanctions/' . $source->value,
            queryParams: [],
            responseFactory: SanctionedEntities::fromJson(...),
        );
    }

    public function sanctionedEntities(SanctionsSourceEnum $source,): SanctionedEntities
    {
        return $this->sanctionedEntitiesRequest($source)->execute($this->client);
    }
}
