<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\WebSocket;

use MarekSkopal\TwelveData\Enum\WebSocketEventEnum;

readonly class WebSocketEvent
{
    public static function fromJson(string $json): PriceEvent|SubscribeStatusEvent|HeartbeatEvent
    {
        /** @var array{event: string} $data */
        $data = json_decode($json, associative: true);

        $event = WebSocketEventEnum::from($data['event']);

        return match ($event) {
            WebSocketEventEnum::Price => PriceEvent::fromJson($json),
            WebSocketEventEnum::SubscribeStatus, WebSocketEventEnum::UnsubscribeStatus => SubscribeStatusEvent::fromJson($json),
            WebSocketEventEnum::Heartbeat => HeartbeatEvent::fromJson($json),
        };
    }
}
