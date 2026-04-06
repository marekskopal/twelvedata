<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Dto\WebSocket;

use MarekSkopal\TwelveData\Dto\WebSocket\HeartbeatEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(HeartbeatEvent::class)]
final class HeartbeatEventTest extends TestCase
{
    public function testFromJson(): void
    {
        $json = (string) file_get_contents(__DIR__ . '/../../Fixtures/Response/websocket_heartbeat.json');

        $event = HeartbeatEvent::fromJson($json);

        self::assertSame('heartbeat', $event->event);
        self::assertSame('ok', $event->status);
    }
}
