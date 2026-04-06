<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Dto\WebSocket;

use MarekSkopal\TwelveData\Dto\WebSocket\SubscribeStatusEvent;
use MarekSkopal\TwelveData\Dto\WebSocket\SubscribeStatusSymbol;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SubscribeStatusEvent::class)]
#[UsesClass(SubscribeStatusSymbol::class)]
final class SubscribeStatusEventTest extends TestCase
{
    public function testFromJson(): void
    {
        $json = (string) file_get_contents(__DIR__ . '/../../Fixtures/Response/websocket_subscribe_status.json');

        $event = SubscribeStatusEvent::fromJson($json);

        self::assertSame('subscribe-status', $event->event);
        self::assertSame('ok', $event->status);
        self::assertCount(1, $event->success);
        self::assertSame('AAPL', $event->success[0]->symbol);
        self::assertSame('NASDAQ', $event->success[0]->exchange);
        self::assertSame('XNGS', $event->success[0]->micCode);
        self::assertSame('United States', $event->success[0]->country);
        self::assertSame('Common Stock', $event->success[0]->type);
        self::assertCount(0, $event->fails);
    }
}
