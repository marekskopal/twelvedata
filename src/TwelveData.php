<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData;

use MarekSkopal\TwelveData\Api\ReferenceData;
use MarekSkopal\TwelveData\Client\Client;

class TwelveData
{
    private readonly Client $client;

    public function __construct(string $apiKey)
    {
        $this->client = new Client($apiKey);
    }

    public function getReferenceData(): ReferenceData
    {
        return new ReferenceData($this->client);
    }
}
