<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\RealTimePrice;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\WebSocket\HeartbeatEvent;
use MarekSkopal\TwelveData\Dto\WebSocket\PriceEvent;
use MarekSkopal\TwelveData\Dto\WebSocket\SubscribeStatusEvent;
use MarekSkopal\TwelveData\Dto\WebSocket\SubscribeStatusSymbol;
use MarekSkopal\TwelveData\Dto\WebSocket\WebSocketEvent;
use MarekSkopal\TwelveData\Enum\WebSocketEventEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\WebSocket\WebSocketClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(RealTimePrice::class)]
#[UsesClass(Config::class)]
#[UsesClass(PriceEvent::class)]
#[UsesClass(SubscribeStatusEvent::class)]
#[UsesClass(SubscribeStatusSymbol::class)]
#[UsesClass(HeartbeatEvent::class)]
#[UsesClass(WebSocketEvent::class)]
#[UsesClass(WebSocketEventEnum::class)]
final class RealTimePriceTest extends TestCase
{
    public function testReceivePriceEvent(): void
    {
        $fixture = WebSocketClientFixture::createWithMessages([
            (string) file_get_contents(__DIR__ . '/../Fixtures/Response/websocket_price_event.json'),
        ]);

        $realTimePrice = new RealTimePrice($fixture, new Config(apiKey: 'demo'));
        $realTimePrice->connect();

        $event = $realTimePrice->receive();

        self::assertInstanceOf(PriceEvent::class, $event);
        self::assertSame('AAPL', $event->symbol);
        self::assertSame(150.25, $event->price);
    }

    public function testReceiveSubscribeStatusEvent(): void
    {
        $fixture = WebSocketClientFixture::createWithMessages([
            (string) file_get_contents(__DIR__ . '/../Fixtures/Response/websocket_subscribe_status.json'),
        ]);

        $realTimePrice = new RealTimePrice($fixture, new Config(apiKey: 'demo'));
        $realTimePrice->connect();

        $event = $realTimePrice->receive();

        self::assertInstanceOf(SubscribeStatusEvent::class, $event);
        self::assertSame('ok', $event->status);
        self::assertCount(1, $event->success);
        self::assertSame('AAPL', $event->success[0]->symbol);
    }

    public function testReceiveHeartbeatEvent(): void
    {
        $fixture = WebSocketClientFixture::createWithMessages([
            (string) file_get_contents(__DIR__ . '/../Fixtures/Response/websocket_heartbeat.json'),
        ]);

        $realTimePrice = new RealTimePrice($fixture, new Config(apiKey: 'demo'));
        $realTimePrice->connect();

        $event = $realTimePrice->receive();

        self::assertInstanceOf(HeartbeatEvent::class, $event);
        self::assertSame('ok', $event->status);
    }

    public function testReceiveNull(): void
    {
        $fixture = WebSocketClientFixture::createWithMessages([]);

        $realTimePrice = new RealTimePrice($fixture, new Config(apiKey: 'demo'));
        $realTimePrice->connect();

        self::assertNull($realTimePrice->receive());
    }

    public function testSubscribe(): void
    {
        $fixture = new WebSocketClientFixture();

        $realTimePrice = new RealTimePrice($fixture, new Config(apiKey: 'demo'));
        $realTimePrice->connect();
        $realTimePrice->subscribe(['AAPL', 'EUR/USD']);

        $sentMessages = $fixture->getSentMessages();
        self::assertCount(1, $sentMessages);

        /** @var array{action: string, params: array{symbols: string}} $decoded */
        $decoded = json_decode($sentMessages[0], associative: true);
        self::assertSame('subscribe', $decoded['action']);
        self::assertSame('AAPL,EUR/USD', $decoded['params']['symbols']);
    }

    public function testUnsubscribe(): void
    {
        $fixture = new WebSocketClientFixture();

        $realTimePrice = new RealTimePrice($fixture, new Config(apiKey: 'demo'));
        $realTimePrice->connect();
        $realTimePrice->unsubscribe(['AAPL']);

        $sentMessages = $fixture->getSentMessages();
        self::assertCount(1, $sentMessages);

        /** @var array{action: string, params: array{symbols: string}} $decoded */
        $decoded = json_decode($sentMessages[0], associative: true);
        self::assertSame('unsubscribe', $decoded['action']);
        self::assertSame('AAPL', $decoded['params']['symbols']);
    }

    public function testReset(): void
    {
        $fixture = new WebSocketClientFixture();

        $realTimePrice = new RealTimePrice($fixture, new Config(apiKey: 'demo'));
        $realTimePrice->connect();
        $realTimePrice->reset();

        $sentMessages = $fixture->getSentMessages();
        self::assertCount(1, $sentMessages);

        /** @var array{action: string} $decoded */
        $decoded = json_decode($sentMessages[0], associative: true);
        self::assertSame('reset', $decoded['action']);
    }

    public function testIsConnected(): void
    {
        $fixture = new WebSocketClientFixture();

        $realTimePrice = new RealTimePrice($fixture, new Config(apiKey: 'demo'));

        self::assertFalse($realTimePrice->isConnected());

        $realTimePrice->connect();
        self::assertTrue($realTimePrice->isConnected());

        $realTimePrice->disconnect();
        self::assertFalse($realTimePrice->isConnected());
    }
}
