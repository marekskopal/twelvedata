<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\CoreData\CurrencyConversion;
use MarekSkopal\TwelveData\Dto\CoreData\EndOfDayPrice;
use MarekSkopal\TwelveData\Dto\CoreData\ExchangeRate;
use MarekSkopal\TwelveData\Dto\CoreData\MarketMovers;
use MarekSkopal\TwelveData\Dto\CoreData\Quote;
use MarekSkopal\TwelveData\Dto\CoreData\QuoteFiftyTwoWeek;
use MarekSkopal\TwelveData\Dto\CoreData\RealTimePrice;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeries;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeriesMeta;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeriesValue;
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
#[UsesClass(RealTimePrice::class)]
#[UsesClass(TimeSeries::class)]
#[UsesClass(TimeSeriesMeta::class)]
#[UsesClass(TimeSeriesValue::class)]
class CoreDataTest extends TestCase
{
    public function testTimeSeries(): void
    {
        $referenceData = new CoreData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            TimeSeries::class,
            $referenceData->timeSeries('AAPL', IntervalEnum::OneMinute),
        );
    }

    public function testExchangeRate(): void
    {
        $referenceData = new CoreData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            ExchangeRate::class,
            $referenceData->exchangeRate('USD/JPY'),
        );
    }

    public function testCurrencyConversion(): void
    {
        $referenceData = new CoreData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            CurrencyConversion::class,
            $referenceData->currencyConversion('USD/JPY', 122),
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

    public function testRealTimePrice(): void
    {
        $referenceData = new CoreData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            RealTimePrice::class,
            $referenceData->realTimePrice('AAPL'),
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
