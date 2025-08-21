<?php

declare(strict_types=1);

namespace Api\TechnicalIndicators;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\VolumeIndicators;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\Meta;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators\AccumulationDistribution;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators\AccumulationDistributionOscillator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators\OnBalanceVolume;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolumeIndicators\RelativeVolume;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(VolumeIndicators::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(TechnicalIndicator::class)]
#[UsesClass(Meta::class)]
#[UsesClass(MetaIndicator::class)]
#[UsesClass(AccumulationDistribution::class)]
#[UsesClass(AccumulationDistributionOscillator::class)]
#[UsesClass(OnBalanceVolume::class)]
#[UsesClass(RelativeVolume::class)]
final class VolumeIndicatorsTest extends TestCase
{
    public function testAccumulationDistribution(): void
    {
        $volumeIndicators = new VolumeIndicators(ClientFixture::createWithResponse('accumulation_distribution.json'));

        self::assertInstanceOf(
            AccumulationDistribution::class,
            $volumeIndicators->accumulationDistribution('AAPL')->values[0],
        );
    }

    public function testAccumulationDistributionOscillator(): void
    {
        $volumeIndicators = new VolumeIndicators(ClientFixture::createWithResponse('accumulation_distribution_oscillator.json'));

        self::assertInstanceOf(
            AccumulationDistributionOscillator::class,
            $volumeIndicators->accumulationDistributionOscillator('AAPL')->values[0],
        );
    }

    public function testOnBalanceVolume(): void
    {
        $volumeIndicators = new VolumeIndicators(ClientFixture::createWithResponse('on_balance_volume.json'));

        self::assertInstanceOf(
            OnBalanceVolume::class,
            $volumeIndicators->onBalanceVolume('AAPL')->values[0],
        );
    }

    public function testRelativeVolume(): void
    {
        $volumeIndicators = new VolumeIndicators(ClientFixture::createWithResponse('relative_volume.json'));

        self::assertInstanceOf(
            RelativeVolume::class,
            $volumeIndicators->relativeVolume('AAPL')->values[0],
        );
    }
}
