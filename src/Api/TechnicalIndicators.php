<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Api\TechnicalIndicators\CycleIndicators;
use MarekSkopal\TwelveData\Api\TechnicalIndicators\MomentumIndicators;
use MarekSkopal\TwelveData\Api\TechnicalIndicators\OverlapStudies;
use MarekSkopal\TwelveData\Api\TechnicalIndicators\PriceTransform;
use MarekSkopal\TwelveData\Api\TechnicalIndicators\StatisticFunctions;
use MarekSkopal\TwelveData\Api\TechnicalIndicators\VolatilityIndicators;
use MarekSkopal\TwelveData\Api\TechnicalIndicators\VolumeIndicators;
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
