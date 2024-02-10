<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Advanced;

use DateTimeImmutable;

readonly class ApiUsage
{
    public function __construct(public DateTimeImmutable $timestamp, public int $currentUsage, public int $planLimit,)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     timestamp: string,
         *     current_usage: int,
         *     plan_limit: int,
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     timestamp: string,
     *     current_usage: int,
     *     plan_limit: int,
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            timestamp: new DateTimeImmutable($data['timestamp']),
            currentUsage: $data['current_usage'],
            planLimit: $data['plan_limit'],
        );
    }
}
