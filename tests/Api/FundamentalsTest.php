<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Api\Fundamentals;
use MarekSkopal\TwelveData\Dto\CurrencyConversion;
use MarekSkopal\TwelveData\Dto\EndOfDayPrice;
use MarekSkopal\TwelveData\Dto\ExchangeRate;
use MarekSkopal\TwelveData\Dto\Logo;
use MarekSkopal\TwelveData\Dto\Profile;
use MarekSkopal\TwelveData\Dto\Quote;
use MarekSkopal\TwelveData\Dto\RealTImePrice;
use MarekSkopal\TwelveData\Dto\TimeSeries;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CoreData::class)]
class FundamentalsTest extends TestCase
{
    public function testLogo(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Logo::class,
            $fundamentals->logo('AAPL'),
        );
    }

    public function testProfile(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Profile::class,
            $fundamentals->profile('AAPL'),
        );
    }
}
