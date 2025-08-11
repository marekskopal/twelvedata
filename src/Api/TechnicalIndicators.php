<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\OverlapStudies;
use MarekSkopal\TwelveData\Client\ClientInterface;

readonly class TechnicalIndicators extends TwelveDataApi
{
    public OverlapStudies $overlapStudies;

    public function __construct(ClientInterface $client)
    {
        $this->overlapStudies = new OverlapStudies($client);

        parent::__construct($client);
    }
}
