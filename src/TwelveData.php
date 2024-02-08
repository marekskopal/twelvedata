<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData;

use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Client\Client;

class TwelveData
{
    private readonly Client $client;

    private CoreData $coreData;

    public function __construct(string $apiKey)
    {
        $this->client = new Client($apiKey);
    }

    public function getCoreData(): CoreData
    {
        if (isset($this->coreData)) {
            return $this->coreData;
        }

        $this->coreData = new CoreData($this->client);

        return $this->coreData;
    }
}
