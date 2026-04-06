<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\MutualFunds;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundAllData;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundAnnualTotalReturn;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundAssetAllocation;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundBondBreakdown;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundBondMaturityDuration;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundComposition;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundCreditQuality;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundEsgPillars;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundExpenses;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundFamilyList;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundHolding;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundList;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundListItem;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundLoadAdjustedReturn;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundMinimums;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundPerformance;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundPerson;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundPricing;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundPurchaseInfo;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundQuarterlyTotalReturn;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundRatings;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundRatingsData;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundRisk;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundSector;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundSummary;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundSummaryData;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundSustainability;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundTrailingReturn;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundTypeList;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundValuationMetrics;
use MarekSkopal\TwelveData\Dto\MutualFunds\MutualFundVolatilityMeasure;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\Guard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MutualFunds::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Guard::class)]
#[UsesClass(MutualFundAllData::class)]
#[UsesClass(MutualFundAnnualTotalReturn::class)]
#[UsesClass(MutualFundAssetAllocation::class)]
#[UsesClass(MutualFundBondBreakdown::class)]
#[UsesClass(MutualFundBondMaturityDuration::class)]
#[UsesClass(MutualFundComposition::class)]
#[UsesClass(MutualFundCreditQuality::class)]
#[UsesClass(MutualFundEsgPillars::class)]
#[UsesClass(MutualFundExpenses::class)]
#[UsesClass(MutualFundFamilyList::class)]
#[UsesClass(MutualFundHolding::class)]
#[UsesClass(MutualFundList::class)]
#[UsesClass(MutualFundListItem::class)]
#[UsesClass(MutualFundLoadAdjustedReturn::class)]
#[UsesClass(MutualFundMinimums::class)]
#[UsesClass(MutualFundPerformance::class)]
#[UsesClass(MutualFundPerson::class)]
#[UsesClass(MutualFundPricing::class)]
#[UsesClass(MutualFundPurchaseInfo::class)]
#[UsesClass(MutualFundQuarterlyTotalReturn::class)]
#[UsesClass(MutualFundRatings::class)]
#[UsesClass(MutualFundRatingsData::class)]
#[UsesClass(MutualFundRisk::class)]
#[UsesClass(MutualFundSector::class)]
#[UsesClass(MutualFundSummary::class)]
#[UsesClass(MutualFundSummaryData::class)]
#[UsesClass(MutualFundSustainability::class)]
#[UsesClass(MutualFundTrailingReturn::class)]
#[UsesClass(MutualFundTypeList::class)]
#[UsesClass(MutualFundValuationMetrics::class)]
#[UsesClass(MutualFundVolatilityMeasure::class)]
final class MutualFundsTest extends TestCase
{
    public function testList(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_list.json'));

        self::assertInstanceOf(
            MutualFundList::class,
            $mutualFunds->list(),
        );
    }

    public function testAllData(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_world.json'));

        self::assertInstanceOf(
            MutualFundAllData::class,
            $mutualFunds->allData('0P0001LCQ3'),
        );
    }

    public function testSummary(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_world_summary.json'));

        self::assertInstanceOf(
            MutualFundSummary::class,
            $mutualFunds->summary('0P0001LCQ3'),
        );
    }

    public function testPerformance(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_world_performance.json'));

        self::assertInstanceOf(
            MutualFundPerformance::class,
            $mutualFunds->performance('0P0001LCQ3'),
        );
    }

    public function testRisk(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_world_risk.json'));

        self::assertInstanceOf(
            MutualFundRisk::class,
            $mutualFunds->risk('0P0001LCQ3'),
        );
    }

    public function testRatings(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_world_ratings.json'));

        self::assertInstanceOf(
            MutualFundRatings::class,
            $mutualFunds->ratings('0P0001LCQ3'),
        );
    }

    public function testComposition(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_world_composition.json'));

        self::assertInstanceOf(
            MutualFundComposition::class,
            $mutualFunds->composition('0P0001LCQ3'),
        );
    }

    public function testPurchaseInfo(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_world_purchase_info.json'));

        self::assertInstanceOf(
            MutualFundPurchaseInfo::class,
            $mutualFunds->purchaseInfo('0P0001LCQ3'),
        );
    }

    public function testSustainability(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_world_sustainability.json'));

        self::assertInstanceOf(
            MutualFundSustainability::class,
            $mutualFunds->sustainability('0P0001LCQ3'),
        );
    }

    public function testFamilyList(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_family.json'));

        self::assertInstanceOf(
            MutualFundFamilyList::class,
            $mutualFunds->familyList(),
        );
    }

    public function testTypeList(): void
    {
        $mutualFunds = new MutualFunds(ClientFixture::createWithResponse('mutual_funds_type.json'));

        self::assertInstanceOf(
            MutualFundTypeList::class,
            $mutualFunds->typeList(),
        );
    }
}
