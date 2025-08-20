<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\CycleIndicators;
use MarekSkopal\TwelveData\Api\TechnicalIndictors\MomentumIndicators;
use MarekSkopal\TwelveData\Api\TechnicalIndictors\OverlapStudies;
use MarekSkopal\TwelveData\Api\TechnicalIndictors\PriceTransform;
use MarekSkopal\TwelveData\Api\TechnicalIndictors\StatisticFunctions;
use MarekSkopal\TwelveData\Api\TechnicalIndictors\VolatilityIndicators;
use MarekSkopal\TwelveData\Api\TechnicalIndictors\VolumeIndicators;
use MarekSkopal\TwelveData\Client\ClientInterface;

readonly class TechnicalIndicators extends TwelveDataApi
{
    public OverlapStudies $overlapStudies;

    public MomentumIndicators $momentumIndicators;

    public VolumeIndicators $volumeIndicators;

    public VolatilityIndicators $volatilityIndicators;

    public PriceTransform $priceTransform;

    public CycleIndicators $cycleIndicators;

    public StatisticFunctions $statisticFunctions;

    public function __construct(ClientInterface $client)
    {
        $this->overlapStudies = new OverlapStudies($client);
        $this->momentumIndicators = new MomentumIndicators($client);
        $this->volumeIndicators = new VolumeIndicators($client);
        $this->volatilityIndicators = new VolatilityIndicators($client);
        $this->priceTransform = new PriceTransform($client);
        $this->cycleIndicators = new CycleIndicators($client);
        $this->statisticFunctions = new StatisticFunctions($client);

        parent::__construct($client);
    }
}
