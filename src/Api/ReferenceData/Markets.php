<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\ReferenceData;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Api\BatchableRequest;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyExchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\Exchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\ExchangeSchedule;
use MarekSkopal\TwelveData\Dto\ReferenceData\MarketState;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\TypeEnum;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

/** @phpstan-import-type MarketStateType from MarketState */
readonly class Markets extends TwelveDataApi
{
    /** @return BatchableRequest<Exchanges> */
    public function exchangesRequest(
        ?TypeEnum $type = null,
        ?string $name = null,
        ?string $code = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/exchanges',
            queryParams: [
                'type' => $type?->value,
                'name' => $name,
                'code' => $code,
                'country' => $country,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'show_plan' => QueryParamsUtils::booleanAsString($showPlan),
            ],
            responseFactory: Exchanges::fromJson(...),
        );
    }

    public function exchanges(
        ?TypeEnum $type = null,
        ?string $name = null,
        ?string $code = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
    ): Exchanges {
        return $this->exchangesRequest($type, $name, $code, $country, $format, $delimiter, $showPlan)->execute($this->client);
    }

    /** @return BatchableRequest<ExchangeSchedule> */
    public function exchangeScheduleRequest(
        ?DateTimeImmutable $date = null,
        ?string $micName = null,
        ?string $micCode = null,
        ?string $country = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/exchange_schedule',
            queryParams: [
                'date' => DateUtils::formatDate($date),
                'mic_name' => $micName,
                'mic_code' => $micCode,
                'country' => $country,
            ],
            responseFactory: ExchangeSchedule::fromJson(...),
        );
    }

    public function exchangeSchedule(
        ?DateTimeImmutable $date = null,
        ?string $micName = null,
        ?string $micCode = null,
        ?string $country = null,
    ): ExchangeSchedule {
        return $this->exchangeScheduleRequest($date, $micName, $micCode, $country)->execute($this->client);
    }

    /** @return BatchableRequest<CryptocurrencyExchanges> */
    public function cryptocurrencyExchangesRequest(?FormatEnum $format = null, ?string $delimiter = null,): BatchableRequest
    {
        return new BatchableRequest(
            path: '/cryptocurrency_exchanges',
            queryParams: [
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
            responseFactory: CryptocurrencyExchanges::fromJson(...),
        );
    }

    public function cryptocurrencyExchanges(?FormatEnum $format = null, ?string $delimiter = null,): CryptocurrencyExchanges
    {
        return $this->cryptocurrencyExchangesRequest($format, $delimiter)->execute($this->client);
    }

    /** @return list<MarketState> */
    public function marketState(?string $exchange = null, ?string $code = null, ?string $country = null,): array
    {
        $response = $this->client->get(
            path: '/market_state',
            queryParams: [
                'exchange' => $exchange,
                'code' => $code,
                'country' => $country,
            ],
        );

        /** @var list<MarketStateType> $data */
        $data = json_decode($response, associative: true);

        return array_map(fn (array $item): MarketState => MarketState::fromArray($item), $data);
    }
}
