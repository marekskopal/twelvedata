<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\BatchableRequest;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\ReferenceData\Countries;
use MarekSkopal\TwelveData\Dto\ReferenceData\InstrumentType;
use MarekSkopal\TwelveData\Dto\ReferenceData\TechnicalIndicators;

readonly class SupportingMetadata extends TwelveDataApi
{
    /** @return BatchableRequest<Countries> */
    public function countriesRequest(): BatchableRequest
    {
        return new BatchableRequest(
            path: '/countries',
            queryParams: [],
            responseFactory: Countries::fromJson(...),
        );
    }

    public function countries(): Countries
    {
        return $this->countriesRequest()->execute($this->client);
    }

    /** @return BatchableRequest<InstrumentType> */
    public function instrumentTypeRequest(): BatchableRequest
    {
        return new BatchableRequest(
            path: '/instrument_type',
            queryParams: [],
            responseFactory: InstrumentType::fromJson(...),
        );
    }

    public function instrumentType(): InstrumentType
    {
        return $this->instrumentTypeRequest()->execute($this->client);
    }

    /** @return BatchableRequest<TechnicalIndicators> */
    public function technicalIndicatorsRequest(): BatchableRequest
    {
        return new BatchableRequest(
            path: '/technical_indicators',
            queryParams: [],
            responseFactory: TechnicalIndicators::fromJson(...),
        );
    }

    public function technicalIndicators(): TechnicalIndicators
    {
        return $this->technicalIndicatorsRequest()->execute($this->client);
    }
}
