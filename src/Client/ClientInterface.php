<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Client;

interface ClientInterface
{
    /** @param array<string, scalar|null> $queryParams */
    public function get(string $path, array $queryParams, int $retryCount = 0): string;
}
