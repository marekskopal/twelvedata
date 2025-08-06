<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Dto\Advanced\ApiUsage;
use MarekSkopal\TwelveData\Enum\FormatEnum;

readonly class Advanced extends TwelveDataApi
{
    public function apiUsage(?FormatEnum $format = null, ?string $delimiter = null,): ApiUsage
    {
        $response = $this->client->get(
            path: '/api_usage',
            queryParams: [
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
        );

        return ApiUsage::fromJson($response);
    }
}
