<?php

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Dto\Logo;
use MarekSkopal\TwelveData\Dto\Profile;
use MarekSkopal\TwelveData\Dto\TimeSeries;
use MarekSkopal\TwelveData\Enum\AdjustEnum;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Enum\OrderEnum;
use MarekSkopal\TwelveData\Enum\PrepostEnum;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

class Fundamentals extends TwelveDataApi
{
    public function __construct(private readonly Client $client)
    {
    }

    public function logo(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): Logo {
        $response = $this->client->get(
            path: '/logo',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return Logo::fromJson($this->getResponseContents($response));
    }

    public function profile(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): Profile {
        $response = $this->client->get(
            path: '/profile',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return Profile::fromJson($this->getResponseContents($response));
    }
}
