<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\Fundamentals;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheet;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheetAssets;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheetBalanceSheet;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheetCurrentAssets;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheetCurrentLiabilities;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheetLiabilities;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheetNonCurrentAssets;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheetNonCurrentLiabilities;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheetShareholdersEquity;
use MarekSkopal\TwelveData\Dto\Fundamentals\CashFlow;
use MarekSkopal\TwelveData\Dto\Fundamentals\CashFlowCashFlow;
use MarekSkopal\TwelveData\Dto\Fundamentals\CashFlowFinancingActivities;
use MarekSkopal\TwelveData\Dto\Fundamentals\CashFlowInvestingActivities;
use MarekSkopal\TwelveData\Dto\Fundamentals\CashFlowOperatingActivities;
use MarekSkopal\TwelveData\Dto\Fundamentals\Dividends;
use MarekSkopal\TwelveData\Dto\Fundamentals\DividendsDividend;
use MarekSkopal\TwelveData\Dto\Fundamentals\Earnings;
use MarekSkopal\TwelveData\Dto\Fundamentals\EarningsEarning;
use MarekSkopal\TwelveData\Dto\Fundamentals\IncomeStatement;
use MarekSkopal\TwelveData\Dto\Fundamentals\IncomeStatementIncomeStatement;
use MarekSkopal\TwelveData\Dto\Fundamentals\IncomeStatementNonOperatingInterest;
use MarekSkopal\TwelveData\Dto\Fundamentals\IncomeStatementOperationExpense;
use MarekSkopal\TwelveData\Dto\Fundamentals\InsiderTransactions;
use MarekSkopal\TwelveData\Dto\Fundamentals\InsiderTransactionsInsiderTransaction;
use MarekSkopal\TwelveData\Dto\Fundamentals\Logo;
use MarekSkopal\TwelveData\Dto\Fundamentals\Meta;
use MarekSkopal\TwelveData\Dto\Fundamentals\Profile;
use MarekSkopal\TwelveData\Dto\Fundamentals\Splits;
use MarekSkopal\TwelveData\Dto\Fundamentals\SplitsSplit;
use MarekSkopal\TwelveData\Dto\Fundamentals\Statistics;
use MarekSkopal\TwelveData\Dto\Fundamentals\StatisticsBalanceSheet;
use MarekSkopal\TwelveData\Dto\Fundamentals\StatisticsCashFlow;
use MarekSkopal\TwelveData\Dto\Fundamentals\StatisticsDividendsAndSplits;
use MarekSkopal\TwelveData\Dto\Fundamentals\StatisticsFinancials;
use MarekSkopal\TwelveData\Dto\Fundamentals\StatisticsIncomeStatement;
use MarekSkopal\TwelveData\Dto\Fundamentals\StatisticsStatistics;
use MarekSkopal\TwelveData\Dto\Fundamentals\StatisticsStockPriceSummary;
use MarekSkopal\TwelveData\Dto\Fundamentals\StatisticsStockStatistics;
use MarekSkopal\TwelveData\Dto\Fundamentals\StatisticsValuationsMetrics;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Fundamentals::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(BalanceSheet::class)]
#[UsesClass(BalanceSheetAssets::class)]
#[UsesClass(BalanceSheetBalanceSheet::class)]
#[UsesClass(BalanceSheetCurrentAssets::class)]
#[UsesClass(BalanceSheetCurrentLiabilities::class)]
#[UsesClass(BalanceSheetLiabilities::class)]
#[UsesClass(BalanceSheetNonCurrentAssets::class)]
#[UsesClass(BalanceSheetNonCurrentLiabilities::class)]
#[UsesClass(BalanceSheetShareholdersEquity::class)]
#[UsesClass(CashFlow::class)]
#[UsesClass(CashFlowCashFlow::class)]
#[UsesClass(CashFlowFinancingActivities::class)]
#[UsesClass(CashFlowInvestingActivities::class)]
#[UsesClass(CashFlowOperatingActivities::class)]
#[UsesClass(Dividends::class)]
#[UsesClass(DividendsDividend::class)]
#[UsesClass(Earnings::class)]
#[UsesClass(EarningsEarning::class)]
#[UsesClass(IncomeStatement::class)]
#[UsesClass(IncomeStatementIncomeStatement::class)]
#[UsesClass(IncomeStatementNonOperatingInterest::class)]
#[UsesClass(IncomeStatementOperationExpense::class)]
#[UsesClass(InsiderTransactions::class)]
#[UsesClass(InsiderTransactionsInsiderTransaction::class)]
#[UsesClass(Logo::class)]
#[UsesClass(Meta::class)]
#[UsesClass(Profile::class)]
#[UsesClass(Splits::class)]
#[UsesClass(SplitsSplit::class)]
#[UsesClass(Statistics::class)]
#[UsesClass(StatisticsBalanceSheet::class)]
#[UsesClass(StatisticsCashFlow::class)]
#[UsesClass(StatisticsDividendsAndSplits::class)]
#[UsesClass(StatisticsFinancials::class)]
#[UsesClass(StatisticsIncomeStatement::class)]
#[UsesClass(StatisticsStatistics::class)]
#[UsesClass(StatisticsStockPriceSummary::class)]
#[UsesClass(StatisticsStockStatistics::class)]
#[UsesClass(StatisticsValuationsMetrics::class)]
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

    public function testBalanceSheet(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            BalanceSheet::class,
            $fundamentals->balanceSheet('AAPL'),
        );
    }

    public function testCashFlow(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            CashFlow::class,
            $fundamentals->cashFlow('AAPL'),
        );
    }
}
