<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\Fundamentals;
use MarekSkopal\TwelveData\Dto\Dividends;
use MarekSkopal\TwelveData\Dto\Earnings;
use MarekSkopal\TwelveData\Dto\IncomeStatement;
use MarekSkopal\TwelveData\Dto\InsiderTransactions;
use MarekSkopal\TwelveData\Dto\Logo;
use MarekSkopal\TwelveData\Dto\Profile;
use MarekSkopal\TwelveData\Dto\Splits;
use MarekSkopal\TwelveData\Dto\Statistics;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Fundamentals::class)]
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

    public function testSplits(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Splits::class,
            $fundamentals->splits('AAPL'),
        );
    }

    public function testEarnings(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Earnings::class,
            $fundamentals->earnings('AAPL'),
        );
    }

    public function testStatistics(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Statistics::class,
            $fundamentals->statistics('AAPL'),
        );
    }

    public function testInsiderTransactions(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            InsiderTransactions::class,
            $fundamentals->insiderTransactions('AAPL'),
        );
    }

    public function testIncomeStatement(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            IncomeStatement::class,
            $fundamentals->incomeStatement('AAPL'),
        );
    }
}
