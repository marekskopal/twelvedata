<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Client\ClientInterface;

abstract readonly class TwelveDataApi
{
    public function __construct(protected ClientInterface $client)
    {
    }
}
