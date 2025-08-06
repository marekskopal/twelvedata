<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData;

use MarekSkopal\TwelveData\Api\Advanced;
use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Api\Fundamentals;
use MarekSkopal\TwelveData\Api\ReferenceData;
use MarekSkopal\TwelveData\Api\Regulatory;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;

readonly class TwelveData
{
    public ReferenceData $referenceData;

    public CoreData $coreData;

    public Fundamentals $fundamentals;

    public Regulatory $regulatory;

    public Advanced $advanced;

    public function __construct(Config $config)
    {
        $client = new Client($config);

        $this->coreData = new CoreData($client);
        $this->referenceData = new ReferenceData($client);
        $this->fundamentals = new Fundamentals($client);
        $this->regulatory = new Regulatory($client);
        $this->advanced = new Advanced($client);
    }

    public function getCoreData(): CoreData
    {
        return $this->coreData;
    }

    public function getReferenceData(): ReferenceData
    {
        return $this->referenceData;
    }

    public function getFundamentals(): Fundamentals
    {
        return $this->fundamentals;
    }

    public function getRegulatory(): Regulatory
    {
        return $this->regulatory;
    }

    public function getAdvanced(): Advanced
    {
        return $this->advanced;
    }
}
