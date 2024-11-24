<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class ExchangeScheduleData
{
    /** @param list<ExchangeScheduleSession> $sessions */
    public function __construct(
        public string $title,
        public string $name,
        public string $code,
        public string $country,
        public string $timeZone,
        public array $sessions,
    ) {
    }

    /**
     * @param array{
     *     title: string,
     *     name: string,
     *     code: string,
     *     country: string,
     *     time_zone: string,
     *     sessions: list<array{
     *         open_time: string,
     *         close_time: string,
     *         session_name: string,
     *         session_type: string,
     *     }>,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            name: $data['name'],
            code: $data['code'],
            country: $data['country'],
            timeZone: $data['time_zone'],
            sessions: array_map(
                fn(array $session) => ExchangeScheduleSession::fromArray($session),
                $data['sessions'],
            ),
        );
    }
}
