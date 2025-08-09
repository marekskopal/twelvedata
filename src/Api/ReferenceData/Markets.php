<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api\ReferenceData;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyExchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\Exchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\ExchangeSchedule;
use MarekSkopal\TwelveData\Dto\ReferenceData\MarketState;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

/** @phpstan-import-type MarketStateType from MarketState */
readonly class Markets extends TwelveDataApi
{
    public function exchanges(
        ?string $type = null,
        ?string $name = null,
        ?string $code = null,
        ?string $country = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?bool $showPlan = null,
    ): Exchanges {
        $response = $this->client->get(
            path: '/exchanges',
            queryParams: [
                'type' => $type,
                'name' => $name,
                'code' => $code,
                'country' => $country,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'show_plan' => QueryParamsUtils::booleanAsString($showPlan),
            ],
        );

        return Exchanges::fromJson($response);
    }

    public function exchangeSchedule(
        ?DateTimeImmutable $date = null,
        ?string $micName = null,
        ?string $micCode = null,
        ?string $country = null,
    ): ExchangeSchedule {
        $response = $this->client->get(
            path: '/exchange_schedule',
            queryParams: [
                'date' => DateUtils::formatDate($date),
                'mic_name' => $micName,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return ExchangeSchedule::fromJson($response);
    }

    public function cryptocurrencyExchanges(?FormatEnum $format = null, ?string $delimiter = null,): CryptocurrencyExchanges
    {
        $response = $this->client->get(
            path: '/cryptocurrency_exchanges',
            queryParams: [
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
        );

        return CryptocurrencyExchanges::fromJson($response);
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
