<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\WebSocket;

readonly class HeartbeatEvent
{
    public function __construct(public string $event, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     event: string,
         *     status: string,
         * } $data
         */
        $data = json_decode($json, associative: true);

        return self::fromArray($data);
    }

    /**
     * @param array{
     *     event: string,
     *     status: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(event: $data['event'], status: $data['status']);
    }
}
