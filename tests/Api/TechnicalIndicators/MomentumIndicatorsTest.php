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
}
