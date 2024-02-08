<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Dto\StockList;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

class ReferenceData
{
    public function __construct(private readonly Client $client)
    {
    }

    public function stockList(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?string $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
        ?bool $includeDelisted = null,
    ): StockList {
        $response = $this->client->get(
            path: '/stocks',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type,
                'outputSize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'show_plan' => $showPlan !== null ? QueryParamsUtils::booleanAsString($showPlan) : null,
                'include_delisted' => $includeDelisted !== null ? QueryParamsUtils::booleanAsString($includeDelisted) : null,
            ],
        );

        return StockList::fromJson($response->getBody()->getContents());
    }
}
