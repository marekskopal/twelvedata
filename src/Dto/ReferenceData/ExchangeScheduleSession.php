<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\ReferenceData;

readonly class ExchangeScheduleSession
{
    public function __construct(public string $openTime, public string $closeTime, public string $sessionName, public string $sessionType,)
    {
    }

    /**
     * @param array{
     *     open_time: string,
     *     close_time: string,
     *     session_name: string,
     *     session_type: string,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            openTime: $data['open_time'],
            closeTime: $data['close_time'],
            sessionName: $data['session_name'],
            sessionType: $data['session_type'],
        );
    }
}
