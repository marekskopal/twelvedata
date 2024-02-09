<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Dto\CurrencyConversion;
use MarekSkopal\TwelveData\Dto\EndOfDayPrice;
use MarekSkopal\TwelveData\Dto\ExchangeRate;
use MarekSkopal\TwelveData\Dto\Quote;
use MarekSkopal\TwelveData\Dto\RealTImePrice;
use MarekSkopal\TwelveData\Dto\TimeSeries;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CoreData::class)]
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
            RealTImePrice::class,
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
}
