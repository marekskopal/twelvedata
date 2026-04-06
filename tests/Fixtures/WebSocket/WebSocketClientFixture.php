<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Fixtures\WebSocket;

use MarekSkopal\TwelveData\WebSocket\WebSocketClientInterface;

final class WebSocketClientFixture implements WebSocketClientInterface
{
    /** @var list<string> */
    private array $messages;

    private bool $connected = false;

    /** @var list<string> */
    private array $sentMessages = [];

    /** @param list<string> $messages */
    public function __construct(array $messages = [])
    {
        $this->messages = $messages;
    }

    /** @param list<string> $messages */
    public static function createWithMessages(array $messages): self
    {
        return new self($messages);
    }

    public function connect(string $url): void
    {
        $this->connected = true;
    }

    public function send(string $message): void
    {
        $this->sentMessages[] = $message;
    }

    public function receive(): ?string
    {
        return array_shift($this->messages);
    }

    public function disconnect(): void
    {
        $this->connected = false;
    }

    public function isConnected(): bool
    {
        return $this->connected;
    }

    /** @return list<string> */
    public function getSentMessages(): array
    {
        return $this->sentMessages;
    }
}
