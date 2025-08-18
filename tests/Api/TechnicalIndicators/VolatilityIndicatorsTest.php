<?php

declare(strict_types=1);

namespace Api\TechnicalIndicators;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\VolatilityIndicators;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\Meta;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators\AverageTrueRange;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators\NormalizedAverageTrueRange;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators\Supertrend;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators\SupertrendHeikinAshiCandles;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\VolatilityIndicators\TrueRange;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(VolatilityIndicators::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(TechnicalIndicator::class)]
#[UsesClass(Meta::class)]
#[UsesClass(MetaIndicator::class)]
#[UsesClass(AverageTrueRange::class)]
#[UsesClass(NormalizedAverageTrueRange::class)]
#[UsesClass(Supertrend::class)]
#[UsesClass(SupertrendHeikinAshiCandles::class)]
#[UsesClass(TrueRange::class)]
final class VolatilityIndicatorsTest extends TestCase
{
    public function testAverageTrueRange(): void
    {
        $volatilityIndicators = new VolatilityIndicators(ClientFixture::createWithResponse('average_true_range.json'));

        self::assertInstanceOf(
            AverageTrueRange::class,
            $volatilityIndicators->averageTrueRange('AAPL')->values[0],
        );
    }

    public function testNormalizedAverageTrueRange(): void
    {
        $volatilityIndicators = new VolatilityIndicators(ClientFixture::createWithResponse('normalized_average_true_range.json'));

        self::assertInstanceOf(
            NormalizedAverageTrueRange::class,
            $volatilityIndicators->normalizedAverageTrueRange('AAPL')->values[0],
        );
    }

    public function testSupertrend(): void
    {
        $volatilityIndicators = new VolatilityIndicators(ClientFixture::createWithResponse('supertrend.json'));

        self::assertInstanceOf(
            Supertrend::class,
            $volatilityIndicators->supertrend('AAPL')->values[0],
        );
    }

    public function testSupertrendHeikinAshiCandles(): void
    {
        $volatilityIndicators = new VolatilityIndicators(ClientFixture::createWithResponse('supertrend_heikin_ashi_candles.json'));

        self::assertInstanceOf(
            SupertrendHeikinAshiCandles::class,
            $volatilityIndicators->supertrendHeikinAshiCandles('AAPL')->values[0],
        );
    }

    public function testTrueRange(): void
    {
        $volatilityIndicators = new VolatilityIndicators(ClientFixture::createWithResponse('true_range.json'));

        self::assertInstanceOf(
            TrueRange::class,
            $volatilityIndicators->trueRange('AAPL')->values[0],
        );
    }
}
