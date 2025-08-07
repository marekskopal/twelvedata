<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\ReferenceData\SupportingMetadata;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\ReferenceData\Countries;
use MarekSkopal\TwelveData\Dto\ReferenceData\CountriesData;
use MarekSkopal\TwelveData\Dto\ReferenceData\InstrumentType;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SupportingMetadata::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(Countries::class)]
#[UsesClass(CountriesData::class)]
#[UsesClass(InstrumentType::class)]
final class SupportingMetadataTest extends TestCase
{
    public function testCounties(): void
    {
        $referenceData = new SupportingMetadata(ClientFixture::createWithResponse('countries.json'));

        $this->assertInstanceOf(
            Countries::class,
            $referenceData->countries(),
        );
    }

    public function testInstrumentType(): void
    {
        $referenceData = new SupportingMetadata(ClientFixture::createWithResponse('instrument_type.json'));

        $this->assertInstanceOf(
            InstrumentType::class,
            $referenceData->instrumentType(),
        );
    }
}
