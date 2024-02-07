<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Dto\TimeSeries;
use MarekSkopal\TwelveData\Enum\TimeSeriesFormatEnum;
use MarekSkopal\TwelveData\Enum\TimeSeriesIntervalEnum;

class ReferenceData
{
    public function __construct(private readonly Client $client)
    {
    }

    public function timeSeries(
        string $symbol,
        TimeSeriesIntervalEnum $interval = TimeSeriesIntervalEnum::OneDay,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?string $type = null,
        ?string $outputSize = null,
        ?TimeSeriesFormatEnum $format = null,
        ?string $delimiter = null,
    ): TimeSeries {
        $response = $this->client->get(
            path: '/time_series',
            queryParams: [
                'symbol' => $symbol,
                'interval' => $interval->value,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type,
                'outputSize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
            ],
        );

        /**
         * @var array{
         *     meta: array{
         *         symbol: string,
         *         interval: string,
         *         currency: string,
         *         exchange_timezone: string,
         *         exchange: string,
         *         mic_code: string,
         *         type: string,
         *     },
         *     values: list<array{
         *         datetime: string,
         *         open: string,
         *         high: string,
         *         low: string,
         *         close: string,
         *         volume: string,
         *     }>,
         *     status: string,
         *  } $responseContents
         */
        $responseContents = json_decode($response->getBody()->getContents(), associative: true);

        return TimeSeries::fromArray($responseContents);
    }
}
