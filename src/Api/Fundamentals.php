<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Dto\Dividends;
use MarekSkopal\TwelveData\Dto\Earnings;
use MarekSkopal\TwelveData\Dto\IncomeStatement;
use MarekSkopal\TwelveData\Dto\InsiderTransactions;
use MarekSkopal\TwelveData\Dto\Logo;
use MarekSkopal\TwelveData\Dto\Profile;
use MarekSkopal\TwelveData\Dto\Splits;
use MarekSkopal\TwelveData\Dto\Statistics;
use MarekSkopal\TwelveData\Enum\EarningsPeriodEnum;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\PeriodEnum;
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

    public function earnings(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?EarningsPeriodEnum $period = null,
        ?string $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
    ): Earnings {
        $response = $this->client->get(
            path: '/earnings',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type,
                'period' => $period?->value,
                'outputSize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'dp' => $dp !== null ? (string) $dp : null,
                'start_date' => $startDate?->format('Y-m-d h:i:s'),
                'end_date' => $endDate?->format('Y-m-d h:i:s'),
            ],
        );

        return Earnings::fromJson($this->getResponseContents($response));
    }

    public function statistics(string $symbol, ?string $exchange = null, ?string $micCode = null, ?string $country = null,): Statistics
    {
        $response = $this->client->get(
            path: '/statistics',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return Statistics::fromJson($this->getResponseContents($response));
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

        return InsiderTransactions::fromJson($this->getResponseContents($response));
    }

    public function incomeStatement(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?PeriodEnum $period = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
    ): IncomeStatement {
        $response = $this->client->get(
            path: '/income_statement',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'period' => $period?->value,
                'start_date' => $startDate?->format('Y-m-d'),
                'end_date' => $endDate?->format('Y-m-d'),
            ],
        );

        return IncomeStatement::fromJson($this->getResponseContents($response));
    }
}