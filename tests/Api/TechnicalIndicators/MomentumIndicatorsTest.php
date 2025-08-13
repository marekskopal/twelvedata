<?php

declare(strict_types=1);

namespace Api\TechnicalIndicators;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\MomentumIndicators;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\Meta;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\AbsolutePriceOscillator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\AroonIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\AroonOscillator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\AverageDirectionalIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\AverageDirectionalMovementIndexRating;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\BalanceOfPower;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\ChandeMomentumOscillator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\CommodityChannelIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\ConnorsRelativeStrengthIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\CoppockCurve;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\DetrendedPriceOscillator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\DirectionalMovementIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\KnowSureThing;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\MinusDirectionalIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\MinusDirectionalMovement;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\Momentum;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\MoneyFlowIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\MovingAverageConvergenceDivergence;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MomentumIndicators\MovingAverageConvergenceDivergenceSlope;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MomentumIndicators::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(TechnicalIndicator::class)]
#[UsesClass(Meta::class)]
#[UsesClass(MetaIndicator::class)]
#[UsesClass(AverageDirectionalIndex::class)]
#[UsesClass(AverageDirectionalMovementIndexRating::class)]
#[UsesClass(AbsolutePriceOscillator::class)]
#[UsesClass(AroonIndicator::class)]
#[UsesClass(AroonOscillator::class)]
#[UsesClass(BalanceOfPower::class)]
#[UsesClass(CommodityChannelIndex::class)]
#[UsesClass(ChandeMomentumOscillator::class)]
#[UsesClass(CoppockCurve::class)]
#[UsesClass(ConnorsRelativeStrengthIndex::class)]
#[UsesClass(DetrendedPriceOscillator::class)]
#[UsesClass(DirectionalMovementIndex::class)]
#[UsesClass(KnowSureThing::class)]
#[UsesClass(MovingAverageConvergenceDivergence::class)]
#[UsesClass(MovingAverageConvergenceDivergenceSlope::class)]
#[UsesClass(MoneyFlowIndex::class)]
#[UsesClass(MinusDirectionalIndicator::class)]
#[UsesClass(MinusDirectionalMovement::class)]
#[UsesClass(Momentum::class)]
final class MomentumIndicatorsTest extends TestCase
{
    public function testAverageDirectionalIndex(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('average_directional_index.json'));

        self::assertInstanceOf(
            AverageDirectionalIndex::class,
            $momentumIndicators->averageDirectionalIndex('AAPL')->values[0],
        );
    }

    public function testAverageDirectionalMovementIndexRating(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('average_directional_movement_index_rating.json'));

        self::assertInstanceOf(
            AverageDirectionalMovementIndexRating::class,
            $momentumIndicators->averageDirectionalMovementIndexRating('AAPL')->values[0],
        );
    }

    public function testAbsolutePriceOscillator(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('absolute_price_oscillator.json'));

        self::assertInstanceOf(
            AbsolutePriceOscillator::class,
            $momentumIndicators->absolutePriceOscillator('AAPL')->values[0],
        );
    }

    public function testAroonIndicator(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('aroon_indicator.json'));

        self::assertInstanceOf(
            AroonIndicator::class,
            $momentumIndicators->aroonIndicator('AAPL')->values[0],
        );
    }

    public function testAroonOscillator(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('aroon_oscillator.json'));

        self::assertInstanceOf(
            AroonOscillator::class,
            $momentumIndicators->aroonOscillator('AAPL')->values[0],
        );
    }

    public function testBalanceOfPower(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('balance_of_power.json'));

        self::assertInstanceOf(
            BalanceOfPower::class,
            $momentumIndicators->balanceOfPower('AAPL')->values[0],
        );
    }

    public function testCommodityChannelIndex(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('commodity_channel_index.json'));

        self::assertInstanceOf(
            CommodityChannelIndex::class,
            $momentumIndicators->commodityChannelIndex('AAPL')->values[0],
        );
    }

    public function testChandeMomentumOscillator(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('chande_momentum_oscillator.json'));

        self::assertInstanceOf(
            ChandeMomentumOscillator::class,
            $momentumIndicators->chandeMomentumOscillator('AAPL')->values[0],
        );
    }

    public function testCoppockCurve(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('coppock_curve.json'));

        self::assertInstanceOf(
            CoppockCurve::class,
            $momentumIndicators->coppockCurve('AAPL')->values[0],
        );
    }

    public function testConnorsRelativeStrengthIndex(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('connors_relative_strength_index.json'));

        self::assertInstanceOf(
            ConnorsRelativeStrengthIndex::class,
            $momentumIndicators->connorsRelativeStrengthIndex('AAPL')->values[0],
        );
    }

    public function testDetrendedPriceOscillator(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('detrended_price_oscillator.json'));

        self::assertInstanceOf(
            DetrendedPriceOscillator::class,
            $momentumIndicators->detrendedPriceOscillator('AAPL')->values[0],
        );
    }

    public function testDirectionalMovementIndex(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('directional_movement_index.json'));

        self::assertInstanceOf(
            DirectionalMovementIndex::class,
            $momentumIndicators->directionalMovementIndex('AAPL')->values[0],
        );
    }

    public function testKnowSureThing(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('know_sure_thing.json'));

        self::assertInstanceOf(
            KnowSureThing::class,
            $momentumIndicators->knowSureThing('AAPL')->values[0],
        );
    }

    public function testMovingAverageConvergenceDivergence(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('moving_average_convergence_divergence.json'));

        self::assertInstanceOf(
            MovingAverageConvergenceDivergence::class,
            $momentumIndicators->movingAverageConvergenceDivergence('AAPL')->values[0],
        );
    }

    public function testMovingAverageConvergenceDivergenceSlope(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('moving_average_convergence_divergence_slope.json'));

        self::assertInstanceOf(
            MovingAverageConvergenceDivergenceSlope::class,
            $momentumIndicators->movingAverageConvergenceDivergenceSlope('AAPL')->values[0],
        );
    }

    public function testMovingAverageConvergenceDivergenceExtension(): void
    {
        $momentumIndicators = new MomentumIndicators(
            ClientFixture::createWithResponse('moving_average_convergence_divergence_extension.json'),
        );

        self::assertInstanceOf(
            MovingAverageConvergenceDivergence::class,
            $momentumIndicators->movingAverageConvergenceDivergenceExtension('AAPL')->values[0],
        );
    }

    public function testMoneyFlowIndex(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('money_flow_index.json'));

        self::assertInstanceOf(
            MoneyFlowIndex::class,
            $momentumIndicators->moneyFlowIndex('AAPL')->values[0],
        );
    }

    public function testMinusDirectionalIndicator(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('minus_directional_indicator.json'));

        self::assertInstanceOf(
            MinusDirectionalIndicator::class,
            $momentumIndicators->minusDirectionalIndicator('AAPL')->values[0],
        );
    }

    public function testMinusDirectionalMovement(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('minus_directional_movement.json'));

        self::assertInstanceOf(
            MinusDirectionalMovement::class,
            $momentumIndicators->minusDirectionalMovement('AAPL')->values[0],
        );
    }

    public function testMomentum(): void
    {
        $momentumIndicators = new MomentumIndicators(ClientFixture::createWithResponse('momentum.json'));

        self::assertInstanceOf(
            Momentum::class,
            $momentumIndicators->momentum('AAPL')->values[0],
        );
    }
}
