<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData;

use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Api\Fundamentals;
use MarekSkopal\TwelveData\Api\ReferenceData;
use MarekSkopal\TwelveData\Client\Client;

class TwelveData
{
    private readonly Client $client;

    private ReferenceData $referenceData;

    private CoreData $coreData;

    private Fundamentals $fundamentals;

    public function __construct(string $apiKey)
    {
        $this->client = new Client($apiKey);
    }

    public function getReferenceData(): ReferenceData
    {
        if (isset($this->referenceData)) {
            return $this->referenceData;
        }

        $this->referenceData = new ReferenceData($this->client);

        return $this->referenceData;
    }

    public function getCoreData(): CoreData
    {
        if (isset($this->coreData)) {
            return $this->coreData;
        }

        $this->coreData = new CoreData($this->client);

        return $this->coreData;
    }

    public function getFundamentals(): Fundamentals
    {
        if (isset($this->fundamentals)) {
            return $this->fundamentals;
        }

        $this->fundamentals = new Fundamentals($this->client);

        return $this->fundamentals;
    }
}
