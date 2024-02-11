<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Config;

readonly class Config
{
    public function __construct(public string $apiKey, public int $tooManyRequestsRepeat = 6, public int $tooManyRequestsWaitTime = 10)
    {
    }
}
