<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\WebSocket;

use WebSocket\Client;
use WebSocket\Message\Text;

final class PhrityWebSocketClient implements WebSocketClientInterface
{
    private ?Client $client = null;

    public function connect(string $url): void
    {
        $this->client = new Client($url);
        $this->client->connect();
    }

    public function send(string $message): void
    {
        $this->getClient()->text($message);
    }

    public function receive(): ?string
    {
        $message = $this->getClient()->receive();

        if ($message instanceof Text) {
            return $message->getContent();
        }

        return null;
    }

    public function disconnect(): void
    {
        $this->getClient()->disconnect();
        $this->client = null;
    }

    public function isConnected(): bool
    {
        return $this->client !== null && $this->client->isConnected();
    }

    private function getClient(): Client
    {
        if ($this->client === null) {
            throw new \RuntimeException('WebSocket client is not connected. Call connect() first.');
        }

        return $this->client;
    }
}
