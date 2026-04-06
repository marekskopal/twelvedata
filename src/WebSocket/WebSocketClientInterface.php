<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\WebSocket;

interface WebSocketClientInterface
{
    /** Connect to the given WebSocket URL. */
    public function connect(string $url): void;

    /** Send a text message over the WebSocket connection. */
    public function send(string $message): void;

    /**
     * Receive the next text message from the WebSocket connection.
     * Returns null if no message is available or the connection is closed.
     */
    public function receive(): ?string;

    /** Close the WebSocket connection. */
    public function disconnect(): void;

    /** Whether the connection is currently open. */
    public function isConnected(): bool;
}
