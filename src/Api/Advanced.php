<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Dto\Advanced\ApiUsage;
use MarekSkopal\TwelveData\Enum\FormatEnum;

readonly class Advanced extends TwelveDataApi
{
    /** @return BatchableRequest<ApiUsage> */
    public function apiUsageRequest(?FormatEnum $format = null, ?string $delimiter = null): BatchableRequest
    {
        return new BatchableRequest(
            path: '/api_usage',
            queryParams: [
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
            responseFactory: ApiUsage::fromJson(...),
        );
    }

    public function apiUsage(?FormatEnum $format = null, ?string $delimiter = null): ApiUsage
    {
        return $this->apiUsageRequest($format, $delimiter)->execute($this->client);
    }
}
