<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Client\Client;

abstract class TwelveDataApi
{
    public function __construct(protected readonly Client $client)
    {
    }
}
