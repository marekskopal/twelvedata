<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\Etfs;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\Etfs\EtfAllData;
use MarekSkopal\TwelveData\Dto\Etfs\EtfAnnualTotalReturn;
use MarekSkopal\TwelveData\Dto\Etfs\EtfAssetAllocation;
use MarekSkopal\TwelveData\Dto\Etfs\EtfBondBreakdown;
use MarekSkopal\TwelveData\Dto\Etfs\EtfBondMaturityDuration;
use MarekSkopal\TwelveData\Dto\Etfs\EtfComposition;
use MarekSkopal\TwelveData\Dto\Etfs\EtfCountryAllocation;
use MarekSkopal\TwelveData\Dto\Etfs\EtfCreditQuality;
use MarekSkopal\TwelveData\Dto\Etfs\EtfFamilyList;
use MarekSkopal\TwelveData\Dto\Etfs\EtfHolding;
use MarekSkopal\TwelveData\Dto\Etfs\EtfList;
use MarekSkopal\TwelveData\Dto\Etfs\EtfListItem;
use MarekSkopal\TwelveData\Dto\Etfs\EtfPerformance;
use MarekSkopal\TwelveData\Dto\Etfs\EtfRisk;
use MarekSkopal\TwelveData\Dto\Etfs\EtfSector;
use MarekSkopal\TwelveData\Dto\Etfs\EtfSummary;
use MarekSkopal\TwelveData\Dto\Etfs\EtfSummaryData;
use MarekSkopal\TwelveData\Dto\Etfs\EtfTrailingReturn;
use MarekSkopal\TwelveData\Dto\Etfs\EtfTypeList;
use MarekSkopal\TwelveData\Dto\Etfs\EtfValuationMetrics;
use MarekSkopal\TwelveData\Dto\Etfs\EtfVolatilityMeasure;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\Guard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Etfs::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Guard::class)]
#[UsesClass(EtfAllData::class)]
#[UsesClass(EtfAnnualTotalReturn::class)]
#[UsesClass(EtfAssetAllocation::class)]
#[UsesClass(EtfBondBreakdown::class)]
#[UsesClass(EtfBondMaturityDuration::class)]
#[UsesClass(EtfComposition::class)]
#[UsesClass(EtfCountryAllocation::class)]
#[UsesClass(EtfCreditQuality::class)]
#[UsesClass(EtfFamilyList::class)]
#[UsesClass(EtfHolding::class)]
#[UsesClass(EtfList::class)]
#[UsesClass(EtfListItem::class)]
#[UsesClass(EtfPerformance::class)]
#[UsesClass(EtfRisk::class)]
#[UsesClass(EtfSector::class)]
#[UsesClass(EtfSummary::class)]
#[UsesClass(EtfSummaryData::class)]
#[UsesClass(EtfTrailingReturn::class)]
#[UsesClass(EtfTypeList::class)]
#[UsesClass(EtfValuationMetrics::class)]
#[UsesClass(EtfVolatilityMeasure::class)]
final class EtfsTest extends TestCase
{
    public function testList(): void
    {
        $etfs = new Etfs(ClientFixture::createWithResponse('etfs_list.json'));

        self::assertInstanceOf(
            EtfList::class,
            $etfs->list(),
        );
    }

    public function testAllData(): void
    {
        $etfs = new Etfs(ClientFixture::createWithResponse('etfs_world.json'));

        self::assertInstanceOf(
            EtfAllData::class,
            $etfs->allData('IVV'),
        );
    }

    public function testSummary(): void
    {
        $etfs = new Etfs(ClientFixture::createWithResponse('etfs_world_summary.json'));

        self::assertInstanceOf(
            EtfSummary::class,
            $etfs->summary('IVV'),
        );
    }

    public function testPerformance(): void
    {
        $etfs = new Etfs(ClientFixture::createWithResponse('etfs_world_performance.json'));

        self::assertInstanceOf(
            EtfPerformance::class,
            $etfs->performance('IVV'),
        );
    }

    public function testRisk(): void
    {
        $etfs = new Etfs(ClientFixture::createWithResponse('etfs_world_risk.json'));

        self::assertInstanceOf(
            EtfRisk::class,
            $etfs->risk('IVV'),
        );
    }

    public function testComposition(): void
    {
        $etfs = new Etfs(ClientFixture::createWithResponse('etfs_world_composition.json'));

        self::assertInstanceOf(
            EtfComposition::class,
            $etfs->composition('IVV'),
        );
    }

    public function testFamilyList(): void
    {
        $etfs = new Etfs(ClientFixture::createWithResponse('etfs_family.json'));

        self::assertInstanceOf(
            EtfFamilyList::class,
            $etfs->familyList(),
        );
    }

    public function testTypeList(): void
    {
        $etfs = new Etfs(ClientFixture::createWithResponse('etfs_type.json'));

        self::assertInstanceOf(
            EtfTypeList::class,
            $etfs->typeList(),
        );
    }
}
