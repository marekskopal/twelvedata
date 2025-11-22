<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\Currencies\CurrencyConversion;
use MarekSkopal\TwelveData\Dto\Currencies\ExchangeRate;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Utils\DateUtils;

readonly class Currencies extends TwelveDataApi
{
    public function exchangeRate(
        string $symbol,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): ExchangeRate {
        $response = $this->client->get(
            path: '/exchange_rate',
            queryParams: [
                'symbol' => $symbol,
                'date' => DateUtils::formatDate($date),
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'dp' => $dp,
                'timezone' => $timezone,
            ],
        );

        return ExchangeRate::fromJson($response);
    }

    public function currencyConversion(
        string $symbol,
        float $amount,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): CurrencyConversion {
        $response = $this->client->get(
            path: '/currency_conversion',
            queryParams: [
                'symbol' => $symbol,
                'amount' => $amount,
                'date' => DateUtils::formatDate($date),
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'dp' => $dp,
                'timezone' => $timezone,
            ],
        );

        return CurrencyConversion::fromJson($response);
    }
}
