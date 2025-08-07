<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use DateTimeImmutable;
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
use MarekSkopal\TwelveData\Dto\Fundamentals\DividendsCalendar;
use MarekSkopal\TwelveData\Dto\Fundamentals\DividendsDividend;
use MarekSkopal\TwelveData\Dto\Fundamentals\Earnings;
use MarekSkopal\TwelveData\Dto\Fundamentals\EarningsCalendar;
use MarekSkopal\TwelveData\Dto\Fundamentals\EarningsCalendarEarning;
use MarekSkopal\TwelveData\Dto\Fundamentals\EarningsEarning;
use MarekSkopal\TwelveData\Dto\Fundamentals\IncomeStatement;
use MarekSkopal\TwelveData\Dto\Fundamentals\IncomeStatementIncomeStatement;
use MarekSkopal\TwelveData\Dto\Fundamentals\IncomeStatementNonOperatingInterest;
use MarekSkopal\TwelveData\Dto\Fundamentals\IncomeStatementOperationExpense;
use MarekSkopal\TwelveData\Dto\Fundamentals\IpoCalendar;
use MarekSkopal\TwelveData\Dto\Fundamentals\KeyExecutives;
use MarekSkopal\TwelveData\Dto\Fundamentals\KeyExecutivesKeyExecutive;
use MarekSkopal\TwelveData\Dto\Fundamentals\Logo;
use MarekSkopal\TwelveData\Dto\Fundamentals\LogoMeta;
use MarekSkopal\TwelveData\Dto\Fundamentals\Meta;
use MarekSkopal\TwelveData\Dto\Fundamentals\OptionsChain;
use MarekSkopal\TwelveData\Dto\Fundamentals\OptionsChainOption;
use MarekSkopal\TwelveData\Dto\Fundamentals\OptionsExpiration;
use MarekSkopal\TwelveData\Dto\Fundamentals\Profile;
use MarekSkopal\TwelveData\Dto\Fundamentals\Splits;
use MarekSkopal\TwelveData\Dto\Fundamentals\SplitsCalendar;
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
use MarekSkopal\TwelveData\Dto\Regulatory\DirectHolders;
use MarekSkopal\TwelveData\Dto\Regulatory\Holder;
use MarekSkopal\TwelveData\Dto\Regulatory\InsiderTransactions;
use MarekSkopal\TwelveData\Dto\Regulatory\InsiderTransactionsInsiderTransaction;
use MarekSkopal\TwelveData\Dto\Regulatory\InstitutionalHolders;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Fundamentals::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
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
#[UsesClass(DirectHolders::class)]
#[UsesClass(Dividends::class)]
#[UsesClass(DividendsDividend::class)]
#[UsesClass(DividendsCalendar::class)]
#[UsesClass(Earnings::class)]
#[UsesClass(EarningsEarning::class)]
#[UsesClass(EarningsCalendar::class)]
#[UsesClass(EarningsCalendarEarning::class)]
#[UsesClass(Holder::class)]
#[UsesClass(IncomeStatement::class)]
#[UsesClass(IncomeStatementIncomeStatement::class)]
#[UsesClass(IncomeStatementNonOperatingInterest::class)]
#[UsesClass(IncomeStatementOperationExpense::class)]
#[UsesClass(InsiderTransactions::class)]
#[UsesClass(InsiderTransactionsInsiderTransaction::class)]
#[UsesClass(InstitutionalHolders::class)]
#[UsesClass(KeyExecutives::class)]
#[UsesClass(KeyExecutivesKeyExecutive::class)]
#[UsesClass(IpoCalendar::class)]
#[UsesClass(Logo::class)]
#[UsesClass(LogoMeta::class)]
#[UsesClass(Meta::class)]
#[UsesClass(OptionsChain::class)]
#[UsesClass(OptionsChainOption::class)]
#[UsesClass(OptionsExpiration::class)]
#[UsesClass(Profile::class)]
#[UsesClass(Splits::class)]
#[UsesClass(SplitsSplit::class)]
#[UsesClass(SplitsCalendar::class)]
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
final class FundamentalsTest extends TestCase
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
        $fundamentals = new Fundamentals(ClientFixture::createWithResponse('profile.json'));

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

    public function testDividendsCalendar(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createWithResponse('dividends_calendar.json'));

        $dividendsCalendar = $fundamentals->dividendsCalendar();

        $this->assertInstanceOf(DividendsCalendar::class, $dividendsCalendar[0]);
    }

    public function testSplits(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Splits::class,
            $fundamentals->splits('AAPL'),
        );
    }

    public function testSplitsCalendar(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createWithResponse('splits_calendar.json'));

        $splitsCalendar = $fundamentals->splitsCalendar();

        $this->assertInstanceOf(SplitsCalendar::class, $splitsCalendar[0]);
    }

    public function testEarnings(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Earnings::class,
            $fundamentals->earnings('AAPL'),
        );
    }

    public function testEarningsCalendar(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createWithResponse('earnings_calendar.json'));

        $this->assertInstanceOf(
            EarningsCalendar::class,
            $fundamentals->earningsCalendar(),
        );
    }

    public function testIpoCalendar(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createWithResponse('ipo_calendar.json'));

        $ipoCalendar = $fundamentals->ipoCalendar();

        $this->assertInstanceOf(IpoCalendar::class, $ipoCalendar[array_key_first($ipoCalendar)][0]);
    }

    public function testStatistics(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createWithResponse('statistics.json'));

        $this->assertInstanceOf(
            Statistics::class,
            $fundamentals->statistics('TSM'),
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

    public function testOptionsExpiration(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            OptionsExpiration::class,
            $fundamentals->optionsExpiration('AAPL'),
        );
    }

    public function testOptionsChain(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            OptionsChain::class,
            $fundamentals->optionsChain('AAPL', expirationDate: new DateTimeImmutable('2022-01-21')),
        );
    }

    public function testKeyExecutives(): void
    {
        $fundamentals = new Fundamentals(ClientFixture::createDemo());

        $this->assertInstanceOf(
            KeyExecutives::class,
            $fundamentals->keyExecutives('AAPL'),
        );
    }
}
