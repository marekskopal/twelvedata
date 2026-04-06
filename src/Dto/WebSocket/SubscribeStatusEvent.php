<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\WebSocket;

readonly class SubscribeStatusEvent
{
    /**
     * @param list<SubscribeStatusSymbol> $success
     * @param list<SubscribeStatusSymbol> $fails
     */
    public function __construct(public string $event, public string $status, public array $success, public array $fails,)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     event: string,
         *     status: string,
         *     success: list<array{symbol: string, exchange: string, mic_code: string, country: string, type: string}>,
         *     fails: list<array{symbol: string, exchange: string, mic_code: string, country: string, type: string}>,
         * } $data
         */
        $data = json_decode($json, associative: true);

        return self::fromArray($data);
    }

    /**
     * @param array{
     *     event: string,
     *     status: string,
     *     success: list<array{symbol: string, exchange: string, mic_code: string, country: string, type: string}>,
     *     fails: list<array{symbol: string, exchange: string, mic_code: string, country: string, type: string}>,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            event: $data['event'],
            status: $data['status'],
            success: array_map(
                static fn(array $item): SubscribeStatusSymbol => SubscribeStatusSymbol::fromArray($item),
                $data['success'],
            ),
            fails: array_map(
                static fn(array $item): SubscribeStatusSymbol => SubscribeStatusSymbol::fromArray($item),
                $data['fails'],
            ),
        );
    }
}
