<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Client\ClientInterface;

abstract class TwelveDataApi
{
    public function __construct(protected readonly ClientInterface $client)
    {
    }
}
