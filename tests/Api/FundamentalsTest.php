<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Api\Fundamentals;
use MarekSkopal\TwelveData\Dto\Dividends;
use MarekSkopal\TwelveData\Dto\Logo;
use MarekSkopal\TwelveData\Dto\Profile;
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

    public function testDividends(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Dividends::class,
            $fundamentals->dividends('AAPL'),
        );
    }
}
