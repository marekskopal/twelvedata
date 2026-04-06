<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Dto\WebSocket;

use MarekSkopal\TwelveData\Dto\WebSocket\PriceEvent;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PriceEvent::class)]
final class PriceEventTest extends TestCase
{
    public function testFromJson(): void
    {
        $json = (string) file_get_contents(__DIR__ . '/../../Fixtures/Response/websocket_price_event.json');

        $event = PriceEvent::fromJson($json);

        self::assertSame('price', $event->event);
        self::assertSame('AAPL', $event->symbol);
        self::assertSame('USD', $event->currency);
        self::assertSame('NASDAQ', $event->exchange);
        self::assertSame('XNGS', $event->micCode);
        self::assertSame('Common Stock', $event->type);
        self::assertSame(1631772000, $event->timestamp);
        self::assertSame(150.25, $event->price);
    }
}
