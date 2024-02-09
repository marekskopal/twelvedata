<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Dto\Dividends;
use MarekSkopal\TwelveData\Dto\Logo;
use MarekSkopal\TwelveData\Dto\Profile;
use MarekSkopal\TwelveData\Dto\Splits;
use MarekSkopal\TwelveData\Enum\RangeEnum;

class Fundamentals extends TwelveDataApi
{
    public function __construct(private readonly Client $client)
    {
    }

    public function logo(string $symbol, ?string $exchange = null, ?string $micCode = null, ?string $country = null,): Logo
    {
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

    public function profile(string $symbol, ?string $exchange = null, ?string $micCode = null, ?string $country = null,): Profile
    {
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

    public function dividends(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?RangeEnum $range = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
    ): Dividends {
        $response = $this->client->get(
            path: '/dividends',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'range' => $range?->value,
                'start_date' => $startDate?->format('Y-m-d'),
                'end_date' => $endDate?->format('Y-m-d'),
            ],
        );

        return Dividends::fromJson($this->getResponseContents($response));
    }

    public function splits(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?RangeEnum $range = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
    ): Splits {
        $response = $this->client->get(
            path: '/splits',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'range' => $range?->value,
                'start_date' => $startDate?->format('Y-m-d'),
                'end_date' => $endDate?->format('Y-m-d'),
            ],
        );

        return Splits::fromJson($this->getResponseContents($response));
    }
}
