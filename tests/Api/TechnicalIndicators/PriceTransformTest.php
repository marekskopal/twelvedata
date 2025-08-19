<?php

declare(strict_types=1);

namespace Api\TechnicalIndicators;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\PriceTransform;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\Meta;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Addition;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Average;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\AveragePrice;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Base10Logarithm;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Ceiling;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Division;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Exponential;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Floor;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\HeikinashiCandles;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\HighLowCloseAverage;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\MedianPrice;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Multiplication;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\NaturalLogarithm;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\SquareRoot;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Subtraction;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Summation;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\TypicalPrice;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\WeightedClosePrice;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PriceTransform::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(TechnicalIndicator::class)]
#[UsesClass(Meta::class)]
#[UsesClass(MetaIndicator::class)]
#[UsesClass(Addition::class)]
#[UsesClass(Average::class)]
#[UsesClass(AveragePrice::class)]
#[UsesClass(Ceiling::class)]
#[UsesClass(Division::class)]
#[UsesClass(Exponential::class)]
#[UsesClass(Floor::class)]
#[UsesClass(HeikinashiCandles::class)]
#[UsesClass(HighLowCloseAverage::class)]
#[UsesClass(MedianPrice::class)]
#[UsesClass(Multiplication::class)]
#[UsesClass(NaturalLogarithm::class)]
#[UsesClass(Base10Logarithm::class)]
#[UsesClass(SquareRoot::class)]
#[UsesClass(Subtraction::class)]
#[UsesClass(Summation::class)]
#[UsesClass(TypicalPrice::class)]
#[UsesClass(WeightedClosePrice::class)]
final class PriceTransformTest extends TestCase
{
    public function testAddition(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('addition.json'));

        self::assertInstanceOf(
            Addition::class,
            $priceTransform->addition('AAPL')->values[0],
        );
    }

    public function testAverage(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('average.json'));

        self::assertInstanceOf(
            Average::class,
            $priceTransform->average('AAPL')->values[0],
        );
    }

    public function testAveragePrice(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('average_price.json'));

        self::assertInstanceOf(
            AveragePrice::class,
            $priceTransform->averagePrice('AAPL')->values[0],
        );
    }

    public function testCeiling(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('ceiling.json'));

        self::assertInstanceOf(
            Ceiling::class,
            $priceTransform->ceiling('AAPL')->values[0],
        );
    }

    public function testDivision(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('division.json'));

        self::assertInstanceOf(
            Division::class,
            $priceTransform->division('AAPL')->values[0],
        );
    }

    public function testExponential(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('exponential.json'));

        self::assertInstanceOf(
            Exponential::class,
            $priceTransform->exponential('AAPL')->values[0],
        );
    }

    public function testFloor(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('floor.json'));

        self::assertInstanceOf(
            Floor::class,
            $priceTransform->floor('AAPL')->values[0],
        );
    }

    public function testHeikinashiCandles(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('heikinashi_candles.json'));

        self::assertInstanceOf(
            HeikinashiCandles::class,
            $priceTransform->heikinashiCandles('AAPL')->values[0],
        );
    }

    public function testHighLowCloseAverage(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('high_low_close_average.json'));

        self::assertInstanceOf(
            HighLowCloseAverage::class,
            $priceTransform->highLowCloseAverage('AAPL')->values[0],
        );
    }

    public function testNaturalLogarithm(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('natural_logarithm.json'));

        self::assertInstanceOf(
            NaturalLogarithm::class,
            $priceTransform->naturalLogarithm('AAPL')->values[0],
        );
    }

    public function testBase10Logarithm(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('base10_logarithm.json'));

        self::assertInstanceOf(
            Base10Logarithm::class,
            $priceTransform->base10Logarithm('AAPL')->values[0],
        );
    }

    public function testMedianPrice(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('median_price.json'));

        self::assertInstanceOf(
            MedianPrice::class,
            $priceTransform->medianPrice('AAPL')->values[0],
        );
    }

    public function testMultiplication(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('multiplication.json'));

        self::assertInstanceOf(
            Multiplication::class,
            $priceTransform->multiplication('AAPL')->values[0],
        );
    }

    public function testSquareRoot(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('square_root.json'));

        self::assertInstanceOf(
            SquareRoot::class,
            $priceTransform->squareRoot('AAPL')->values[0],
        );
    }

    public function testSubtraction(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('subtraction.json'));

        self::assertInstanceOf(
            Subtraction::class,
            $priceTransform->subtraction('AAPL')->values[0],
        );
    }

    public function testSummation(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('summation.json'));

        self::assertInstanceOf(
            Summation::class,
            $priceTransform->summation('AAPL')->values[0],
        );
    }

    public function testTypicalPrice(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('typical_price.json'));

        self::assertInstanceOf(
            TypicalPrice::class,
            $priceTransform->typicalPrice('AAPL')->values[0],
        );
    }

    public function testWeightedClosePrice(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('weighted_close_price.json'));

        self::assertInstanceOf(
            WeightedClosePrice::class,
            $priceTransform->weightedClosePrice('AAPL')->values[0],
        );
    }
}
