<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class ExchangeSchedule
{
    /** @param list<ExchangeScheduleData> $data */
    public function __construct(public array $data)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     data: list<array{
         *         title: string,
         *         name: string,
         *         code: string,
         *         country: string,
         *         time_zone: string,
         *         sessions: list<array{
         *             open_time: string,
         *             close_time: string,
         *             session_name: string,
         *             session_type: string,
         *         }>,
         *      }>
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     data: list<array{
     *         title: string,
     *         name: string,
     *         code: string,
     *         country: string,
     *         time_zone: string,
     *         sessions: list<array{
     *             open_time: string,
     *             close_time: string,
     *             session_name: string,
     *             session_type: string,
     *         }>,
     *      }>
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(
                fn(array $exchangeScheduleData) => ExchangeScheduleData::fromArray($exchangeScheduleData),
                $data['data'],
            ),
        );
    }
}
