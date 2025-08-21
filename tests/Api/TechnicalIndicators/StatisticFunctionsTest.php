<?php

declare(strict_types=1);

namespace Api\TechnicalIndicators;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\StatisticFunctions;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\Meta;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\BetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\Correlation;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\LinearRegression;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\LinearRegressionAngle;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\LinearRegressionIntercept;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\LinearRegressionSlope;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StatisticFunctions::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(TechnicalIndicator::class)]
#[UsesClass(Meta::class)]
#[UsesClass(MetaIndicator::class)]
#[UsesClass(BetaIndicator::class)]
#[UsesClass(Correlation::class)]
#[UsesClass(LinearRegression::class)]
#[UsesClass(LinearRegressionAngle::class)]
#[UsesClass(LinearRegressionIntercept::class)]
#[UsesClass(LinearRegressionSlope::class)]
final class StatisticFunctionsTest extends TestCase
{
    public function testBetaIndicator(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('beta_indicator.json'));

        self::assertInstanceOf(
            BetaIndicator::class,
            $statisticFunctions->betaIndicator('AAPL')->values[0],
        );
    }

    public function testCorrelation(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('correlation.json'));

        self::assertInstanceOf(
            Correlation::class,
            $statisticFunctions->correlation('AAPL')->values[0],
        );
    }

    public function testLinearRegression(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('linear_regression.json'));

        self::assertInstanceOf(
            LinearRegression::class,
            $statisticFunctions->linearRegression('AAPL')->values[0],
        );
    }

    public function testLinearRegressionAngle(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('linear_regression_angle.json'));

        self::assertInstanceOf(
            LinearRegressionAngle::class,
            $statisticFunctions->linearRegressionAngle('AAPL')->values[0],
        );
    }

    public function testLinearRegressionIntercept(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('linear_regression_intercept.json'));

        self::assertInstanceOf(
            LinearRegressionIntercept::class,
            $statisticFunctions->linearRegressionIntercept('AAPL')->values[0],
        );
    }

    public function testLinearRegressionSlope(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('linear_regression_slope.json'));

        self::assertInstanceOf(
            LinearRegressionSlope::class,
            $statisticFunctions->linearRegressionSlope('AAPL')->values[0],
        );
    }
}
