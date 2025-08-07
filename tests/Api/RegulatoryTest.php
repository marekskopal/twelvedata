<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\Regulatory;
use MarekSkopal\TwelveData\Dto\Fundamentals\Meta;
use MarekSkopal\TwelveData\Dto\Regulatory\DirectHolders;
use MarekSkopal\TwelveData\Dto\Regulatory\EdgarFillings;
use MarekSkopal\TwelveData\Dto\Regulatory\EdgarFillingsMeta;
use MarekSkopal\TwelveData\Dto\Regulatory\EdgarFillingsValue;
use MarekSkopal\TwelveData\Dto\Regulatory\EdgarFillingsValueFile;
use MarekSkopal\TwelveData\Dto\Regulatory\FundHolders;
use MarekSkopal\TwelveData\Dto\Regulatory\InsiderTransactions;
use MarekSkopal\TwelveData\Dto\Regulatory\InstitutionalHolders;
use MarekSkopal\TwelveData\Dto\Regulatory\SanctionedEntities;
use MarekSkopal\TwelveData\Dto\Regulatory\TaxInformation;
use MarekSkopal\TwelveData\Dto\Regulatory\TaxInformationData;
use MarekSkopal\TwelveData\Dto\Regulatory\TaxInformationMeta;
use MarekSkopal\TwelveData\Enum\SanctionsSourceEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Regulatory::class)]
#[UsesClass(EdgarFillings::class)]
#[UsesClass(EdgarFillingsMeta::class)]
#[UsesClass(EdgarFillingsValue::class)]
#[UsesClass(EdgarFillingsValueFile::class)]
#[UsesClass(InsiderTransactions::class)]
#[UsesClass(Meta::class)]
#[UsesClass(InstitutionalHolders::class)]
#[UsesClass(FundHolders::class)]
#[UsesClass(DirectHolders::class)]
#[UsesClass(TaxInformation::class)]
#[UsesClass(TaxInformationMeta::class)]
#[UsesClass(TaxInformationData::class)]
final class RegulatoryTest extends TestCase
{
    public function testEdgarFillings(): void
    {
        $regulatory = new Regulatory(ClientFixture::createWithResponse('edgar_fillings.json'));

        $this->assertInstanceOf(
            EdgarFillings::class,
            $regulatory->edgarFilligs('AAPL'),
        );
    }

    public function testInsiderTransactions(): void
    {
        $regulatory = new Regulatory(ClientFixture::createDemo());

        $this->assertInstanceOf(
            InsiderTransactions::class,
            $regulatory->insiderTransactions('AAPL'),
        );
    }

    public function testInstitutionalHolders(): void
    {
        $regulatory = new Regulatory(ClientFixture::createDemo());

        $this->assertInstanceOf(
            InstitutionalHolders::class,
            $regulatory->institutionalHolders('AAPL'),
        );
    }

    public function testFundHolders(): void
    {
        $regulatory = new Regulatory(ClientFixture::createDemo());

        $this->assertInstanceOf(
            FundHolders::class,
            $regulatory->fundHolders('AAPL'),
        );
    }

    public function testDirectHolders(): void
    {
        $regulatory = new Regulatory(ClientFixture::createDemo());

        $this->assertInstanceOf(
            DirectHolders::class,
            $regulatory->directHolders('AAPL'),
        );
    }

    public function testTaxInformation(): void
    {
        $regulatory = new Regulatory(ClientFixture::createWithResponse('tax_info.json'));

        $this->assertInstanceOf(
            TaxInformation::class,
            $regulatory->taxInformation('SKYQ'),
        );
    }

    public function testSanctionedEntities(): void
    {
        $regulatory = new Regulatory(ClientFixture::createWithResponse('sanctioned_entities.json'));

        $this->assertInstanceOf(
            SanctionedEntities::class,
            $regulatory->sanctionedEntities(SanctionsSourceEnum::Ofac),
        );
    }
}
