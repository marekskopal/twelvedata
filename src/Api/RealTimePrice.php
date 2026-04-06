<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\WebSocket\HeartbeatEvent;
use MarekSkopal\TwelveData\Dto\WebSocket\PriceEvent;
use MarekSkopal\TwelveData\Dto\WebSocket\SubscribeStatusEvent;
use MarekSkopal\TwelveData\Dto\WebSocket\WebSocketEvent;
use MarekSkopal\TwelveData\Enum\WebSocketActionEnum;
use MarekSkopal\TwelveData\WebSocket\WebSocketClientInterface;
use const JSON_THROW_ON_ERROR;

readonly class RealTimePrice
{
    private const string WebSocketUrl = 'wss://ws.twelvedata.com/v1/quotes/price';

    public function __construct(private WebSocketClientInterface $webSocketClient, private Config $config,)
    {
    }

    public function connect(): void
    {
        $url = self::WebSocketUrl . '?apikey=' . $this->config->apiKey;
        $this->webSocketClient->connect($url);
    }

    /** @param list<string> $symbols */
    public function subscribe(array $symbols): void
    {
        $this->webSocketClient->send(json_encode([
            'action' => WebSocketActionEnum::Subscribe->value,
            'params' => [
                'symbols' => implode(',', $symbols),
            ],
        ], JSON_THROW_ON_ERROR));
    }

    /** @param list<string> $symbols */
    public function unsubscribe(array $symbols): void
    {
        $this->webSocketClient->send(json_encode([
            'action' => WebSocketActionEnum::Unsubscribe->value,
            'params' => [
                'symbols' => implode(',', $symbols),
            ],
        ], JSON_THROW_ON_ERROR));
    }

    public function reset(): void
    {
        $this->webSocketClient->send(json_encode([
            'action' => WebSocketActionEnum::Reset->value,
        ], JSON_THROW_ON_ERROR));
    }

    public function heartbeat(): void
    {
        $this->webSocketClient->send(json_encode([
            'action' => 'heartbeat',
        ], JSON_THROW_ON_ERROR));
    }

    public function receive(): PriceEvent|SubscribeStatusEvent|HeartbeatEvent|null
    {
        $message = $this->webSocketClient->receive();
        if ($message === null) {
            return null;
        }

        return WebSocketEvent::fromJson($message);
    }

    public function disconnect(): void
    {
        $this->webSocketClient->disconnect();
    }

    public function isConnected(): bool
    {
        return $this->webSocketClient->isConnected();
    }
}
