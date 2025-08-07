<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\ReferenceData\Countries;
use MarekSkopal\TwelveData\Dto\ReferenceData\InstrumentType;

readonly class SupportingMetadata extends TwelveDataApi
{
    public function countries(): Countries
    {
        $response = $this->client->get(
            path: '/countries',
            queryParams: [],
        );

        return Countries::fromJson($response);
    }

    public function instrumentType(): InstrumentType
    {
        $response = $this->client->get(
            path: '/instrument_type',
            queryParams: [],
        );

        return InstrumentType::fromJson($response);
    }
}
