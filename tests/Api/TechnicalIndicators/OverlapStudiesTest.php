<?php

declare(strict_types=1);

namespace Api\TechnicalIndicators;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\OverlapStudies;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\Meta;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\BollingerBands;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\DoubleExponentialMovingAverage;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\ExponentialMovingAverage;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\HilbertTransformInstantaneousTrendline;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\IchimokuCloud;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\KaufmanAdaptiveMovingAverage;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\KeltnerChannel;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\McGinleyDynamicIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\MesaAdaptiveMovingAverage;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\Midpoint;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\Midprice;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\MovingAverage;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\ParabolicStopAndReverse;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\ParabolicStopAndReverseExtended;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\PivotPointsHighLow;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(OverlapStudies::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(TechnicalIndicator::class)]
#[UsesClass(Meta::class)]
#[UsesClass(MetaIndicator::class)]
#[UsesClass(BollingerBands::class)]
#[UsesClass(DoubleExponentialMovingAverage::class)]
#[UsesClass(ExponentialMovingAverage::class)]
#[UsesClass(HilbertTransformInstantaneousTrendline::class)]
#[UsesClass(IchimokuCloud::class)]
#[UsesClass(KaufmanAdaptiveMovingAverage::class)]
#[UsesClass(KeltnerChannel::class)]
#[UsesClass(MovingAverage::class)]
#[UsesClass(MesaAdaptiveMovingAverage::class)]
#[UsesClass(McGinleyDynamicIndicator::class)]
#[UsesClass(Midpoint::class)]
#[UsesClass(Midprice::class)]
#[UsesClass(PivotPointsHighLow::class)]
#[UsesClass(ParabolicStopAndReverse::class)]
#[UsesClass(ParabolicStopAndReverseExtended::class)]
final class OverlapStudiesTest extends TestCase
{
    public function testBollingerBands(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('bollinger_bands.json'));

        self::assertInstanceOf(
            BollingerBands::class,
            $overlapStudies->bollingerBands('AAPL')->values[0],
        );
    }

    public function testDoubleExponentialMovingAverage(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('double_exponential_moving_average.json'));

        self::assertInstanceOf(
            DoubleExponentialMovingAverage::class,
            $overlapStudies->doubleExponentialMovingAverage('AAPL')->values[0],
        );
    }

    public function testExponentialMovingAverage(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('exponential_moving_average.json'));

        self::assertInstanceOf(
            ExponentialMovingAverage::class,
            $overlapStudies->exponentialMovingAverage('AAPL')->values[0],
        );
    }

    public function testHilbertTransformInstantaneousTrendline(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('hilbert_transform_instantaneous_trendline.json'));

        self::assertInstanceOf(
            HilbertTransformInstantaneousTrendline::class,
            $overlapStudies->hilbertTransformInstantaneousTrendline('AAPL')->values[0],
        );
    }

    public function testIchimokuCloud(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('ichimoku_cloud.json'));

        self::assertInstanceOf(
            IchimokuCloud::class,
            $overlapStudies->ichimokuCloud('AAPL')->values[0],
        );
    }

    public function testKaufmanAdaptiveMovingAverage(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('kaufman_adaptive_moving_average.json'));

        self::assertInstanceOf(
            KaufmanAdaptiveMovingAverage::class,
            $overlapStudies->kaufmanAdaptiveMovingAverage('AAPL')->values[0],
        );
    }

    public function testKeltnerChannel(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('keltner_channel.json'));

        self::assertInstanceOf(
            KeltnerChannel::class,
            $overlapStudies->keltnerChannel('AAPL')->values[0],
        );
    }

    public function testMovingAverage(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('moving_average.json'));

        self::assertInstanceOf(
            MovingAverage::class,
            $overlapStudies->movingAverage('AAPL')->values[0],
        );
    }

    public function testMesaAdaptiveMovingAverage(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('mesa_adaptive_moving_average.json'));

        self::assertInstanceOf(
            MesaAdaptiveMovingAverage::class,
            $overlapStudies->mesaAdaptiveMovingAverage('AAPL')->values[0],
        );
    }

    public function testMcGinleyDynamicIndicator(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('mcginley_dynamic_indicator.json'));

        self::assertInstanceOf(
            McGinleyDynamicIndicator::class,
            $overlapStudies->mcGinleyDynamicIndicator('AAPL')->values[0],
        );
    }

    public function testMidpoint(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('midpoint.json'));

        self::assertInstanceOf(
            Midpoint::class,
            $overlapStudies->midpoint('AAPL')->values[0],
        );
    }

    public function testMidprice(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('midprice.json'));

        self::assertInstanceOf(
            Midprice::class,
            $overlapStudies->midprice('AAPL')->values[0],
        );
    }

    public function testPivotPointsHighLow(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('pivot_points_high_low.json'));

        self::assertInstanceOf(
            PivotPointsHighLow::class,
            $overlapStudies->pivotPointsHighLow('AAPL')->values[0],
        );
    }

    public function testParabolicStopAndReverse(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('parabolic_stop_and_reverse.json'));

        self::assertInstanceOf(
            ParabolicStopAndReverse::class,
            $overlapStudies->parabolicStopAndReverse('AAPL')->values[0],
        );
    }

    public function testParabolicStopAndReverseExtended(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('parabolic_stop_and_reverse_extended.json'));

        self::assertInstanceOf(
            ParabolicStopAndReverseExtended::class,
            $overlapStudies->parabolicStopAndReverseExtended('AAPL')->values[0],
        );
    }
}
