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
    /** @return BatchableRequest<ExchangeRate> */
    public function exchangeRateRequest(
        string $symbol,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/exchange_rate',
            queryParams: [
                'symbol' => $symbol,
                'date' => DateUtils::formatDate($date),
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'dp' => $dp,
                'timezone' => $timezone,
            ],
            responseFactory: ExchangeRate::fromJson(...),
        );
    }

    public function exchangeRate(
        string $symbol,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): ExchangeRate {
        return $this->exchangeRateRequest($symbol, $date, $format, $delimiter, $dp, $timezone)->execute($this->client);
    }

    /** @return BatchableRequest<CurrencyConversion> */
    public function currencyConversionRequest(
        string $symbol,
        float $amount,
        ?DateTimeImmutable $date = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?string $timezone = null,
    ): BatchableRequest {
        return new BatchableRequest(
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
            responseFactory: CurrencyConversion::fromJson(...),
        );
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
        return $this->currencyConversionRequest($symbol, $amount, $date, $format, $delimiter, $dp, $timezone)->execute($this->client);
    }
}
