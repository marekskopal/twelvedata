<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\CoreData\EndOfDayPrice;
use MarekSkopal\TwelveData\Dto\CoreData\LatestPrice;
use MarekSkopal\TwelveData\Dto\CoreData\MarketMovers;
use MarekSkopal\TwelveData\Dto\CoreData\Quote;
use MarekSkopal\TwelveData\Dto\CoreData\QuoteFiftyTwoWeek;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeries;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeriesCross;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeriesMeta;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeriesValue;
use MarekSkopal\TwelveData\Dto\Currencies\CurrencyConversion;
use MarekSkopal\TwelveData\Dto\Currencies\ExchangeRate;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Enum\MarketMoverEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CoreData::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(CurrencyConversion::class)]
#[UsesClass(EndOfDayPrice::class)]
#[UsesClass(ExchangeRate::class)]
#[UsesClass(Quote::class)]
#[UsesClass(QuoteFiftyTwoWeek::class)]
#[UsesClass(LatestPrice::class)]
#[UsesClass(TimeSeries::class)]
#[UsesClass(TimeSeriesMeta::class)]
#[UsesClass(TimeSeriesValue::class)]
final class CoreDataTest extends TestCase
{
    public function testTimeSeries(): void
    {
        $referenceData = new CoreData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            TimeSeries::class,
            $referenceData->timeSeries('AAPL', IntervalEnum::OneMinute),
        );
    }

    public function testTimeSeriesCross(): void
    {
        $referenceData = new CoreData(ClientFixture::createWithResponse('time_series_cross.json'));

        $this->assertInstanceOf(
            TimeSeriesCross::class,
            $referenceData->timeSeriesCross('JPY', 'BTC', IntervalEnum::OneMinute),
        );
    }

    public function testQuote(): void
    {
        $referenceData = new CoreData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Quote::class,
            $referenceData->quote('AAPL'),
        );
    }

    public function testLatestPrice(): void
    {
        $referenceData = new CoreData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            LatestPrice::class,
            $referenceData->latestPrice('AAPL'),
        );
    }

    public function testEndOfDayPrice(): void
    {
        $referenceData = new CoreData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            EndOfDayPrice::class,
            $referenceData->endOfDayPrice('AAPL'),
        );
    }

    public function testMarketMovers(): void
    {
        $referenceData = new CoreData(ClientFixture::createWithResponse('market_movers_stocks.json'));

        $this->assertInstanceOf(
            MarketMovers::class,
            $referenceData->marketMovers(MarketMoverEnum::Stocks),
        );
    }
}
