<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Dto\WebSocket;

use MarekSkopal\TwelveData\Dto\WebSocket\HeartbeatEvent;
use MarekSkopal\TwelveData\Dto\WebSocket\PriceEvent;
use MarekSkopal\TwelveData\Dto\WebSocket\SubscribeStatusEvent;
use MarekSkopal\TwelveData\Dto\WebSocket\SubscribeStatusSymbol;
use MarekSkopal\TwelveData\Dto\WebSocket\WebSocketEvent;
use MarekSkopal\TwelveData\Enum\WebSocketEventEnum;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(WebSocketEvent::class)]
#[UsesClass(PriceEvent::class)]
#[UsesClass(SubscribeStatusEvent::class)]
#[UsesClass(SubscribeStatusSymbol::class)]
#[UsesClass(HeartbeatEvent::class)]
#[UsesClass(WebSocketEventEnum::class)]
final class WebSocketEventTest extends TestCase
{
    public function testFromJsonPriceEvent(): void
    {
        $json = (string) file_get_contents(__DIR__ . '/../../Fixtures/Response/websocket_price_event.json');

        $event = WebSocketEvent::fromJson($json);

        self::assertInstanceOf(PriceEvent::class, $event);
    }

    public function testFromJsonSubscribeStatusEvent(): void
    {
        $json = (string) file_get_contents(__DIR__ . '/../../Fixtures/Response/websocket_subscribe_status.json');

        $event = WebSocketEvent::fromJson($json);

        self::assertInstanceOf(SubscribeStatusEvent::class, $event);
    }

    public function testFromJsonHeartbeatEvent(): void
    {
        $json = (string) file_get_contents(__DIR__ . '/../../Fixtures/Response/websocket_heartbeat.json');

        $event = WebSocketEvent::fromJson($json);

        self::assertInstanceOf(HeartbeatEvent::class, $event);
    }
}
