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
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\Maximum;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\MaximumIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\Minimum;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\MinimumAndMaximum;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\MinimumAndMaximumIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\MinimumIndex;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\StandardDeviation;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\TimeSeriesForecast;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\Variance;
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
#[UsesClass(Maximum::class)]
#[UsesClass(MaximumIndex::class)]
#[UsesClass(Minimum::class)]
#[UsesClass(MinimumIndex::class)]
#[UsesClass(MinimumAndMaximum::class)]
#[UsesClass(MinimumAndMaximumIndex::class)]
#[UsesClass(StandardDeviation::class)]
#[UsesClass(TimeSeriesForecast::class)]
#[UsesClass(Variance::class)]
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

    public function testMaximum(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('maximum.json'));

        self::assertInstanceOf(
            Maximum::class,
            $statisticFunctions->maximum('AAPL')->values[0],
        );
    }

    public function testMaximumIndex(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('maximum_index.json'));

        self::assertInstanceOf(
            MaximumIndex::class,
            $statisticFunctions->maximumIndex('AAPL')->values[0],
        );
    }

    public function testMinimum(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('minimum.json'));

        self::assertInstanceOf(
            Minimum::class,
            $statisticFunctions->minimum('AAPL')->values[0],
        );
    }

    public function testMinimumIndex(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('minimum_index.json'));

        self::assertInstanceOf(
            MinimumIndex::class,
            $statisticFunctions->minimumIndex('AAPL')->values[0],
        );
    }

    public function testMinimumAndMaximum(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('minimum_and_maximum.json'));

        self::assertInstanceOf(
            MinimumAndMaximum::class,
            $statisticFunctions->minimumAndMaximum('AAPL')->values[0],
        );
    }

    public function testMinimumAndMaximumIndex(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('minimum_and_maximum_index.json'));

        self::assertInstanceOf(
            MinimumAndMaximumIndex::class,
            $statisticFunctions->minimumAndMaximumIndex('AAPL')->values[0],
        );
    }

    public function testStandardDeviation(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('standard_deviation.json'));

        self::assertInstanceOf(
            StandardDeviation::class,
            $statisticFunctions->standardDeviation('AAPL')->values[0],
        );
    }

    public function testTimeSeriesForecast(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('time_series_forecast.json'));

        self::assertInstanceOf(
            TimeSeriesForecast::class,
            $statisticFunctions->timeSeriesForecast('AAPL')->values[0],
        );
    }

    public function testVariance(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('variance.json'));

        self::assertInstanceOf(
            Variance::class,
            $statisticFunctions->variance('AAPL')->values[0],
        );
    }
}
