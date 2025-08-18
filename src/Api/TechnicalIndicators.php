<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\MomentumIndicators;
use MarekSkopal\TwelveData\Api\TechnicalIndictors\OverlapStudies;
use MarekSkopal\TwelveData\Api\TechnicalIndictors\VolatilityIndicators;
use MarekSkopal\TwelveData\Api\TechnicalIndictors\VolumeIndicators;
use MarekSkopal\TwelveData\Client\ClientInterface;

readonly class TechnicalIndicators extends TwelveDataApi
{
    public OverlapStudies $overlapStudies;

    public MomentumIndicators $momentumIndicators;

    public VolumeIndicators $volumeIndicators;

    public VolatilityIndicators $volatilityIndicators;

    public function __construct(ClientInterface $client)
    {
        $this->overlapStudies = new OverlapStudies($client);
        $this->momentumIndicators = new MomentumIndicators($client);
        $this->volumeIndicators = new VolumeIndicators($client);
        $this->volatilityIndicators = new VolatilityIndicators($client);

        parent::__construct($client);
    }
}
